<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::orderBy('created_at', 'desc')->get();
        return view('pages.admin.feature.index', compact('features'), [
            'page' => 'feature'
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
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
        ];


        $validated = $request->validate($rules);

        Feature::create($validated);

        return redirect()->route('admin.feature.index')->with('success', 'Feature created successfully.');
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
            'id' => 'required|exists:features,id',
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
        ];

        $validated = $request->validate($rules);

        $feature = Feature::findOrFail($validated['id']);

        $feature->update([
            'title' => $validated['title'],
            'icon' => $validated['icon'],
            'description' => $validated['description']
        ]);

        return redirect()->route('admin.feature.index')->with('success', 'Feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $rules = [
            'id' => 'required|exists:features,id',
        ];

        $validated = $request->validate($rules);

        $feature = Feature::findOrFail($validated['id']);
        $feature->delete();

        return redirect()->route('admin.feature.index')->with('success', 'Feature deleted successfully.');
    }
}
