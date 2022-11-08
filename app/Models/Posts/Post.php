<?php

namespace App\Models\Posts;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    public $casts = [
        'slug' => 'string',
        'title' => 'string',
        'description' => 'string',
        'thumbnail' => 'string',
        'content' => 'string',
        'published' => 'datetime',
        'author_id' => 'integer'
    ];

    public $fillable = [
        'slug',
        'title',
        'description',
        'thumbnail',
        'content',
        'published',
        'author_id'
    ];

    public function author() : HasOne
    {
        return $this->hasOne(User::class,'id','author_id');
    }

    public function history() : HasMany
    {
        return $this->hasMany(History::class,'post_id','id');
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            CategoryPost::class,
            'post_id',
            'category_id'
        );
    }

    public function scopeCategoryOrPostTitle(
        object $query,
        string $title
    ) : Object
    {
        return $this::whereHas('categories', function($query) use ($title){
            $query->where('categories.name', 'LIKE', $title.'%');
        })
        ->orWhere('posts.title','LIKE',$title.'%')
        ->get();
    }
}
