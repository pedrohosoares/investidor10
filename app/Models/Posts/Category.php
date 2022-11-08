<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public $casts = [
        'name' => 'string'
    ];

    public $fillable = [
        'name'
    ];

    public function posts() : BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'categories_posts'
        );
    }

}
