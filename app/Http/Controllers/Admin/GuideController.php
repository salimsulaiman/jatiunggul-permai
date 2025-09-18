<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guides = Guide::orderBy('created_at', 'desc')->get();
        return view('pages.admin.guide.index', compact('guides'), [
            'page' => 'guide'
        ]);
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'description' => 'required|string',
            'guide_file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        Guide::create([
            ...$validated,
            'image' => $request->file('image')->store('guide_images', 'public'),
            'guide_file' => $request->file('guide_file')->store('guide_files', 'public'),
        ]);

        return redirect()->route('admin.guide.index')->with('success', 'Guide created successfully.');
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
            'id' => 'required|exists:guides,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'guide_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ];

        $validated = $request->validate($rules);

        $guide = Guide::findOrFail($validated['id']);

        if ($request->hasFile('image')) {
            if ($guide->image && Storage::disk('public')->exists($guide->image)) {
                Storage::disk('public')->delete($guide->image);
            }

            $imagePath = $request->file('image')->store('guide_images', 'public');
        } else {
            $imagePath = $guide->image;
        }

        if ($request->hasFile('guide_file')) {
            if ($guide->guide_file && Storage::disk('public')->exists($guide->guide_file)) {
                Storage::disk('public')->delete($guide->guide_file);
            }

            $guideFilePath = $request->file('guide_file')->store('guide_files', 'public');
        } else {
            $guideFilePath = $guide->guide_file;
        }

        $guide->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'guide_file' => $guideFilePath,
        ]);

        return redirect()->route('admin.guide.index')->with('success', 'Guide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:guides,id',
        ];

        $validated = $request->validate($rules);

        $guide = Guide::findOrFail($validated['id']);

        if ($guide->image && Storage::disk('public')->exists($guide->image)) {
            Storage::disk('public')->delete($guide->image);
        }

        if ($guide->guide_file && Storage::disk('public')->exists($guide->guide_file)) {
            Storage::disk('public')->delete($guide->guide_file);
        }
        $guide->delete();

        return redirect()->route('admin.guide.index')->with('success', 'Guide deleted successfully.');
    }
}
