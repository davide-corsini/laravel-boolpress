@extends('layouts.app')

@section('content')
        


    <h1>Tutti i post del mio Blog</h1>

    @foreach ($array as $item)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">{{$item->title}}</h3>
                <p class="card-text">{{$item->content}}</p>
            </div>
            <p>{{$item->user->name}}</p>
            <div class="card-body">
                <a href="{{route('guest.post.show', $item->slug)}}" class="card-link">Post's details</a>
            </div>
        </div>
    @endforeach

@endsection
