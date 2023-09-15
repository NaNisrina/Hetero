<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class PostController extends Controller
{
    //method
    public function postdex()
    {
        return view('post', [
            "title" => "Posted",
            "posts"  => Posting::all()
        ]);
    }

    //Route model binding
    public function show(Posting $posts)
    {
        return view('posts', [
            "title" => "Single post",
            "post"  => $posts
        ]);
    }
}
