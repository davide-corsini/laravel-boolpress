@extends('layouts.app')


@section('title', 'Pagina-dei-contatti')


@section('content')

<form method="post" action="{{route('guest.contatti.sent')}}">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="nome_utente">Nome utente:</label>
        <input type="text" name="name" class="form-control" id="nome_utente" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="email_utente">Email</label>
        <input type="email" name="email" class="form-control" id="email_utente">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Messagio</label>
        <textarea class="form-control"  name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection