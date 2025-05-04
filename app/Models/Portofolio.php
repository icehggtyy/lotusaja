<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = ['title', 'image', 'slug', 'description', 'link', 'link_img'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
