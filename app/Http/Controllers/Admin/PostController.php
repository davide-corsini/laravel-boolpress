<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
//per utilizzare il create collegato alla crude STORE
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;

//uso il modle Tag
use App\Tag;
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
        $tags = Tag::all();
        $data = [
            'posts' => $posts,
            'tags' => $tags
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
        
        $tags = Tag::all();

        $data = [
            'tags' => $tags
        ];
        return view('admin.post.create', $data);
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
        // $data = $request->validate(['image'->'min:1|max:2048']);
        //devo prendere l id di colui che si é collegato al sito
        //creo una nuova istanza
        $newPost = new Post();
        $userId = Auth::id(); //questo fa riferimento a riga 8/9
        //Adesso mi prendo tutte le fillable che sono nel model protected
        //come faccio? ->fill
        $newPost->user_id = $userId;
        $newPost->slug = Str::slug($data['title']);

        $cover_percorso = Storage::put('post_covers', $data['image']);
        $data['cover_img'] = $cover_percorso;
        $newPost->cover_img = $data['cover_img'];

        $newPost->fill($data);
        
        
        //includo instanza per colonna cover_img in tabella posts
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
    public function show( $post)
    {
        // $post = Post::all();
        //firstOrFail se non lo trovi mandami errore
        $post = Post::where('slug', $post )->firstOrFail();

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
    public function edit( $post )
    {
        $post = Post::where('slug', $post )->firstOrFail();
        $tags = Tag::all();

        $data = [
                'post' => $post,
                'tags' => $tags
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
        $cover_percorso = Storage::put('post_covers', $data['image']);
        $data['cover_img'] = $cover_percorso;
        $post->update($data);
        //anche qui ho bisogno del redirect al return
        if(array_key_exists('tags', $data)){
                $post->tags()->sync($data['tags']);
        }
        
        return redirect()->route('post.index', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);

        $post->delete();

        return redirect()->route('post.index');
    }

    
}
