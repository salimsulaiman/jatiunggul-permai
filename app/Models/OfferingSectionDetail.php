<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferingSectionDetail extends Model
{
    protected $fillable = [
        'sub_title',
        'description',
        'image',
        'button_text',
        'url',
        'offering_section_id',
    ];

    public function offeringSection()
    {
        return $this->belongsTo(OfferingSection::class);
    }
}
