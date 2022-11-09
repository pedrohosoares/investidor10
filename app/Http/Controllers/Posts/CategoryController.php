<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CategoryStoreRequest;
use App\Models\Posts\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        $categories['categories'] = Category::paginate(env('PAGINATE'));
        return view('categories.index',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        CategoryStoreRequest $request,
        Category $category
    ) : RedirectResponse
    {
        $validation = $request->validated();
        $category->create($validation);
        return redirect(route('categories.index'))->with('success','Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) : View
    {
        $category['category'] = $category;
        return view('categories.edit',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) : View
    {
        $category['category'] = Category::find($id);
        return view('categories.edit',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        CategoryStoreRequest $request,
        Category $category
    ) : RedirectResponse
    {
        $validation = $request->validated();
        $category->update($validation);
        return redirect(route('categories.index'))->with('success','Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        return redirect(route('categories.index'))->with('success','Deletado com sucesso');
    }
}
