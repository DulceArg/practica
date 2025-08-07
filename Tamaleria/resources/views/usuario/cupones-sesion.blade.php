@extends('layouts.cupones-layout2')

@section('title', 'Página principal')

@section('content')

@include('partials.navbar')
@include('partials.modal-login')
@include('partials.cupones-sesion', ['cupones' => $cupones])
@include('partials.footer')

@endsection
