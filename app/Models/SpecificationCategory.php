<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecificationCategory extends Model
{
    protected $fillable = ['name', 'icon'];

    public function specifications()
    {
        return $this->hasMany(PropertySpecification::class, 'specification_category_id');
    }
}
