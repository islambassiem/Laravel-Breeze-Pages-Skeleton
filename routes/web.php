<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Livewire\CreatePost;
use App\Livewire\ShowPost;
use App\Livewire\ShowPosts;
use App\Livewire\TodosList;
use App\Livewire\ViewPost;
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
	return view('home');
})->name('home');

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::view('posts/create', 'posts.create');
Route::get('/posts/create', CreatePost::class)->name('posts/create');

Route::view('posts/{post}/edit', 'posts.edit');

Route::get('/post/{post}', ViewPost::class);

Route::get('todos', TodosList::class);