@extends('layouts.gestion-cupon')

@section('title', 'Gestión de Cupones')

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
                    <li><button type="button" class="filter-btn-c" id="searchByCode">Código</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByStatus">Estatus</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByType">Tipo</button></li>
                    <li>
                        <a href="{{ route('cupones.create') }}">
                            <button type="button" class="filter-btn-c active" id="addBtn">Agregar +</button>
                        </a>
                    </li>
                </ul>

                {{-- Contenedor de cupones --}}
                <div id="cuponList">
                    @include('partials.cupones-cards', ['cupones' => $cupones])
                </div>

            </div>
        </section>
    </article>
</main>
@endsection
