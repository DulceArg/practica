document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, select');
    const isEdit = form.action.includes('update'); // detecta si estamos en editar

    // Reglas de validación
    const reglas = {
        nombre_usuario: val => val.length >= 3,
        apellido_paterno_usuario: val => val.length >= 3,
        apellido_materno_usuario: val => val.length >= 3,
        correo_electronico: val => /^[^\s@]+@[^\s@]+\.(com|mx)$/.test(val),
        telefono: val => /^\d{10}$/.test(val),
        contrasena: val => {
            if (isEdit && val === '') return true;
            if (val === '') return true;
            return (
                val.length >= 8 &&
                /[A-Z]/.test(val) &&
                /\d/.test(val) &&
                /[^A-Za-z0-9]/.test(val)
            );
        },
        estado: val => val.trim().length > 0,
        municipio: val => val.trim().length > 0,
        colonia: val => val.trim().length > 0,
        codigo_postal: val => val.trim().length > 0,
        calle: val => val.length >= 3,
        numero_exterior: val => val.length > 0 && parseInt(val) > 0,
        numero_interior: val => val.length > 0 && parseInt(val) >= 0
    };

    // Mensajes de error
    const mensajes = {
        nombre_usuario: 'No se aceptan valores nulos o menores a 3 caracteres.',
        apellido_paterno_usuario: 'No se aceptan valores nulos o menores a 3 caracteres.',
        apellido_materno_usuario: 'No se aceptan valores nulos o menores a 3 caracteres.',
        correo_electronico: 'Correo no válido. Debe terminar en .com o .mx',
        telefono: 'Número de teléfono no válido. Mínimo 10 dígitos.',
        contrasena: 'Mínimo 8 caracteres, una mayúscula, un número y un carácter especial.',
        estado: 'Selecciona un estado.',
        municipio: 'Selecciona un municipio.',
        colonia: 'Selecciona una colonia.',
        codigo_postal: 'Selecciona un código postal.',
        calle: 'Ingresa una calle válida (mínimo 3 caracteres).',
        numero_exterior: 'Número exterior requerido y debe ser mayor a 0.',
        numero_interior: 'Ingresa un número interior válido.'
    };

    // Función de validación individual
    const validarCampo = (input, regla, mensaje) => {
        let error = input.nextElementSibling;
        const esValido = regla(input.value);

        if (!error || !error.classList.contains('error-text')) {
            error = document.createElement('div');
            error.classList.add('error-text');
            error.style.color = 'red';
            error.style.fontSize = '0.8em';
            input.parentNode.appendChild(error);
        }

        if (!esValido) {
            input.classList.add('input-error');
            error.textContent = mensaje;
            error.style.display = 'block';
        } else {
            input.classList.remove('input-error');
            error.style.display = 'none';
        }

        return esValido;
    };

    // Validación general
    const ejecutarValidacion = (mostrarDesdeInicio = false) => {
        let todoValido = true;
        inputs.forEach(input => {
            const regla = reglas[input.id];
            const mensaje = mensajes[input.id];
            if (regla && mensaje) {
                const interactuar =
                    mostrarDesdeInicio ||
                    input.dataset.validado === 'true' ||
                    (!isEdit && input.value.trim() === '');

                const valido = validarCampo(input, regla, mensaje);

                if (!valido && interactuar) {
                    input.dataset.validado = 'true';
                }

                if (!valido) todoValido = false;
            }
        });
        return todoValido;
    };

    // Validar desde inicio solo en "create"
    if (!isEdit) {
        ejecutarValidacion(true);
    }

    // Validación en tiempo real
    inputs.forEach(input => {
        const regla = reglas[input.id];
        const mensaje = mensajes[input.id];
        if (regla && mensaje) {
            const evento = input.tagName === 'SELECT' ? 'change' : 'input';
            input.addEventListener(evento, () => {
                input.dataset.validado = 'true';
                validarCampo(input, regla, mensaje);
            });
        }
    });

    // Antes del submit
    form.addEventListener('submit', function (e) {
        if (!ejecutarValidacion(true)) {
            e.preventDefault();
        }
    });


    if (isEdit) {
        ['estado', 'municipio', 'colonia', 'codigo_postal'].forEach(id => {
            const select = document.getElementById(id);
            if (select && select.value && select.value.trim() !== '') {
                select.dataset.validado = 'false'; // no forzamos a validar aún
            }
        });
    }
});
