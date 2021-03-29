@extends('layouts.app')

@section('title', 'Result Message')

@section('content')
    @if (session('status'))
        <h3>{{session('status')}}</h3>
    @endif
@endsection