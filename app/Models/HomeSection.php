<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = ['badge', 'title', 'description', 'image', 'button_home_1', 'url_home_1', 'button_home_2', 'url_home_2'];
}
