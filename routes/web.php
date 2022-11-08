<?php

use App\Http\Controllers\Posts\CategoryController;
use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/',[PostController::class,'index'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});
require __DIR__.'/auth.php';
