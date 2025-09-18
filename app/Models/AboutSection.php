<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'description',
        'image',
        'project_completed',
        'project_duration',
        'satisfaction_percentage'
    ];
}
