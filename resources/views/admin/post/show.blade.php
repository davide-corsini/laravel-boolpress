@extends('layouts.appadmin')

@section('content-admin')
    {{-- <h3>{{$post['title']}}</h3>
    <p>{{$post['content']}}</p> --}}
    


    <h3>{{$post->title}}</h3>
    <p>{{$post->content}}</p>

@endsection