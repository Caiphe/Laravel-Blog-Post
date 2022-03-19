<?php

use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('show.post');

Route::get('/register',[RegistrationController::class, 'create'])->name('user.register');
Route::post('/register',[RegistrationController::class, 'store'])->name('register.create');

Route::post('/logout',[SessionController::class, 'destroy'])->name('user.logout')->middleware('auth');
Route::get('/login',[SessionController::class, 'create'])->name('user.login')->middleware('guest');
Route::post('/login',[SessionController::class, 'store'])->name('user.login-action')->middleware('guest');

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin')->name('create-post');
Route::post('/admin/posts/', [PostController::class, 'store'])->middleware('admin')->name('store.post');
Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('admin.post');
Route::get('/admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->middleware('admin')->name('admin.post.edit');
Route::patch('/admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('admin')->name('admin.post.update');
Route::delete('/admin/posts/delete/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin')->name('admin.post.delete');

