<?php

namespace App\Http\Controllers\Admin;

//NON MI VA 
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
//per utilizzare il create collegato alla crude STORE
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $data = [
            'posts' => $posts
        ];
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //NON E QUESTO ERRORE
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //devo prendere l id di colui che si é collegato al sito
        $userId = Auth::id(); //questo fa riferimento a riga 8/9
        //creo una nuova istanza
        $newPost = new Post();
        //Adesso mi prendo tutte le fillable che sono nel model protected
        //come faccio? ->fill
        $newPost->fill($data);
        $newPost->user_id = $userId;
        $newPost->slug = Str::slug($data['title']);
        //salvo istanza
        $newPost->save();

        //ritorno con annesso redirect
        return redirect()->route('post.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::all();

        $data = [
            'post' => $post
        ];
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $data = [
                'post' => $post
            ];
            return view('admin.post.edit', $data);
  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) //aggiungo classe Post a questo update perche nella route vuole l id e so che posso sostituirlo, perció facciamolo
    {
        $data = $request->all();
        $post->update($data);
        //anche qui ho bisogno del redirect al return
        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    
}
