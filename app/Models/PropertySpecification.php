<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySpecification extends Model
{
    protected $fillable = [
        'property_id',
        'specification_category_id',
        'title',
        'description',
        'image'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function category()
    {
        return $this->belongsTo(SpecificationCategory::class, 'specification_category_id');
    }
}
