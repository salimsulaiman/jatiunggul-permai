<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Property;
use App\Models\PropertySpecification;
use App\Models\SpecificationCategory;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('location')->where('is_published', true)->get();
        return view('pages.property.properties', compact('properties'));
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
    public function show($slug)
    {
        $specification_categories = SpecificationCategory::get();
        $property = Property::where('slug', $slug)->firstOrFail();
        $property_specifications = $property->specifications()
            ->with('category')
            ->get()
            ->keyBy('specification_category_id');

        $faqs = Faq::get();
        return view('pages.property.detail', compact('specification_categories', 'property', 'property_specifications', 'faqs'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
