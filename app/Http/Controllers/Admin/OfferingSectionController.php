<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfferingSection;
use App\Models\OfferingSectionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferingSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offering_section = OfferingSection::first();
        return view('pages.admin.section.offering.index', compact('offering_section'), [
            'page' => 'offering_section'
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
        $offering_section = OfferingSection::first();

        return view('pages.admin.section.offering.edit', compact('offering_section'), [
            'page' => 'offering_section'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'details' => 'required|array',
            'details.*.sub_title' => 'required|string',
            'details.*.button_text' => 'required|string|max:255',
            'details.*.description' => 'nullable|string',
            'details.*.url' => 'nullable|string',
            'details.*.image' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];

        $validated = $request->validate($rules);

        $offeringSection = OfferingSection::findOrFail($request->id);

        // Update main section
        $offeringSection->update([
            'title' => $validated['title'],
        ]);

        // Update each detail
        foreach ($validated['details'] as $detailId => $detailData) {
            $detail = OfferingSectionDetail::findOrFail($detailId);

            $imagePath = $detail->image;

            // Handle file upload
            if ($request->hasFile("details.$detailId.image")) {
                // Delete old image if exists
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }

                // Store new image
                $imagePath = $request->file("details.$detailId.image")->store('offering_section_images', 'public');
            }

            // Update detail data
            $detail->update([
                'sub_title' => $detailData['sub_title'],
                'description' => $detailData['description'] ?? null,
                'image' => $imagePath,
                'button_text' => $detailData['button_text'],
                'url' => $detailData['url'] ?? null,
            ]);
        }

        return redirect()->route('admin.offering-section.index')
            ->with('success', 'Offering Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
