<?php

namespace App\Models;

class Posting
{
    private static $blog_post = [
        [
            "title" => "Post One",
            "slug"  => "title-post-one",
            "body"  => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae odio consequatur obcaecati vitae rem dolore cupiditate labore laboriosam ipsam eius suscipit, vel, consectetur ad sed doloremque nihil expedita iusto culpa eligendi porro quos tempora? Tempora consectetur quos possimus vitae corrupti id saepe, reiciendis odio officiis non nulla dignissimos. Dolores, quia quis suscipit vitae laudantium repellat incidunt fuga possimus alias ut quo ea eum doloribus veniam, unde maiores, illo facere beatae dicta ducimus molestiae nesciunt maxime placeat. Ipsa quod saepe consequatur!"
        ],
        [
            "title" => "Post Two",
            "slug"  => "title-post-two",
            "body"  => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae odio consequatur obcaecati vitae rem dolore cupiditate labore laboriosam ipsam eius suscipit, vel, consectetur ad sed doloremque nihil expedita iusto culpa eligendi porro quos tempora? Tempora consectetur quos possimus vitae corrupti id saepe, reiciendis odio officiis non nulla dignissimos. Dolores, quia quis suscipit vitae laudantium repellat incidunt fuga possimus alias ut quo ea eum doloribus veniam, unde maiores, illo facere beatae dicta ducimus molestiae nesciunt maxime placeat. Ipsa quod saepe consequatur!"

        ]
    ];

    //method
    public static function all()
    {
        return collect (self::$blog_post);
    }

    //method
    public static function find($slug)
    {
        $post = static::all();
        
        return $post -> firstWhere('slug', $slug);

        // $posts = [];

        // foreach ($post as $p) {
        //     if ($p["slug"] === $slug) {
        //         $posts = $p;
        //     }
        // }

    }
}
