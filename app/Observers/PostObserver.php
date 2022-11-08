<?php

namespace App\Observers;

use App\Models\Posts\History;
use App\Models\Posts\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post) : Object
    {
        $post['author_id'] = 1;
        $post['slug'] = empty($post['slug']) ? Str::slug($post['title']) : Str::slug($post['slug']);
        return $post;
    }

    public function created(Post $post) : Object
    {
        $nameUser = Auth()->user()->name;
        $emailUser = Auth()->user()->email;
        History::storedLog(
            '1',
            $post,
            "O post ID {$post->id}, '{$post->title}' foi cadastrado pelo usuário {$nameUser} - {$emailUser}"
        );
        return $post;
    }

    /**
     * Handle the Post "updating" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updating(Post $post) : Object
    {
        $post['author_id'] = 1;
        $post['slug'] = empty($post['slug']) ? Str::slug($post['title']) : Str::slug($post['slug']);
        return $post;
    }

    public function updated(Post $post) : Object
    {
        $nameUser = Auth()->user()->name;
        $emailUser = Auth()->user()->email;
        History::storedLog(
            '1',
            $post,
            "O post ID {$post->id}, '{$post->title}' foi atualizado pelo usuário {$nameUser} - {$emailUser}"
        );
        return $post;
    }

    public function deleted(Post $post) : Object
    {
        $nameUser = Auth()->user()->name;
        $emailUser = Auth()->user()->email;
        History::storedLog(
            '1',
            $post,
            "O post ID {$post->id}, '{$post->title}' foi excluido pelo usuário {$nameUser} - {$emailUser}"
        );
        return $post;
    }

}
