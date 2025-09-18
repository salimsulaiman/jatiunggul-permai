<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('pages.admin.article.index', compact('articles', 'article_categories'), [
            'page' => 'article'
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'summary' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|exists:article_categories,id',
        ]);

        $slug = $this->generateUniqueSlug($validated['title']);

        $publish_at = $validated['status'] === 'publish' ? now() : null;

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
    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|exists:articles,id',
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'summary' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|string',
            'category_id' => 'required|exists:article_categories,id',
        ];

        $validated = $request->validate($rules);

        $slug = $this->generateUniqueSlug($validated['title']);

        $article = Article::findOrFail($validated['id']);

        $publish_at = $validated['status'] === 'publish' ? now() : null;

        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            $imagePath = $request->file('image')->store('article_images', 'public');
        } else {
            $imagePath = $article->image;
        }

        // 1. Hapus thumbnail lama jika diganti
        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $imagePath = $request->file('image')->store('article_images', 'public');
        } else {
            $imagePath = $article->image;
        }

        // 2. Hapus gambar dari konten lama yang tidak ada di konten baru
        if (!empty($article->content)) {
            // Ambil semua gambar dari konten lama
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $article->content, $oldMatches);
            $oldImages = $oldMatches[1] ?? [];

            // Ambil semua gambar dari konten baru
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $validated['content'], $newMatches);
            $newImages = $newMatches[1] ?? [];

            // Cari gambar lama yang tidak ada di konten baru
            $deletedImages = array_diff($oldImages, $newImages);

            foreach ($deletedImages as $imgUrl) {
                if (strpos($imgUrl, '/storage/') !== false) {
                    $path = str_replace('/storage/', '', $imgUrl);
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'image' => $imagePath,
            'summary' => $validated['summary'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'publish_at' => $publish_at,
            'category_id' => $validated['category_id']
        ]);


        return redirect()->route('admin.article.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required|exists:articles,id',
        ];

        $validated = $request->validate($rules);

        $article = Article::findOrFail($validated['id']);

        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        if (!empty($article->content)) {
            preg_match_all('/<img[^>]+src="([^">]+)"/i', $article->content, $matches);

            if (!empty($matches[1])) {
                foreach ($matches[1] as $imgUrl) {
                    // Hanya hapus kalau path-nya dari storage Laravel
                    if (strpos($imgUrl, '/storage/') !== false) {
                        $path = str_replace('/storage/', '', $imgUrl);
                        if (Storage::disk('public')->exists($path)) {
                            Storage::disk('public')->delete($path);
                        }
                    }
                }
            }
        }

        $article->delete();

        return redirect()->route('admin.article.index')->with('success', 'Article deleted successfully.');
    }
}
