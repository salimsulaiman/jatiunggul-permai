<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
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
        $locations = Location::orderBy('created_at', 'desc')->get();
        return view('pages.admin.location.index', compact('locations'), [
            'page' => 'location'
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
        $rules = [
            'name' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        $slug = $this->generateUniqueSlug($validated['name']);

        Location::create([
            ...$validated,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.location.index')->with('success', 'Location created successfully.');
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
            'id' => 'required|exists:locations,id',
            'name' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        $location = Location::findOrFail($validated['id']);

        $slug = $this->generateUniqueSlug($validated['name']);

        $location->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.location.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $rules = [
            'id' => 'required|exists:locations,id',
        ];

        $validated = $request->validate($rules);

        $location = Location::findOrFail($validated['id']);
        $location->delete();

        return redirect()->route('admin.location.index')->with('success', 'Location deleted successfully.');
    }
}
