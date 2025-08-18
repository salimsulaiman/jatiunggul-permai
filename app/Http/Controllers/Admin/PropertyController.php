<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\PropertySpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Location::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function index()
    {
        $locations = Location::all();
        $properties = Property::orderBy('created_at', 'desc')->get();
        return view('pages.admin.property.index', compact('properties', 'locations'));
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
            'name' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'location_id' => 'required|exists:locations,id',
            'description' => 'required|string',
            'maps_url' => 'required|url',
            'is_published' => 'sometimes|boolean',
        ]);

        $slug = $this->generateUniqueSlug($validated['name']);

        Property::create([
            ...$validated,
            'slug' => $slug,
            'image' => $request->file('image')->store('property_images', 'public'),
        ]);


        return redirect()->route('admin.property.index')->with('success', 'Property created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $property = Property::where('slug', $slug)->firstOrFail();
        $features = PropertyFeature::where('property_id', $property->id)->get();
        $specifications = PropertySpecification::where('property_id', $property->id)->get();
        return view('pages.admin.property.detail', compact('property', 'features', 'specifications'));
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
            'id' => 'required|exists:properties,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'location_id' => 'required|exists:locations,id',
            'description' => 'required|string',
            'maps_url' => 'required|url',
            'is_published' => 'sometimes|boolean',
        ];

        $validated = $request->validate($rules);

        $slug = $this->generateUniqueSlug($validated['name']);

        $property = Property::findOrFail($validated['id']);

        if ($request->hasFile('image')) {
            if ($property->image && Storage::disk('public')->exists($property->image)) {
                Storage::disk('public')->delete($property->image);
            }

            $imagePath = $request->file('image')->store('property_images', 'public');
        } else {
            $imagePath = $property->image;
        }

        $property->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'image' => $imagePath,
            'location_id' => $validated['location_id'],
            'description' => $validated['description'],
            'maps_url' => $validated['maps_url'],
            'is_published' => $validated['is_published'] ?? false,
        ]);

        return redirect()->route('admin.property.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:properties,id',
        ];

        $validated = $request->validate($rules);

        $property = Property::findOrFail($validated['id']);

        if ($property->image && Storage::disk('public')->exists($property->image)) {
            Storage::disk('public')->delete($property->image);
        }
        $property->delete();

        return redirect()->route('admin.property.index')->with('success', 'Property deleted successfully.');
    }
}
