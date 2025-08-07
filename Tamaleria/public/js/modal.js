document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal');
    const modalCloseButton = document.querySelector('.close-modal');

    document.querySelectorAll('.abrir-modal').forEach(button => {
        button.addEventListener('click', function () {
            modal.classList.add('show-modal');
        });
    });

    modalCloseButton.addEventListener('click', function () {
        modal.classList.remove('show-modal');
    });
});
