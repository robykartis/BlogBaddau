<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscribeController as AdminSubscribeController;
use App\Http\Controllers\Frontend\CommentController as FrontendCommentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GetPostController;
use App\Http\Controllers\Frontend\SubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/admins', [AdminAuthController::class, 'admins'])->name('admins');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');




        // Route Categorys Routes
        Route::get('/categorys', [CategoryController::class, 'index'])->name('index');
        Route::post('/categorys', [CategoryController::class, 'store'])->name('store');
        Route::put('/categorys/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/categorys/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/categorys/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/categorys/{search}', [CategoryController::class, 'search'])->name('search');

        // Route Posts Routes
        Route::get('/posts', [PostController::class, 'index'])->name('index');
        Route::post('/posts', [PostController::class, 'store'])->name('store');
        Route::put('/posts/{id}', [PostController::class, 'edit'])->name('edit');
        Route::post('/posts/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('delete');
        Route::get('/posts/{search}', [PostController::class, 'search'])->name('search');

        // Route Setting Routes
        Route::get('/setting', [SettingController::class, 'index'])->name('index');
        Route::post('/setting/{id}', [SettingController::class, 'update'])->name('update');

        // Route Contacts
        Route::get('/contacts', [AdminContactController::class, 'getContacts'])->name('getContacts');
        Route::delete('/contacts/{id}', [AdminContactController::class, 'deleteContacts'])->name('deleteContacts');

        // Route Subscribe Routes
        Route::get('/subscribe', [AdminSubscribeController::class, 'index'])->name('index');
        Route::delete('/subscribe/{id}', [AdminSubscribeController::class, 'delete'])->name('delete');
        // Route Comment Routes
        Route::get('/comments', [CommentController::class, 'index'])->name('index');
        Route::delete('/comments/{id}', [CommentController::class, 'delete'])->name('delete');
    });
});
// Route Auth Routes
Route::post('/login', [AdminAuthController::class, 'login'])->name('login');



// Route All Posts
Route::prefix('/front')->group(function () {
    // Posts
    Route::get('/all-posts', [GetPostController::class, 'index'])->name('index');
    Route::get('/views-posts', [GetPostController::class, 'viewPosts'])->name('viewPosts');
    Route::get('/single-posts/{id}', [GetPostController::class, 'getPostById'])->name('getPostById');
    Route::get('/category-posts/{id}', [GetPostController::class, 'getPostByCategory'])->name('getPostByCategory');
    Route::get('/search-posts/{search}', [GetPostController::class, 'searchPost'])->name('searchPost');
    // Contact
    Route::post('/contact', [ContactController::class, 'store'])->name('store');
    // Subscribe
    Route::post('/subscribe', [SubscribeController::class, 'store'])->name('store');
    // Comment
    Route::get('/comments', [FrontendCommentController::class, 'getComments'])->name('getComments');
    Route::post('/comments/{id}', [FrontendCommentController::class, 'store'])->name('store');
});
