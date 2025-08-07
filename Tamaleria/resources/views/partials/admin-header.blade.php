{{-- resources/views/partials/admin-header.blade.php --}}
<header class="header" data-header>
    <div class="container-l">
        <h1>
            <a href="{{ route('admin.inicio') }}" class="logo">Tamalería</a>
        </h1>
        <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
            <span class="material-symbols-rounded icon">menu</span>
        </button>

        <div class="navbar">
            <div class="container-l">
                <ul class="navbar-list">
                    <li>
                        <a href="{{ route('admin.inicio') }}"
                           class="navbar-link icon-box {{ request()->routeIs('admin.inicio') ? 'active' : '' }}">
                            <span class="material-symbols-rounded icon">grid_view</span>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('usuarios.index') }}"
                           class="navbar-link icon-box {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                            <span class="material-symbols-rounded icon">person</span>
                            <span>Usuarios</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cupones.index') }}"
                           class="navbar-link icon-box {{ request()->routeIs('cupones.*') ? 'active' : '' }}">
                            <span class="material-symbols-rounded icon">confirmation_number</span>
                            <span>Cupones</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ordenes.index') }}"
                           class="navbar-link icon-box {{ request()->routeIs('ordenes.*') ? 'active' : '' }}">
                            <span class="material-symbols-rounded icon">store</span>
                            <span>Órdenes</span>
                        </a>
                    </li>
                </ul>

                <ul class="user-action-list">
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="return confirm('¿Estás seguro de que deseas cerrar sesión?')"
                        class="notification icon-box">
                            <span class="material-symbols-rounded icon">logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="header-profile">
                            <figure class="profile-avatar">
                                <img src="{{ asset('media/Imagenes/u2.jpg') }}" width="32" height="32">
                            </figure>
                            <div>
                                <p class="profile-title">Tamalería.</p>
                                <p class="profile-subtitle">Admin</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
