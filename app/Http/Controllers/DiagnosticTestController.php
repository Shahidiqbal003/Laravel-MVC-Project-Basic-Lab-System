<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticTest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosticTestController extends Controller
{
    /**
     * Display list of diagnostic tests
     */
    public function index()
    {
        $tests = DiagnosticTest::orderBy('sort_order', 'asc')->get();
        return view('tests.index', compact('tests'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store new diagnostic test
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|max:150',
            'category'          => 'nullable|max:100',
            'price'             => 'nullable|numeric|min:0',
            'sample_type'       => 'nullable|max:100',
            'report_time'       => 'nullable|max:100',
            'short_description' => 'nullable|max:500',
            'description'       => 'nullable',
            'sort_order'        => 'required|integer|min:0',
        ]);

        // 🔁 SORT ORDER SWAP LOGIC
        if ($validated['sort_order'] > 0) {
            DiagnosticTest::where('sort_order', $validated['sort_order'])
                ->update(['sort_order' => 0]);
        }

        $validated['show_on_home']   = $request->has('show_on_home');
        $validated['is_coming_soon'] = $request->has('is_coming_soon');
        $validated['is_active']      = $request->has('is_active');

        DiagnosticTest::create($validated);

        Alert::success('Success', 'Diagnostic test added successfully');
        return redirect()->route('tests.index');
    }


    /**
     * Show edit form
     */
    public function edit(DiagnosticTest $test)
    {
        return view('tests.edit', compact('test'));
    }

    /**
     * Update diagnostic test
     */
    public function update(Request $request, DiagnosticTest $test)
    {
        $validated = $request->validate([
            'name'              => 'required|max:150',
            'category'          => 'nullable|max:100',
            'price'             => 'nullable|numeric|min:0',
            'sample_type'       => 'nullable|max:100',
            'report_time'       => 'nullable|max:100',
            'short_description' => 'nullable|max:500',
            'description'       => 'nullable',
            'sort_order'        => 'required|integer|min:0',
        ]);

        // 🔁 SORT ORDER SWAP LOGIC (exclude current test)
        if ($validated['sort_order'] > 0) {
            DiagnosticTest::where('sort_order', $validated['sort_order'])
                ->where('id', '!=', $test->id)
                ->update(['sort_order' => 0]);
        }

        $validated['show_on_home']   = $request->has('show_on_home');
        $validated['is_coming_soon'] = $request->has('is_coming_soon');
        $validated['is_active']      = $request->has('is_active');

        $test->update($validated);

        Alert::success('Success', 'Diagnostic test updated successfully');
        return redirect()->route('tests.index');
    }

    /**
     * Delete diagnostic test
     */
    public function destroy(DiagnosticTest $test)
    {
        $test->delete();

        Alert::success('Success', 'Diagnostic test deleted successfully');
        return redirect()->route('tests.index');
    }
}
