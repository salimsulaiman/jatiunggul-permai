<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
        $categorySlug = $request->input('category');

        $articles = Article::query()
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            })
            ->when($categorySlug, function ($q) use ($categorySlug) {
                $q->whereHas('category', function ($subQuery) use ($categorySlug) {
                    $subQuery->where('slug', $categorySlug);
                });
            })
            ->latest()
            ->paginate(6)
            ->appends($request->only('q', 'category'));

        $categories = ArticleCategory::all();

        return view('pages.article.index', [
            'articles' => $articles,
            'categories' => $categories,
            'query' => $query,
            'categorySlug' => $categorySlug,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $article = Article::with('category')->where('slug', $slug)->firstOrFail();
        $categories = ArticleCategory::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->limit(3)
            ->get();
        $otherArticles = Article::with('category')->where('id', '!=', $article->id)
            ->latest()->paginate(6);

        $relatedArticles = Article::with('category')
            ->where('slug', '!=', $article->slug)
            ->where('category_id', $article->category_id)
            ->latest()
            ->limit(6)
            ->get();

        return view('pages.article.detail', compact('article', 'categories', 'otherArticles', 'relatedArticles'));
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
