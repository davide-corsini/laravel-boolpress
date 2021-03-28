@extends('layouts.app')

@section('content')

{{--Utilizzo variabile Post selected poiché l ho nominata cosi all interno del metodo @show in PostController--}}
<div class="my_post_single shadow p-3 mb-5 bg-white rounded">
    Created by:
    <h2> {{$post_selected->user->name}}</h2>
    <p>{{$post_selected->content}}</p>
    <a href="{{route('guest.post.index')}}"type="button" class="btn btn-outline-info">
        Go Back
    </a>
    
@endsection

