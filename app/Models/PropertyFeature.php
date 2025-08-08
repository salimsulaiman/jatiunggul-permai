<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    protected $fillable = ['icon', 'feature', 'description', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
