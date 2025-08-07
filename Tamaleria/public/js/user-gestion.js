document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const showAllBtn = document.getElementById('showAllBtn');
    const userList = document.getElementById('userList');
    let selectedSearchField = 'nombre_usuario';

    document.getElementById('searchByName').addEventListener('click', () => {
        selectedSearchField = 'nombre_usuario';
        searchInput.value = '';
        fetchUsers();
    });

    document.getElementById('searchByEmail').addEventListener('click', () => {
        selectedSearchField = 'correo_electronico';
        searchInput.value = '';
        fetchUsers();
    });

    document.getElementById('searchByPhone').addEventListener('click', () => {
        selectedSearchField = 'telefono';
        searchInput.value = '';
        fetchUsers();
    });

    showAllBtn.addEventListener('click', () => {
        searchInput.value = '';
        fetchUsers();
    });

    searchInput.addEventListener('input', () => {
        fetchUsers(searchInput.value);
    });

    function fetchUsers(query = '') {
        fetch('/usuarios/buscar?campo=' + selectedSearchField + '&q=' + query)
            .then(response => response.text())
            .then(data => userList.innerHTML = data)
            .catch(err => console.error(err));
    }

    // Botones activos
    const filterButtons = document.querySelectorAll('.filter-btn-c');
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });
});
