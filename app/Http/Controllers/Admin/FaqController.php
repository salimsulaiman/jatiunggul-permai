<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::get();
        return view('pages.admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ];

        $validated = $request->validate($rules);

        Faq::create($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|exists:faqs,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        $faq = Faq::findOrFail($validated['id']);

        $faq->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:faqs,id',
        ];

        $validated = $request->validate($rules);

        $faq = Faq::findOrFail($validated['id']);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
