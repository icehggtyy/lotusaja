<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    protected $fillable = ['title', 'slug', 'color'];
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
