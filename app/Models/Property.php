<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'location_id',
        'description',
        'maps_url',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function features()
    {
        return $this->hasMany(PropertyFeature::class);
    }

    public function specifications()
    {
        return $this->hasMany(PropertySpecification::class);
    }

    public function typeHouses()
    {
        return $this->hasMany(TypeHouse::class);
    }
}
