@extends('layouts.appadmin')

@section('title', 'profiloUtente')
    
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            Dati utente
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ Auth::user()->name }}</li>
            <li class="list-group-item">{{ Auth::user()->email }}</li>
            <li class="list-group-item">
                
                @if (Auth::user()->api_token  )
                {{ Auth::user()->api_token }}
                @else
                <form action="genera-token" method="POST">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary">
                        Genera Api Token CIAO
                    </button>
                </form>
                @endif

                
            </li>
        </ul>
        </div>
    </div>
@endsection 