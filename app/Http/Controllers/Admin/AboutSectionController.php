<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_section = AboutSection::first();
        return view('pages.admin.section.about.index', compact('about_section'));
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
        //
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
    public function edit(Request $request)
    {
        $about_section = AboutSection::first();

        return view('pages.admin.section.about.edit', compact('about_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'project_completed' => 'required|numeric|max:99999',
            'project_duration' => 'required|numeric|max:999',
            'dp' => 'required|numeric|max:999',
        ];

        $validated = $request->validate($rules);

        $about_section = AboutSection::first();

        if ($request->hasFile('image')) {
            if ($about_section->image && Storage::disk('public')->exists($about_section->image)) {
                Storage::disk('public')->delete($about_section->image);
            }

            $imagePath = $request->file('image')->store('about_section_images', 'public');
        } else {
            $imagePath = $about_section->image;
        }

        $about_section->update([
            'description' => $validated['description'],
            'image' => $imagePath,
            'project_completed' => $validated['project_completed'],
            'project_duration' => $validated['project_duration'],
            'dp' => $validated['dp'],
        ]);

        return redirect()->route('admin.about-section.index')->with('success', 'About Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
