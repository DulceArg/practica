@extends('layouts.inicio-layout')

@section('title', 'Página principal')

@section('content')

@include('partials.navbar')
@include('partials.modal-login')
@include('partials.hero')
@include('partials.features')
@include('partials.ingredientes')
@include('partials.vision')
@include('partials.valores')
@include('partials.galeria')
@include('partials.footer')

@endsection
