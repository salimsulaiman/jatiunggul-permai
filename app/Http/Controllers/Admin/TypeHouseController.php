<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\TypeHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeHouseController extends Controller
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('type_house_images', 'public');
        }

        TypeHouse::create($validated);

        return redirect()->back()->with('success', 'Type house berhasil ditambahkan.');
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
            'id' => 'required|exists:type_houses,id',
            'property_id' => 'required|exists:properties,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ];

        $validated = $request->validate($rules);

        $type = TypeHouse::findOrFail($validated['id']);

        if ($request->hasFile('image')) {
            if ($type->image && Storage::disk('public')->exists($type->image)) {
                Storage::disk('public')->delete($type->image);
            }

            $path = $request->file('image')->store('type-house_images', 'public');
            $validated['image'] = $path;
        } else {
            unset($validated['image']);
        }

        $type->update($validated);

        $property = Property::findOrFail($request->property_id);

        return redirect()->route('admin.property.show', $property->slug)
            ->with('success', 'Type house updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:type_houses,id',
        ]);

        $type = TypeHouse::findOrFail($request->id);

        if ($type->image && Storage::disk('public')->exists($type->image)) {
            Storage::disk('public')->delete($type->image);
        }

        $propertyId = $type->property_id;
        $type->delete();

        $property = Property::findOrFail($propertyId);

        return redirect()->route('admin.property.show', $property->slug)
            ->with('success', 'Type house deleted successfully.');
    }
}
