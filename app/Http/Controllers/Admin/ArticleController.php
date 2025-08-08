<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function index()
    {
        $article_categories = ArticleCategory::get();
        $articles = Article::with('category')->orderBy('created_at', 'desc')->get();
        return view('pages.admin.article.index', compact('articles', 'article_categories'));
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
            'title' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'summary' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|exists:article_categories,id',
        ]);

        $slug = $this->generateUniqueSlug($validated['title']);

        if ($validated['status'] === 'publish') {
            $publish_at = now();
        } else {
            $publish_at = null;
        }

        Article::create([
            ...$validated,
            'slug' => $slug,
            'image' => $request->file('image')->store('article_images', 'public'),
            'publish_at' => $publish_at
        ]);


        return redirect()->route('admin.article.index')->with('success', 'Property created successfully.');
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
