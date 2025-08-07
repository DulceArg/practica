<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agregar usuario')</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add_users.css') }}">
    <link rel="icon" href="{{ asset('media/Imagenes/logo-sinfondo.png') }}">
</head>
<body>

    {{-- HEADER --}}
    @include('partials.admin-header')

    {{-- CONTENIDO PRINCIPAL --}}
    <main>
        @yield('content') 
    </main>

    {{-- FOOTER --}}
    @include('partials.admin-footer')

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/admin-menu.js') }}"></script>
    <script src="{{ asset('js/add-form-steps.js') }}"></script>
    <script src="{{ asset('js/validar_cupon.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
