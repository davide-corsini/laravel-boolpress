@extends('layouts.appadmin')
@section('content-admin')
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#id</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Dettagli movie</th>
            </tr>
        </thead>
        @foreach ($posts as $item)
        <tbody>
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td style="max-width: 550px;"><p>{{$item->content}}</p></td>
                <td>
                    {{-- In teoria lui si aspetta un id ma laravel é forte e puo semplicemente completarlo senza freccia id --}} 
                    <a class="btn btn-outline-info" href="{{ route('post.show', $item->slug) }}">Dettagli</a>
                    <a class="btn btn-outline-warning" href="{{ route('post.edit', $item->slug) }}">Modifica</a>
                    
                    <form class="d-inline-block" method="post" action="{{ route('post.destroy', $item) }}">

                        @csrf
                        @method('DELETE')
                        
                        <button class="btn btn-outline-danger">Delete</button> 
                    </form> 
                    

                </td>
                <td>
                    
                @forelse ($tags as $tag)
                
                    @if ( $item->tags->contains($tag->id) == 'checked')
                    {{ $tag->slug }}
                    @endif
                    @empty
                    <p>No tags</p>
                @endforelse
                </td>

            </tr>
        </tbody>
        @endforeach
    </table>
@endsection