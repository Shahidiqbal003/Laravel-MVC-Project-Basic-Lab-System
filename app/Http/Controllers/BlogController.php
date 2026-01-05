<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * List blogs
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Create form
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store blog
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|max:255',
            'published_at' => 'required|date',
            'thumbnail'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_image'  => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'content'      => 'required',
            'tags'         => 'required|max:255',
        ]);

        /* -------------------------
           SLUG (CREATE ONLY)
        ------------------------- */
        $slug = Str::slug($request->title);
        $count = Blog::where('slug', $slug)->count();
        $validated['slug'] = $count ? $slug . '-' . time() : $slug;

        /* -------------------------
           STATUS
        ------------------------- */
        $validated['status'] = $request->boolean('status');

        /* -------------------------
           TAGS (normalized)
        ------------------------- */
        $validated['tags'] = collect(explode(',', $request->tags))
            ->map(fn ($tag) => trim(strtolower($tag)))
            ->implode(',');

        /* -------------------------
           IMAGE UPLOAD
        ------------------------- */
        $validated['thumbnail']   = $request->file('thumbnail')->store('blogs', 'public');
        $validated['cover_image'] = $request->file('cover_image')->store('blogs', 'public');

        Blog::create($validated);

        Alert::success('Success', 'Blog added successfully');
        return redirect()->route('blogs.index');
    }

    /**
     * Edit form
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'        => 'required|max:255',
            'published_at' => 'required|date',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'content'      => 'required',
            'tags'         => 'required|max:255',
        ]);

        /* -------------------------
           IMPORTANT:
           SLUG IS NEVER CHANGED
        ------------------------- */

        /* -------------------------
           STATUS
        ------------------------- */
        $validated['status'] = $request->boolean('status');

        /* -------------------------
           TAGS (normalized)
        ------------------------- */
        $validated['tags'] = collect(explode(',', $request->tags))
            ->map(fn ($tag) => trim(strtolower($tag)))
            ->implode(',');

        /* -------------------------
           THUMBNAIL REPLACE
        ------------------------- */
        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('blogs', 'public');
        }

        /* -------------------------
           COVER IMAGE REPLACE
        ------------------------- */
        if ($request->hasFile('cover_image')) {
            if ($blog->cover_image && Storage::disk('public')->exists($blog->cover_image)) {
                Storage::disk('public')->delete($blog->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('blogs', 'public');
        }

        $blog->update($validated);

        Alert::success('Success', 'Blog updated successfully');
        return redirect()->route('blogs.index');
    }

    /**
     * Delete blog
     */
    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
            Storage::disk('public')->delete($blog->thumbnail);
        }

        if ($blog->cover_image && Storage::disk('public')->exists($blog->cover_image)) {
            Storage::disk('public')->delete($blog->cover_image);
        }

        $blog->delete();

        Alert::success('Deleted', 'Blog deleted successfully');
        return redirect()->route('blogs.index');
    }
}
