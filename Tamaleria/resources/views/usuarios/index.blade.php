@extends('layouts.gestion-usuario')

@section('title', 'Gestión de Usuarios')

@section('content')
<main class="main-c">
    <article class="article-c">
        <section class="section-c product-c">
            <div class="container-c">

                {{-- Buscador --}}
                <form class="search-gestion" action="#">
                    <input type="search" id="searchInput" placeholder="Buscar aquí ...">
                    <i class="fa fa-search"></i>
                </form>

                {{-- Filtros --}}
                <ul class="filter-list-c">
                    <li><button class="filter-btn-c" id="showAllBtn">Todos</button></li>
                    <li><button class="filter-btn-c" id="searchByName">Nombre</button></li>
                    <li><button class="filter-btn-c" id="searchByEmail">Correo</button></li>
                    <li><button class="filter-btn-c" id="searchByPhone">Teléfono</button></li>
                    <li>
                        <a href="{{ route('usuarios.create') }}">
                            <button class="filter-btn-c active">Agregar +</button>
                        </a>
                    </li>
                </ul>

                {{-- Contenedor de usuarios --}}
                <div id="userList">
                    @include('partials.cards', ['usuarios' => $usuarios])
                </div>

            </div>
        </section>
    </article>
</main>
@endsection


