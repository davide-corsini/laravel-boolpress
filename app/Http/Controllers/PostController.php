<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//uso il Model Post
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        
        $data = [
            'array' => $posts
        ];
        return view('guest.post.index', $data);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        $data = [
            'post_selected' => $post
        ];

        return view('guest.post.show', $data);
    }
}
