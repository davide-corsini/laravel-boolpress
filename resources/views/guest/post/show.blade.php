@extends('layouts.app')

@section('content')
    <h2>Il titolo dell'URL é: {{$post_selected->slug}}</h2>
    <p>{{$post_selected->content}}</p>
    <p>Created by: {{$post_selected->user->name}}</p>
@endsection
