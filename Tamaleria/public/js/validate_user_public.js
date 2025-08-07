document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const campos = {
        nombre_usuario: {
            regex: /^.{3,}$/,
            mensaje: "No se aceptan valores nulos o menores a 3 caracteres."
        },
        apellido_paterno_usuario: {
            regex: /^.{3,}$/,
            mensaje: "No se aceptan valores nulos o menores a 3 caracteres."
        },
        apellido_materno_usuario: {
            regex: /^.{3,}$/,
            mensaje: "No se aceptan valores nulos o menores a 3 caracteres."
        },
        contrasena: {
            regex: /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/,
            mensaje: "Mínimo 8 caracteres, una mayúscula, un número y un carácter especial."
        },
        correo_electronico: {
            regex: /^[^\s@]+@[^\s@]+\.(com|mx)$/,
            mensaje: "Correo no válido. Debe terminar en .com o .mx"
        },
        telefono: {
            regex: /^\d{10}$/,
            mensaje: "Número de teléfono no válido. Mínimo 10 dígitos."
        },
        estado: {
            regex: /^(?!\s*$).+/,
            mensaje: "Selecciona un estado."
        },
        municipio: {
            regex: /^(?!\s*$).+/,
            mensaje: "Selecciona un municipio."
        },
        colonia: {
            regex: /^(?!\s*$).+/,
            mensaje: "Selecciona una colonia."
        },
        codigo_postal: {
            regex: /^[0-9]+$/,
            mensaje: "Selecciona un código postal válido."
        },
        calle: {
            regex: /^.{3,}$/,
            mensaje: "Ingresa una calle válida (mínimo 3 caracteres)."
        },
        numero_exterior: {
            regex: /^[1-9][0-9]*$/,
            mensaje: "Número exterior requerido y debe ser mayor a 0."
        },
        numero_interior: {
            regex: /^[1-9][0-9]*$/,
            mensaje: "Número interior requerido y debe ser mayor a 0."
        }
    };

    Object.keys(campos).forEach(id => {
        const input = document.getElementById(id);
        if (!input) {
            console.warn(`Campo no encontrado: ${id}`);
            return;
        }

        // Crear span de error si no existe
        let errorSpan = document.getElementById(`error-${id}`);
        if (!errorSpan) {
            errorSpan = document.createElement('span');
            errorSpan.id = `error-${id}`;
            errorSpan.style.color = 'red';
            errorSpan.style.fontSize = '0.9em';
            errorSpan.style.display = 'none';
            input.parentNode.appendChild(errorSpan);
        }

        const validar = () => {
            const valor = input.tagName === 'SELECT' ? input.value.trim() : input.value.trim();
            const valido = campos[id].regex.test(valor);

            errorSpan.textContent = valido ? '' : campos[id].mensaje;
            errorSpan.style.display = valido ? 'none' : 'block';
        };

        validar(); // Validación inicial

        const evento = input.tagName === 'SELECT' ? 'change' : 'input';
        input.addEventListener(evento, validar);
        input.addEventListener('blur', validar);
    });

    // Validar al enviar el formulario
    form.addEventListener('submit', (e) => {
        let valido = true;

        Object.keys(campos).forEach(id => {
            const input = document.getElementById(id);
            const errorSpan = document.getElementById(`error-${id}`);
            if (!input || !errorSpan) return;

            const valor = input.tagName === 'SELECT' ? input.value.trim() : input.value.trim();
            const esValido = campos[id].regex.test(valor);

            errorSpan.textContent = esValido ? '' : campos[id].mensaje;
            errorSpan.style.display = esValido ? 'none' : 'block';

            if (!esValido) valido = false;
        });

        if (!valido) {
            e.preventDefault();
        }
    });
});