<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPortofolioController;
use App\Http\Controllers\AdminUserController;

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

Route::get('/about', function () {
    return view('about',[
        "title"  => "About",
        'active' => 'about',
        "name"  => "Muhmammad Hidayaturrohman",
        "email" => "mhidayaturachman@gmail.com",
        "job"   => "Senior Web Developer",
        "image_github" => "github.png",
        "image_me" => "me.jpg",
        "about" => "I am a professional senior web developer with more than 7 years of experience and have worked in several fields of technology companies such as agri-tech, hris, gis, news portal, and edutech. I master several programming languages ​​such as php with laravel framework and codeigniter, ruby ​​with ruby on rails framework, javascript with sencha ext.js framework and vue.js framework, and databases mysql and postgresql and cms wordpress."
    ]);
});

Route::get('/',[PortofolioController::class,'index']);

Route::get('/portofolio',[PortofolioController::class,'index']);

Route::get('/posts',[PostController::class,'index']);

Route::get('/posts/{post:slug}',[PostController::class,'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/dash-login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/portofolio', AdminPortofolioController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/user', AdminUserController::class);

Route::get('/product', [ProductController::class, 'index']);
