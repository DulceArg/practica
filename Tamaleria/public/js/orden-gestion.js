document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const showAllBtn = document.getElementById('showAllBtn');
    const ordenList = document.getElementById('ordenList');
    const addBtn = document.getElementById('addBtn');

    let selectedSearchField = 'descripcion';

    const btnDescripcion = document.getElementById('searchByDescripcion');
    const btnFecha = document.getElementById('searchByFecha');
    const btnCupon = document.getElementById('searchByCupon');

    if (btnDescripcion) {
        btnDescripcion.addEventListener('click', () => {
            selectedSearchField = 'descripcion';
            marcarActivo('searchByDescripcion');
            searchInput.value = '';
            fetchOrdenes();
        });
    }

    if (btnFecha) {
        btnFecha.addEventListener('click', () => {
            selectedSearchField = 'fecha';
            marcarActivo('searchByFecha');
            searchInput.value = '';
            fetchOrdenes();
        });
    }

    if (btnCupon) {
        btnCupon.addEventListener('click', () => {
            selectedSearchField = 'cupon';
            marcarActivo('searchByCupon');
            searchInput.value = '';
            fetchOrdenes();
        });
    }

    if (showAllBtn) {
        showAllBtn.addEventListener('click', () => {
            marcarActivo('showAllBtn');
            searchInput.value = '';
            fetchOrdenes();
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            fetchOrdenes(searchInput.value);
        });
    }

    function fetchOrdenes(query = '') {
        fetch(`/ordenes/buscar?campo=${selectedSearchField}&q=${encodeURIComponent(query)}`)
            .then(response => response.text())
            .then(data => ordenList.innerHTML = data)
            .catch(err => console.error(err));
    }

    function marcarActivo(idActivo) {
        if (addBtn) addBtn.classList.remove('active');

        document.querySelectorAll('.filter-btn-c').forEach(btn => {
            if (btn.id !== 'addBtn') {
                btn.classList.remove('active');
            }
        });

        const activo = document.getElementById(idActivo);
        if (activo && activo.id !== 'addBtn') {
            activo.classList.add('active');
        }
    }
});
