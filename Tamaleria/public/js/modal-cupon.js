document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal');
    const modalCloseButton = document.querySelector('.close-modal');

    // Botones para abrir modal
    document.querySelectorAll('.abrir-modal').forEach(button => {
        button.addEventListener('click', function () {
            // Obtener los atributos del botón clicado
            const cuponId = this.getAttribute('data-cupon-id');
            const tipoCuponId = this.getAttribute('data-tipo-cupon-id');
            const totalOrden = this.getAttribute('data-total-orden');

            // Insertar los valores en el formulario dentro del modal
            document.getElementById('inputCuponId').value = cuponId;
            document.getElementById('inputTipoCuponId').value = tipoCuponId;
            document.getElementById('inputTotalOrden').value = totalOrden;

            modal.classList.add('show-modal');
        });
    });

    // Cierre del modal
    modalCloseButton.addEventListener('click', function () {
        modal.classList.remove('show-modal');
    });
});
