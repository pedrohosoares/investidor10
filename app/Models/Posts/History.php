<?php

namespace App\Models\Posts;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    public $fillable = [
        'author_id',
        'post_id',
        'description'
    ];

    public static function storedLog(
        string $author_id,
        object $post,
        string $description
    ) : Void
    {
        $nameUser = Auth()->user()->name;
        $emailUser = Auth()->user()->email;
        History::create([
            'author_id'=>$author_id,
            'post_id'=>$post->id,
            'description'=>$description
        ]);
    }

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class,'id','author_id');
    }
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class,'id','post_id');
    }
}
