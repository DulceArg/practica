<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Agregar usuario')</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
    <link rel="icon" href="{{ asset('media/Imagenes/logo-sinfondo.png') }}">
</head>
<body>

    {{-- HEADER --}}
    @include('partials.navbar')
    @include('partials.modal-login')

    {{-- CONTENIDO PRINCIPAL --}}
    <main>
        @yield('content') 
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/admin-menu.js') }}"></script>
    <script src="{{ asset('js/json-estado.js') }}"></script>
    <script src="{{ asset('js/add-form-steps.js') }}"></script>
    <script src="{{ asset('js/validacion-usuario-editar.js') }}"></script>
    <script src="{{ asset('js/json-estado.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        @if(isset($usuario))
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.prefillDireccion(
                @json(old('estado', $usuario->estado)),
                @json(old('municipio', $usuario->municipio)),
                @json(old('colonia', $usuario->colonia)),
                @json(old('codigo_postal', $usuario->codigo_postal))
            );
        });
        </script>
        @endif

</body>
</html>
