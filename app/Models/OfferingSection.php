<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferingSection extends Model
{
    protected $fillable = ['title'];

    public function details()
    {
        return $this->hasMany(OfferingSectionDetail::class);
    }
}
