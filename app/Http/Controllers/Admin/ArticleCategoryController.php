<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (ArticleCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function index()
    {
        $article_categories = ArticleCategory::orderBy('created_at', 'desc')->get();
        return view('pages.admin.article_category.index', compact('article_categories'), [
            'page' => 'article_category'
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

        ArticleCategory::create([
            ...$validated,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.article-category.index')->with('success', 'Category created successfully.');
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
            'id' => 'required|exists:article_categories,id',
            'name' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        $article_categories = ArticleCategory::findOrFail($validated['id']);

        $slug = $this->generateUniqueSlug($validated['name']);

        $article_categories->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.article-category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:article_categories,id',
        ];

        $validated = $request->validate($rules);

        $article_categories = ArticleCategory::findOrFail($validated['id']);
        $article_categories->delete();

        return redirect()->route('admin.article-category.index')->with('success', 'Category deleted successfully.');
    }
}
