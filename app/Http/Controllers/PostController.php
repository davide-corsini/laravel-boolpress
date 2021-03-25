<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//uso il Model Post
use App\Post;

class PostController extends Controller
{
    public function index(){
        //prendo tutti i post grazie al collegamento al model di riga 8
        $posts = Post::all();
        
        $data = [
            //al solito effettuo array associativo
            'array' => $posts
        ];
        //ritorno la viwe in folder guest/post file index.blade.php
        return view('guest.post.index', $data);
    }
        //$slug rappresenta il mio segnaposto
    public function show($slug){
        //é qui che richiamo il mio segnaposto tramite il metodo where
        //attenzionare il fatto che il metodo where vuole sempre il first
        //al contreario se dovessi passare una chiave primaria quel $id potrei utilizzare il metodo find
        $post = Post::where('slug', $slug)->first();
        $data = [
            //array associativo
            'post_selected' => $post
        ];
        //ritorno view in fodel guest/post/elemento selected
        return view('guest.post.show', $data);
    }
}
