<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\DashboardTagController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Models\Blog;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('about' , [
        'title' => 'About'
    ]);
});

Route::get('/about', function() {
    return view('about', [
        'title' => 'About'
    ]);
});

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'show']);

Route::get('/blogs/{tag:slug}', [TagController::class, 'show']);

Route::get('/tags', [TagController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    $blogs = Blog::all();
    $projects = Projects::all();
    $users = User::all();
    return view('dashboard.index', compact('blogs', 'projects', 'users'));
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/blogs/checkSlug', [DashboardBlogController::class, 'checkSlug']);
    Route::post('ckeditor/upload', [DashboardBlogController::class, 'upload'])->name('ckeditor.upload');
    Route::resource('/dashboard/blogs', DashboardBlogController::class);
    Route::resource('/dashboard/projects', DashboardProjectController::class)->except('show');
    Route::get('/dashboard/projects/checkSlug', [DashboardProjectController::class, 'checkSlug']);
    Route::get('/dashboard/tags/checkSlug', [DashboardTagController::class, 'checkSlug'])->middleware('admin');
    Route::resource('/dashboard/tags', DashboardTagController::class)->except('show')->middleware('admin');
    Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');
});