<?php
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('index');
});

/*BLOGS*/

Route::get('/blogs', [BlogController::class, 'showBlogs']);
Route::get('/tambah', [BlogController::class, 'tambahBlog']);
Route::post('/tambah', [BlogController::class, 'createBlog']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update'); 
Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);



/* REGISTER */
Route::get('/register', [UsersController::class, 'create'])->name('register.create');
Route::post('/register', [UsersController::class, 'store'])->name('register.store');

/* LOGIN */
Route::get('/login', [UsersController::class, 'viewlogin'])->name('login.view');
Route::post('/login', [UsersController::class, 'login'])->name('login');
