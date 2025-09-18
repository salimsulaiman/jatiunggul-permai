<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeHouse extends Model
{
    protected $fillable = ['property_id', 'title', 'description', 'image'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
