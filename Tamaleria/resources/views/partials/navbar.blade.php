<header class="header">
    <div class="n-container">
        <div class="logo">
            <img src="{{ asset('media/Imagenes/logo.png') }}" alt="logo">
        </div>
        <nav class="menu">
            <ul>
                <li><a href="{{ url('/') }}">Sobre nosotros</a></li>
                <li><a href="{{ url('/cupones-publico') }}">Cupones</a></li>
            </ul>
        </nav>

        <div class="header-right">
            @if(session()->has('usuario_id'))
                {{-- Si tiene sesión activa --}}
                @php $rol = session('rol_id'); @endphp

                {{-- Si es ADMIN --}}
                @if($rol == 1)
                    <a href="{{ route('admin.inicio') }}" class="btn-admin">Ir a Panel Admin</a>
                @endif

                {{-- Botón de perfil común (ambos roles) --}}
                <a href="{{ route('usuario.perfil.edit') }}" class="btn-perfil">
                    <i class="fa fa-user"></i>
                </a>

                {{-- Botón de cerrar sesión --}}
                <a href="{{ route('logout') }}" class="btn-cerrar-sesion" title="Cerrar sesión">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>

            @else
                {{-- Botón normal de iniciar sesión (sin sesión activa) --}}
                <button type="button" class="btnLogin-popup user-btn icon-btn">
                    <i class="fa-solid fa-user"></i>
                </button>
            @endif
        </div>
    </div>
</header>
