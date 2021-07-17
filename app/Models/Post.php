<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
// extends Model
{
    // use HasFactory;

    private static $blog_posts = [ 
        [
            "title" => "Judul Post Pertama",
            "slug"  => "judul-post-pertama",
            "author" => "Ahmad",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit et voluptatem beatae laudantium totam ut eum animi placeat sed. Illum repellat vel mollitia laudantium provident aut, nihil obcaecati cum, consequatur tempore itaque optio. Corrupti culpa distinctio numquam vero perferendis facilis tempore dolorem amet blanditiis! Illo culpa quas et! Officiis distinctio minus voluptatibus iste porro, quibusdam ipsa quia blanditiis dignissimos! Error, ipsum delectus qui mollitia, ratione minus assumenda unde provident necessitatibus dolorem nihil saepe expedita iure eaque autem doloremque voluptates porro."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug"  => "judul-post-kedua",
            "author" => "Ahmad aja",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis fugiat architecto illum minus repellat neque molestiae modi tempora tenetur iure dolores, aut autem magni fugit nemo, saepe adipisci ducimus ipsum quod aliquid qui eum? Quisquam accusamus, sunt molestias fugit dignissimos, explicabo perferendis, at consequuntur repudiandae aliquam esse. Accusamus temporibus molestias distinctio quod error autem minima impedit eius culpa perspiciatis! Asperiores possimus similique consequuntur facilis! Corrupti, laudantium? Repellat, laboriosam. Alias autem blanditiis minus maiores! A id fuga delectus incidunt tempore, ipsam dolorem veniam unde aliquid possimus dolores quia repellat pariatur neque laboriosam quis omnis temporibus illum aspernatur eius cum voluptates doloremque."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all();
        
        return $post->firstWhere('slug', $slug);
    }
}
