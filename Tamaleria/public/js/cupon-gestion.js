document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const showAllBtn = document.getElementById('showAllBtn');
    const cuponList = document.getElementById('cuponList');
    const addBtn = document.getElementById('addBtn'); // botón Agregar +

    let selectedSearchField = 'codigo';

    const btnCodigo = document.getElementById('searchByCode');
    const btnEstatus = document.getElementById('searchByStatus');
    const btnTipo = document.getElementById('searchByType');

    if (btnCodigo) {
        btnCodigo.addEventListener('click', () => {
            selectedSearchField = 'codigo';
            marcarActivo('searchByCode');
            searchInput.value = '';
            fetchCupones();
        });
    }

    if (btnEstatus) {
        btnEstatus.addEventListener('click', () => {
            selectedSearchField = 'estatus';
            marcarActivo('searchByStatus');
            searchInput.value = '';
            fetchCupones();
        });
    }

    if (btnTipo) {
        btnTipo.addEventListener('click', () => {
            selectedSearchField = 'tipo';
            marcarActivo('searchByType');
            searchInput.value = '';
            fetchCupones();
        });
    }

    if (showAllBtn) {
        showAllBtn.addEventListener('click', () => {
            marcarActivo('showAllBtn');
            searchInput.value = '';
            fetchCupones();
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            fetchCupones(searchInput.value);
        });
    }

    function fetchCupones(query = '') {
        fetch(`/cupones/buscar?campo=${selectedSearchField}&q=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => cuponList.innerHTML = data)
            .catch(err => console.error(err));
    }

    function marcarActivo(idActivo) {
        // Siempre quitar la clase 'active' del botón de agregar
        if (addBtn) {
            addBtn.classList.remove('active');
        }

        // Quitar 'active' de todos los demás botones
        document.querySelectorAll('.filter-btn-c').forEach(btn => {
            if (btn.id !== 'addBtn') {
                btn.classList.remove('active');
            }
        });

        // Agregar 'active' solo al botón que fue seleccionado
        const activo = document.getElementById(idActivo);
        if (activo && activo.id !== 'addBtn') {
            activo.classList.add('active');
        }
    }
});
