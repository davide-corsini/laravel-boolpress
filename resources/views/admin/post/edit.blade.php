@extends('layouts.appadmin')

@section('title', 'Are you ready to create a new Post?')
    
@section('content-admin')
    <h1>Modifica il tuo Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{route('post.update', $post )}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="input-title">Titolo</label>
            <input type="text" class="form-control" name="title" value="{{$post->slug}}" id="input-title" aria-describedby="emailHelp">
        </div>
        @if ($post->cover_img)
        <div>
            <p>Immagine inserita: </p>
            <img src="{{asset('storage/'.$post->cover_img)}}" alt="nome-img">
        </div>
        @else 
            <p>Immagine non presente.</p>
        @endif
        <div class="form-group">
            <label for="img">Carica Immagine</label>
            <input type="file" name="image" class="form-control-range" id="img">
        </div>
        <div>
        
        <div class="form-group">
            <label for="input-content">Descrizione articolo da postare:</label>
                <textarea value="{{$post->content}}" class="form-control" id="input-content" name="content" rows="3">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="input-post_img">Descrizione articolo da postare:</label>
                <textarea value="{{$post->post_img}}" class="form-control" id="input-post_img" name="post_img" rows="3">{{$post->post_img}}</textarea>
        </div>

        @foreach ($tags as $tag)

            <div class="form-group form-check">
                <input type="checkbox"  class="form-check-input" name="tags[]"  {{$post->tags->contains($tag->id) ? 'checked' : ''}} value="{{$tag->id}}">

                {{--//quando ci sono le checkbox dobbiamo predisporre il name
                come un array--}}

                {{--Il metodo contains mi fa vedere se ci sono tag che hanno quell id--}}
                <label class="form-check-label" for="exampleCheck1">
                {{$tag->name}}
                </label>
            </div>
        @endforeach

        
    
    
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection