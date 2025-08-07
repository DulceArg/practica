{{-- resources/views/partials/admin-footer.blade.php --}}
<footer class="footer">
    <div class="container-l">
        <ul class="footer-list">
            <li class="footer-item"><a href="{{ route('admin.inicio') }}" class="footer-link">Inicio</a></li>
            <li class="footer-item"><a href="{{ route('usuarios.index') }}" class="footer-link">Usuarios</a></li>
            <li class="footer-item"><a href="{{ route('cupones.index') }}" class="footer-link">Cupones</a></li>
            <li class="footer-item"><a href="{{ route('ordenes.index') }}" class="footer-link">Ordenes</a></li>
        </ul>
        <p class="copyright">
            &copy; 2024 <a href="{{ route('admin.inicio') }}" class="copyright-link"> Tamaleria </a>.
            Todos los derechos reservados
        </p>
    </div>
</footer>
