<?php
use App\Http\Controllers\ProductController;

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
   return view('home', [
       "title" => "Home"
   ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "ahmad",
        "email" => "ahmadpato@gmail.com",
        "image" => "gambar.jpg"
    ]);
});

Route::get('/blog', function () {

    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug"  => "judul-post-pertama",
            "author" => "Ahmad",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit et voluptatem beatae laudantium totam ut eum animi placeat sed. Illum repellat vel mollitia laudantium provident aut, nihil obcaecati cum, consequatur tempore itaque optio. Corrupti culpa distinctio numquam vero perferendis facilis tempore dolorem amet blanditiis! Illo culpa quas et! Officiis distinctio minus voluptatibus iste porro, quibusdam ipsa quia blanditiis dignissimos! Error, ipsum delectus qui mollitia, ratione minus assumenda unde provident necessitatibus dolorem nihil saepe expedita iure eaque autem doloremque voluptates porro."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug"  => "judul-post-kedua",
            "author" => "Ahmad pato",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis fugiat architecto illum minus repellat neque molestiae modi tempora tenetur iure dolores, aut autem magni fugit nemo, saepe adipisci ducimus ipsum quod aliquid qui eum? Quisquam accusamus, sunt molestias fugit dignissimos, explicabo perferendis, at consequuntur repudiandae aliquam esse. Accusamus temporibus molestias distinctio quod error autem minima impedit eius culpa perspiciatis! Asperiores possimus similique consequuntur facilis! Corrupti, laudantium? Repellat, laboriosam. Alias autem blanditiis minus maiores! A id fuga delectus incidunt tempore, ipsam dolorem veniam unde aliquid possimus dolores quia repellat pariatur neque laboriosam quis omnis temporibus illum aspernatur eius cum voluptates doloremque."
        ],
    
    ];

    return view('post',[
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
 });

 // halaman single post
 Route::get('posts/{slug}', function($slug){

    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug"  => "judul-post-pertama",
            "author" => "Ahmad",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit et voluptatem beatae laudantium totam ut eum animi placeat sed. Illum repellat vel mollitia laudantium provident aut, nihil obcaecati cum, consequatur tempore itaque optio. Corrupti culpa distinctio numquam vero perferendis facilis tempore dolorem amet blanditiis! Illo culpa quas et! Officiis distinctio minus voluptatibus iste porro, quibusdam ipsa quia blanditiis dignissimos! Error, ipsum delectus qui mollitia, ratione minus assumenda unde provident necessitatibus dolorem nihil saepe expedita iure eaque autem doloremque voluptates porro."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug"  => "judul-post-kedua",
            "author" => "Ahmad pato",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis fugiat architecto illum minus repellat neque molestiae modi tempora tenetur iure dolores, aut autem magni fugit nemo, saepe adipisci ducimus ipsum quod aliquid qui eum? Quisquam accusamus, sunt molestias fugit dignissimos, explicabo perferendis, at consequuntur repudiandae aliquam esse. Accusamus temporibus molestias distinctio quod error autem minima impedit eius culpa perspiciatis! Asperiores possimus similique consequuntur facilis! Corrupti, laudantium? Repellat, laboriosam. Alias autem blanditiis minus maiores! A id fuga delectus incidunt tempore, ipsam dolorem veniam unde aliquid possimus dolores quia repellat pariatur neque laboriosam quis omnis temporibus illum aspernatur eius cum voluptates doloremque."
        ],
    
    ];

    $new_post = [];

    foreach($blog_posts as $post){
        if($post["slug"] === $slug){
            $new_post = $post;
        }
    }

     return view('posts', [
         "title" => "Single Post",
         "post" =>$new_post
     ]);
 });

Route::get('/product', [ProductController::class, 'index']);
