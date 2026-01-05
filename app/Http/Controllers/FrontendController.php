<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosticTest;
use App\Models\Blog;
use App\Models\ContactMessage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;


class FrontendController extends Controller
{
    /**
     * HOME PAGE
     * Sirf selected + active + non-coming-soon tests
     */
    public function home()
    {
        $homeTests = DiagnosticTest::where('is_active', true)
            ->where('show_on_home', true)
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        return view('frontend.home', compact('homeTests'));
    }

    /**
     * ABOUT PAGE
     * Static page (no DB yet)
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
     * SERVICES PAGE
     * Saare active tests (including coming soon)
     */
    public function services()
    {
        $tests = DiagnosticTest::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.services', compact('tests'));
    }

    /**
     * BOOKING PAGE
     * Sirf bookable tests (coming soon excluded)
     */
    public function booking()
    {
        $tests = DiagnosticTest::where('is_active', true)
            ->where('is_coming_soon', false)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.booking', compact('tests'));
    }

    /**
     * CONTACT PAGE
     */
    public function contact()
    {
        return view('frontend.contact');
    }


    public function blog()
    {
        $blogs = Blog::where('status', true)
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('frontend.blog', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('frontend.blog-detail', compact('blog'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|max:150',
            'phone' => ['required', 'regex:/^03[0-9]{9}$/'],
            'email' => 'nullable|email|max:150',
            'message' => 'nullable',
        ]);

        $contact = ContactMessage::create([
            'name'       => $validated['name'],
            'phone'      => $validated['phone'],
            'email'      => $validated['email'] ?? 'n/a',
            'message'    => $validated['message'] ?? '',
            'ip_address' => $request->ip(),
        ]);

        // EMAIL SEND (SAFE)
        $settings = Setting::first();
        $emails = $settings->notification_emails ?? [];

        if (count($emails)) {
            try {
                Mail::to($emails)->send(new ContactMessageMail($contact));
            } catch (\Exception $e) {
                Log::error('Mail error: ' . $e->getMessage());
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Thank you for contacting us. Our team will get back to you shortly.'
        ]);
    }
}
