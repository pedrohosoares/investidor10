<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostResources;
use App\Models\Posts\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->title;
        $posts = Post::categoryOrPostTitle($title);
        return PostResources::collection($posts);
    }
}
