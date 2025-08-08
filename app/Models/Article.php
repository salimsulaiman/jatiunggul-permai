<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'summary', 'content', 'status', 'image', 'publish_at'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
