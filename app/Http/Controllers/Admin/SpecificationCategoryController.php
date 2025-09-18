<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecificationCategory;
use Illuminate\Http\Request;

class SpecificationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specifications = SpecificationCategory::orderBy('created_at', 'desc')->get();
        return view('pages.admin.specification_category.index', compact('specifications'), [
            'page' => 'specification'
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
            'icon' => 'required|string|max:255'
        ];

        $validated = $request->validate($rules);

        SpecificationCategory::create($validated);

        return redirect()->route('admin.specification-category.index')->with('success', 'Category created successfully.');
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
            'id' => 'required|exists:specification_categories,id',
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255'
        ];

        $validated = $request->validate($rules);

        $specifications_category = SpecificationCategory::findOrFail($validated['id']);

        $specifications_category->update([
            'name' => $validated['name'],
            'icon' => $validated['icon']
        ]);

        return redirect()->route('admin.specification-category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $rules = [
            'id' => 'required|exists:specification_categories,id',
        ];

        $validated = $request->validate($rules);

        $specifications_category = SpecificationCategory::findOrFail($validated['id']);
        $specifications_category->delete();

        return redirect()->route('admin.specification-category.index')->with('success', 'Category deleted successfully.');
    }
}