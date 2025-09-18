<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertySpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertySpecificationController extends Controller
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
            'property_id' => 'required|exists:properties,id',
            'specification_category_id' => 'required|exists:specification_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('property_specification_images', 'public');
        }

        PropertySpecification::create($validated);

        $property = Property::findOrFail($validated['property_id']);

        return redirect()->route('admin.property.show', $property->slug)
            ->with('success', 'Property specification created successfully.');
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
        $validated = $request->validate([
            'id' =>  'required|exists:property_specifications,id',
            'property_id' => 'required|exists:properties,id',
            'specification_category_id' => 'required|exists:specification_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $specification = PropertySpecification::findOrFail($validated['id']);

        if ($request->hasFile('image')) {
            if ($specification->image && Storage::disk('public')->exists($specification->image)) {
                Storage::disk('public')->delete($specification->image);
            }

            $validated['image'] = $request->file('image')->store('property_specification_images', 'public');
        } else {
            unset($validated['image']);
        }

        $specification->update($validated);

        $property = Property::findOrFail($validated['property_id']);

        return redirect()->route('admin.property.show', $property->slug)
            ->with('success', 'Property specification updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:property_specifications,id',
        ];

        $validated = $request->validate($rules);

        $specification = PropertySpecification::findOrFail($validated['id']);

        if ($specification->image && Storage::exists($specification->image)) {
            Storage::delete($specification->image);
        }

        $property = Property::findOrFail($specification->property_id);

        $specification->delete();

        return redirect()->route('admin.property.show', $property->slug)
            ->with('success', 'Property specification deleted successfully.');
    }
}
