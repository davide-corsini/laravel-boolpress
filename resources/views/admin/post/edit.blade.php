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


    <form method="POST" action="{{route('post.update', $post )}}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="input-title">Titolo</label>
            <input type="text" class="form-control" name="title" id="input-title" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="input-content">Descrizione articolo da postare:</label>
                <textarea class="form-control" id="input-content" name="content" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection