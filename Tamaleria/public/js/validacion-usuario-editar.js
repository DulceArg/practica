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
        },
        contrasena: {
            regex: /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/,
            mensaje: "Mínimo 8 caracteres, una mayúscula, un número y un carácter especial.",
            opcional: true
        }
    };

    Object.keys(campos).forEach(id => {
        const input = document.getElementById(id);
        if (!input) return;

        let errorSpan = document.getElementById(`error-${id}`);
        if (!errorSpan) {
            errorSpan = document.createElement('span');
            errorSpan.id = `error-${id}`;
            errorSpan.style.color = 'red';
            errorSpan.style.fontSize = '0.9em';
            errorSpan.style.display = 'none';
            errorSpan.classList.add('error-text');
            input.parentNode.appendChild(errorSpan);
        }

        const validar = () => {
            const valor = input.value.trim();
            const campo = campos[id];

            // ✅ Si el campo fue marcado como validado por JS externo (como prefillDireccion)
            if (input.dataset.validado === 'true') {
                errorSpan.textContent = "";
                errorSpan.style.display = 'none';
                return;
            }

            // ✅ Si es opcional y está vacío, permitir
            if (campo.opcional && valor === "") {
                errorSpan.textContent = "";
                errorSpan.style.display = 'none';
                return;
            }

            const esValido = campo.regex.test(valor);
            errorSpan.textContent = esValido ? "" : campo.mensaje;
            errorSpan.style.display = esValido ? 'none' : 'block';
        };

        validar();

        const evento = input.tagName === 'SELECT' ? 'change' : 'input';
        input.addEventListener(evento, validar);
        input.addEventListener('blur', validar);
    });

    // Validar al enviar el formulario
    form.addEventListener('submit', (e) => {
        let valido = true;

        Object.keys(campos).forEach(id => {
            const input = document.getElementById(id);
            const campo = campos[id];
            const valor = input ? input.value.trim() : "";
            const errorSpan = document.getElementById(`error-${id}`);
            if (!input || !errorSpan) return;

            
            if (input.dataset.validado === 'true') {
                errorSpan.textContent = "";
                errorSpan.style.display = 'none';
                return;
            }

            
            if (campo.opcional && valor === "") {
                errorSpan.textContent = "";
                errorSpan.style.display = 'none';
                return;
            }

            const esValido = campo.regex.test(valor);
            errorSpan.textContent = esValido ? "" : campo.mensaje;
            errorSpan.style.display = esValido ? 'none' : 'block';
            if (!esValido) valido = false;
        });

        if (!valido) {
            e.preventDefault();
        }
    });
});
