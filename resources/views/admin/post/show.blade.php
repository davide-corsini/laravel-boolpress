@extends('layouts.appadmin')

@section('title', $post->title)


@section('content-admin')
    {{-- <h3>{{$post['title']}}</h3>
    <p>{{$post['content']}}</p> --}}
    


    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>
    <p>{{$post->name}}</p>

@endsection