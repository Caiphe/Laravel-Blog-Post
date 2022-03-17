<?php

use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
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
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/register',[RegistrationController::class, 'create'])->name('user.register');
Route::post('/register',[RegistrationController::class, 'store'])->name('register.create');
Route::post('/logout',[SessionController::class, 'destroy'])->name('user.logout')->middleware('auth');
Route::get('/login',[SessionController::class, 'create'])->name('user.login')->middleware('guest');
Route::post('/login',[SessionController::class, 'store'])->name('user.login-action')->middleware('guest');
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', function(Newsletter $newsletter){
    request()->validate([
        'email' => 'required|email',
    ]);

    try{
    //   $newsletter = new Newsletter();
    //   $newsletter->subscribe(request('email'));
    (new Newsletter())->subscribe(request('email'));

    }catch(\Exception $e){
       throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could noe be added to our newsletter.'
        ]);
    }

    return redirect('/')->with('success', 'You are now signed up for our newsletter');

});
