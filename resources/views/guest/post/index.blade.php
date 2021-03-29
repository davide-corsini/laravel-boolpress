@extends('layouts.app')

@section('content')
        

<div class="bcg_index">
    <h1>Tutti i post del mio Blog</h1>
    {{--Ciclo su variabile $array associativa in metodo index del Post Controller--}}
    <div class="my_container">
        @foreach ($array as $item)
        <div class="my_row">

        {{-- <div class="card d-flex" style="width: 18rem;">
            <div class="card-body card d-flex">
                <h3 class="card-title">{{$item->title}}</h3>
                <p class="card-text">{{$item->content}}</p>
            </div>
            <p>{{$item->user->name}}</p>
            <div class="card-body">
                <a href="{{route('guest.post.show', $item->slug)}}" class="card-link">Post's details</a>
            </div>
        </div> --}}
                <div class="box_image">
                    <img style="border-radius: 50%;" class="post_img" src="{{$item->post_img}}" alt="post_immagine">
                </div>
                <i class="fas fa-arrow-right freccia"></i>
                <div class="my_post shadow p-3 mb-5 bg-white">
                    <h3>{{$item->title}}</h3>
                    <p>{{$item->content}}</p>
                    <p class="my_creator">create by: </p>
                    <span>{{$item->user->name}}</span>
                    <p class="my_details">
                        <a href="{{route('guest.post.show', $item->slug)}}" class="card-link">Post's details</a>    
                    </p>
                </div>
                <div class="main_image">
                    <img style="border-radius: 50%;" class="cover_img" src="{{asset('storage/'.$item->cover_img)}}" alt="post_immagine">
                </div>
            </div>
                @endforeach
        </div>
</div>
@endsection
