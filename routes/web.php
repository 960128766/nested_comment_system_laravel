<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact-us', [\App\Http\Controllers\ContactController::class, 'index']);
Route::post('/contact-us', [\App\Http\Controllers\ContactController::class, 'save'])->name('contact.store');

Route::get('/test', function () {
    $datails['name'] = 'hosein';
    $datails['email'] = 'hosein@gmail.com';
    dispatch(new \App\Jobs\SendWelcomeEmailJob($datails))->delay(\Carbon\Carbon::now()->addSeconds(30));
    dd('sent');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/post/show/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');


Route::post('/comment/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [\App\Http\Controllers\CommentController::class, 'replyStore'])->name('reply.add');
