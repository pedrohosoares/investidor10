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

    public $nameUser;
    public $emailUser;

    public function __construct(){
        $this->nameUser = returnNameOfUserLogged();
        $this->emailUser = returnNameOfEmailLogged();
    }

    public function creating(Post $post) : Object
    {
        $post['author_id'] = 1;
        $post['slug'] = empty($post['slug']) ? Str::slug($post['title']) : Str::slug($post['slug']);
        return $post;
    }

    public function created(Post $post) : Object
    {
        History::storedLog(
            '1',
            $post,
            "O post ID {$post->id}, '{$post->title}' foi cadastrado pelo usuário {$this->nameUser} - {$this->emailUser}"
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
        History::storedLog(
            '1',
            $post,
            "O post ID {$post->id}, '{$post->title}' foi atualizado pelo usuário {$this->nameUser} - {$this->emailUser}"
        );
        return $post;
    }

    public function deleted(Post $post) : Object
    {
        History::storedLog(
            '1',
            $post,
            "O post ID {$post->id}, '{$post->title}' foi excluido pelo usuário {$this->nameUser} - {$this->emailUser}"
        );
        return $post;
    }

}
