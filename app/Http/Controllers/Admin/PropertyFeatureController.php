<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'feature' => 'required|string|max:255',
            'icon' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'description' => 'required|string',
            'property_id' => 'required|exists:properties,id',
        ]);


        PropertyFeature::create([
            ...$validated,
            'icon' => $request->file('icon')->store('property_feature_images', 'public'),
        ]);

        $property = Property::findOrFail($validated['property_id']);

        return redirect()->route('admin.property.show',  $property->slug)->with('success', 'Property feature created successfully.');
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
            'id' => 'required|exists:property_features,id',
            'feature' => 'required|string|max:255',
            'icon' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'description' => 'required|string',
        ];

        $validated = $request->validate($rules);

        $feature = PropertyFeature::findOrFail($validated['id']);

        if ($request->hasFile('icon')) {
            if ($feature->icon && Storage::disk('public')->exists($feature->icon)) {
                Storage::disk('public')->delete($feature->icon);
            }

            $iconPath = $request->file('icon')->store('property_features_images', 'public');
        } else {
            $iconPath = $feature->icon;
        }

        $feature->update([
            'feature' => $validated['feature'],
            'icon' => $iconPath,
            'description' => $validated['description']
        ]);

        $property = Property::findOrFail($feature->property->id);

        return redirect()->route('admin.property.show',  $property->slug)->with('success', 'Property feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:property_features,id',
        ];

        $validated = $request->validate($rules);

        $feature = PropertyFeature::findOrFail($validated['id']);

        if ($feature->icon && Storage::disk('public')->exists($feature->icon)) {
            Storage::disk('public')->delete($feature->icon);
        }

        $property = Property::findOrFail($feature->property_id);

        $feature->delete();

        return redirect()->route('admin.property.show',  $property->slug)->with('success', 'Property feature deleted successfully.');
    }
}
