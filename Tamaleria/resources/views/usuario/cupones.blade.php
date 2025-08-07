@extends('layouts.cupones-layout')

@section('title', 'Página principal')

@section('content')

@include('partials.navbar')
@include('partials.modal-login')
@include('partials.cupones', ['cupones' => $cupones])
@include('partials.footer')

@endsection
