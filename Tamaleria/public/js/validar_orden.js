document.addEventListener('DOMContentLoaded', function () {
    function crearMensajeError(mensaje, idElemento) {
        const mensajeError = document.createElement('div');
        mensajeError.style.color = 'red';
        mensajeError.style.fontSize = '0.8em';
        mensajeError.style.display = 'none';
        mensajeError.textContent = mensaje;
        document.getElementById(idElemento).parentElement.appendChild(mensajeError);
        return mensajeError;
    }

    const errores = {
        fecha: crearMensajeError('Por favor, seleccione una fecha válida.', 'fecha_orden'),
        total: crearMensajeError('Ingrese un total válido (mayor a 0).', 'total_orden'),
        descripcion: crearMensajeError('La descripción debe tener al menos 5 caracteres.', 'descripcion'),
    };

    const campoFecha = document.getElementById('fecha_orden');
    const campoTotal = document.getElementById('total_orden');
    const campoDescripcion = document.getElementById('descripcion');

    function validarFormulario() {
        const fechaValida = campoFecha.value !== '';
        const totalValido = parseFloat(campoTotal.value) > 0;
        const descripcionValida = campoDescripcion.value.trim().length >= 5;

        errores.fecha.style.display = fechaValida ? 'none' : 'block';
        errores.total.style.display = totalValido ? 'none' : 'block';
        errores.descripcion.style.display = descripcionValida ? 'none' : 'block';

        const valido = fechaValida && totalValido && descripcionValida;

        btnSubmit.disabled = !valido;
        return valido;
    }

    const formSteps = document.querySelectorAll('.form-step');
    const btnPrev = document.querySelector('.btn-prev');
    const btnNext = document.querySelector('.btn-next');
    const btnSubmit = document.querySelector('.btn-submit');
    let currentStep = 0;

    function updateFormStep() {
        formSteps.forEach((step, index) => {
            step.classList.toggle('active', index === currentStep);
        });

        btnPrev.disabled = currentStep === 0;
        btnNext.style.display = currentStep === formSteps.length - 1 ? 'none' : 'inline-block';
        btnSubmit.style.display = currentStep === formSteps.length - 1 ? 'inline-block' : 'none';

        validarFormulario();
    }

    btnNext.addEventListener('click', function () {
        currentStep++;
        updateFormStep();
    });

    btnPrev.addEventListener('click', function () {
        currentStep--;
        updateFormStep();
    });

    btnSubmit.addEventListener('click', function (event) {
        if (!validarFormulario()) {
            event.preventDefault();
        }
    });

    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(input => input.addEventListener('input', validarFormulario));

    updateFormStep();
});
