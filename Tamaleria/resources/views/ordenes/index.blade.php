@extends('layouts.gestion-orden')

@section('title', 'Gestión de Órdenes')

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
                    <li><button type="button" class="filter-btn-c" id="showAllBtn">Todos</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByDescripcion">Descripción</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByFecha">Fecha</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByCupon">Cupón</button></li>
                    <li>
                        <a href="{{ route('ordenes.create') }}">
                            <button type="button" class="filter-btn-c active" id="addBtn">Agregar +</button>
                        </a>
                    </li>
                </ul>

                {{-- Contenedor de órdenes --}}
                <div id="ordenList">
                    @include('partials.ordenes-cards', ['ordenes' => $ordenes])
                </div>

            </div>
        </section>
    </article>
</main>
@endsection
