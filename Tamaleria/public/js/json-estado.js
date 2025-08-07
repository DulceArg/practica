document.addEventListener("DOMContentLoaded", () => {
    const estadoSelect = document.getElementById("estado");
    const municipioSelect = document.getElementById("municipio");
    const coloniaSelect = document.getElementById("colonia");
    const codigoPostalSelect = document.getElementById("codigo_postal");

    const jsonPath = "/json/estados.json";
    let data = {};

    fetch(jsonPath)
        .then(response => response.json())
        .then(json => {
            data = json.estados;
            cargarEstados();

            if (typeof window.prefillDireccionData === 'function') {
                window.prefillDireccionData();
            }
        })
        .catch(error => console.error("Error al cargar el JSON:", error));

    function cargarEstados() {
        for (const estado in data) {
            const option = document.createElement("option");
            option.value = estado;
            option.textContent = estado;
            estadoSelect.appendChild(option);
        }
    }

    estadoSelect.addEventListener("change", () => {
        municipioSelect.innerHTML = '<option value="">Seleccionar Municipio</option>';
        coloniaSelect.innerHTML = '<option value="">Seleccionar Colonia</option>';
        codigoPostalSelect.innerHTML = '<option value="">Seleccionar Código Postal</option>';
        municipioSelect.disabled = true;
        coloniaSelect.disabled = true;
        codigoPostalSelect.disabled = true;

        const estadoSeleccionado = estadoSelect.value;
        if (estadoSeleccionado) {
            municipioSelect.disabled = false;
            cargarMunicipios(estadoSeleccionado);
        }
    });

    function cargarMunicipios(estado) {
        const municipios = data[estado].municipios;
        for (const municipio in municipios) {
            const option = document.createElement("option");
            option.value = municipio;
            option.textContent = municipio;
            municipioSelect.appendChild(option);
        }
    }

    municipioSelect.addEventListener("change", () => {
        coloniaSelect.innerHTML = '<option value="">Seleccionar Colonia</option>';
        codigoPostalSelect.innerHTML = '<option value="">Seleccionar Código Postal</option>';
        coloniaSelect.disabled = true;
        codigoPostalSelect.disabled = true;

        const estadoSeleccionado = estadoSelect.value;
        const municipioSeleccionado = municipioSelect.value;

        if (municipioSeleccionado) {
            coloniaSelect.disabled = false;
            cargarColonias(estadoSeleccionado, municipioSeleccionado);
        }
    });

    function cargarColonias(estado, municipio) {
        const colonias = data[estado].municipios[municipio].colonias;
        colonias.forEach(colonia => {
            const option = document.createElement("option");
            option.value = colonia.nombre;
            option.textContent = colonia.nombre;
            coloniaSelect.appendChild(option);
        });
    }

    coloniaSelect.addEventListener("change", () => {
        codigoPostalSelect.innerHTML = '<option value="">Seleccionar Código Postal</option>';
        codigoPostalSelect.disabled = true;

        const estadoSeleccionado = estadoSelect.value;
        const municipioSeleccionado = municipioSelect.value;
        const coloniaSeleccionada = coloniaSelect.value;

        if (coloniaSeleccionada) {
            codigoPostalSelect.disabled = false;
            cargarCodigoPostal(estadoSeleccionado, municipioSeleccionado, coloniaSeleccionada);
        }
    });

    function cargarCodigoPostal(estado, municipio, colonia) {
        const colonias = data[estado].municipios[municipio].colonias;
        const coloniaEncontrada = colonias.find(c => c.nombre === colonia);
        if (coloniaEncontrada) {
            const option = document.createElement("option");
            option.value = coloniaEncontrada.codigo_postal;
            option.textContent = coloniaEncontrada.codigo_postal;
            codigoPostalSelect.appendChild(option);
        }
    }

    window.prefillDireccion = function (estado, municipio, colonia, cp) {
        window.prefillDireccionData = function () {
            if (estado && data[estado]) {
                estadoSelect.value = estado;
                municipioSelect.disabled = false;
                cargarMunicipios(estado);

                setTimeout(() => {
                    if (municipio && data[estado].municipios[municipio]) {
                        municipioSelect.value = municipio;
                        coloniaSelect.disabled = false;
                        cargarColonias(estado, municipio);

                        setTimeout(() => {
                            if (colonia) {
                                coloniaSelect.value = colonia;
                                codigoPostalSelect.disabled = false;
                                cargarCodigoPostal(estado, municipio, colonia);

                                setTimeout(() => {
                                    if (cp) {
                                        codigoPostalSelect.value = cp;
                                    }

                                    ['estado', 'municipio', 'colonia', 'codigo_postal'].forEach(id => {
                                        const el = document.getElementById(id);
                                        if (el && el.value && el.value.trim() !== '') {
                                            el.dataset.validado = 'true'; // ← Marca como "ya validado"
                                            el.classList.remove('input-error'); // ← Borra el rojo
                                            const errorText = el.parentNode.querySelector('.error-text');
                                            if (errorText) errorText.style.display = 'none';
                                        }
                                    });

                                }, 50);
                            }
                        }, 50);
                    }
                }, 50);
            }
        };
    };

});
