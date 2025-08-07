document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, select');
    const isEdit = form.action.includes('cupones/update');

    const reglas = {
        codigo: val => val.trim().length >= 4,
        fecha_inicio: val => val !== '',
        fecha_expiracion: val => val !== '',
        stock: val => !isNaN(val) && parseInt(val) >= 0,
        estatus: val => ['activo', 'inactivo', 'expirado'].includes(val),
        tipo_cupon_id: val => val !== '',
        imagen: val => isEdit ? true : val !== ''
    };

    const mensajes = {
        codigo: 'Debe tener al menos 4 caracteres.',
        fecha_inicio: 'Selecciona la fecha de inicio.',
        fecha_expiracion: 'Selecciona la fecha de expiración.',
        stock: 'Ingresa un stock válido (0 o mayor).',
        estatus: 'Selecciona un estatus válido.',
        tipo_cupon_id: 'Selecciona un tipo de cupón.',
        imagen: 'Debes subir una imagen.'
    };

    function mostrarError(input, mensaje) {
        let error = input.parentNode.querySelector('.error-text');
        if (!error) {
            error = document.createElement('div');
            error.classList.add('error-text');
            error.style.color = 'red';
            error.style.fontSize = '0.85em';
            error.style.marginTop = '4px';
            input.parentNode.appendChild(error);
        }
        error.textContent = mensaje;
        error.style.display = 'block';
        input.classList.add('input-error');
    }

    function ocultarError(input) {
        const error = input.parentNode.querySelector('.error-text');
        if (error) error.style.display = 'none';
        input.classList.remove('input-error');
    }

    function validarCampo(input, regla, mensaje) {
        const valido = regla(input.value);
        if (!valido) {
            mostrarError(input, mensaje);
        } else {
            ocultarError(input);
        }
        return valido;
    }

    function ejecutarValidacion(force = false) {
        let todoValido = true;
        inputs.forEach(input => {
            const regla = reglas[input.name];
            const mensaje = mensajes[input.name];
            if (regla && mensaje) {
                const interactuar = force || input.dataset.validado === 'true';
                const valido = validarCampo(input, regla, mensaje);
                if (!valido && interactuar) {
                    input.dataset.validado = 'true';
                }
                if (!valido) todoValido = false;
            }
        });
        return todoValido;
    }

    // Validar al escribir o cambiar
    inputs.forEach(input => {
        const regla = reglas[input.name];
        const mensaje = mensajes[input.name];
        if (regla && mensaje) {
            input.addEventListener('input', () => {
                input.dataset.validado = 'true';
                validarCampo(input, regla, mensaje);
            });
        }
    });

    // Validar desde el inicio si es formulario de creación
    if (!isEdit) {
        ejecutarValidacion(true);
    }

    // Validar todo al enviar
    form.addEventListener('submit', function (e) {
        if (!ejecutarValidacion(true)) {
            e.preventDefault();
        }
    });
});
