const wrapper = document.querySelector('.wrapper');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

// Mostrar el modal de login
btnPopup?.addEventListener('click', () => {
    wrapper?.classList.add('active-popup');
});

// Cerrar el modal
iconClose?.addEventListener('click', () => {
    wrapper?.classList.remove('active-popup');
});

window.addEventListener('load', () => {
    wrapper?.classList.remove('active');
});
