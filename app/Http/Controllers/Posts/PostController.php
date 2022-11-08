<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Posts\Category;
use App\Models\Posts\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : View
    {
        $id = $request->id;
        $posts['posts'] = (new Post);
        if(!empty($id)){
            $posts['posts'] = $posts['posts']->where('id',$id);
        }
        $posts['posts'] = $posts['posts']->paginate(env('PAGINATE'));
        return view('posts.index',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        $posts['categories'] = Category::all();
        return view('posts.create',$posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Post $post) : RedirectResponse
    {
        $data = $request->all();
        if(!empty($data['thumbnail']))
        {
            $data['thumbnail'] = $request->file('thumbnail')->store('posts/'.$post->id);
        }
        $newPost = $post->create($data);
        $newPost->categories()->sync($request->category);
        return redirect(route('posts.index'))->with('created','Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) : View
    {
        $post['post'] = Post::find($id);
        return view('posts.show',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) : View
    {
        $posts['post'] = $post;
        $posts['categories'] = Category::all();
        return view('posts.edit',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) : RedirectResponse
    {
        $data = $request->all();
        if(!empty($data['thumbnail'])){
            $data['thumbnail'] = $request->file('thumbnail')->store('posts/'.$post->id);
        }
        $post->update($data);
        $post->categories()->sync($request->category);
        return redirect(route('posts.index'))->with('created','Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) : RedirectResponse
    {
        $post->delete();
        return redirect(route('posts.index'))->with('deleted','Deletado com sucesso');
    }
}
