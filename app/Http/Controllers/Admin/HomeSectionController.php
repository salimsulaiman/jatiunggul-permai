<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_section = HomeSection::first();
        return view('pages.admin.section.home.index', compact('home_section'));
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
        $home_section = HomeSection::first();

        return view('pages.admin.section.home.edit', compact('home_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'badge' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'description' => 'required|string',
            'button_home_1' => 'required|string|max:255',
            'url_home_1' => 'required|string|max:255',
            'button_home_2' => 'required|string|max:255',
            'url_home_2' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        $home_section = HomeSection::first();

        if ($request->hasFile('image')) {
            if ($home_section->image && Storage::disk('public')->exists($home_section->image)) {
                Storage::disk('public')->delete($home_section->image);
            }

            $imagePath = $request->file('image')->store('home_section_images', 'public');
        } else {
            $imagePath = $home_section->image;
        }

        $home_section->update([
            'title' => $validated['title'],
            'badge' => $validated['badge'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'button_home_1' => $validated['button_home_1'],
            'url_home_1' => $validated['url_home_1'],
            'button_home_2' => $validated['button_home_2'],
            'url_home_2' => $validated['url_home_2'],
        ]);

        return redirect()->route('admin.home-section.index')->with('success', 'Home Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
