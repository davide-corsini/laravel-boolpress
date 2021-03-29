@extends('layouts.appadmin')

@section('title', $post->title)


@section('content-admin')
    {{-- <h3>{{$post['title']}}</h3>
    <p>{{$post['content']}}</p> --}}
    


    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>
    <p>{{$post->name}}</p>
    {{-- @if ($post->cover_img) --}}
    
    <div>
        <p>Immagine inserita: </p>
        <img src="{{asset('storage/'.$post->cover_img)}}" alt="nome-img">
    </div>
    {{-- @else  --}}
        {{-- <p>Immagine non presente.</p> --}}
        {{-- <h4>Sfoglia per inserirne una nuova:</h4>
            <div class="form-group">
            <label for="img">Carica Immagine</label>
            <input type="file" name="image" class="form-control-range" id="img">
        </div> --}}
    {{-- @endif --}}
@endsection