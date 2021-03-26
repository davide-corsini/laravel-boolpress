@extends('layouts.appadmin')
@section('content-admin')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#id</th>
            <th scope="col">Titlo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Dettagli movie</th>
            </tr>
        </thead>
        @foreach ($posts as $item)
        <tbody>
            <tr>
                <th scope="row">{{$item->id}}</th>
                {{-- <th>{{$item-id}}</th> --}}
                <td><h2>{{$item->name}}</h2></td>
                <td><p>{{$item->content}}</p></td>
                <td>
                    {{--In teoria lui si aspetta un id ma laravel é forte e puo semplicemente completarlo senza freccia id --}}
                    <a class="btn btn-outline-info" href="{{ route('post.show', $item->slug) }}">Dettagli</a>
                    {{-- <a class="btn btn-outline-warning" href="{{ route('post.edit', ['movie' => $item->id]) }}">Modifica</a> --}}
                    
                    {{-- <form class="d-inline-block" method="post" action="{{ route('post.destroy', $item->id) }}"> --}}

                        {{-- @csrf
                        @method('DELETE')
                        {{-- il tag <a></a> non puo mai fare un submit di un form --}}
                        {{-- <button class="btn btn-outline-danger">Delete</button> --}}
                    {{-- </form> --}} 

                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection