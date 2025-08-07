/*****************FORMULARIO********************/
const nextButton = document.querySelector('.btn-next');
const prevButton = document.querySelector('.btn-prev');
const steps = document.querySelectorAll('.step');
const form_steps = document.querySelectorAll('.form-step');
let active = 1;

const registerButton = document.querySelector('.btn-submit');


if (steps.length === 1) {
    nextButton.style.display = 'none';
    prevButton.style.display = 'none';
    if (registerButton) {
        registerButton.style.display = 'block';
    }
}


nextButton.addEventListener('click', () => {
    active++;
    if (active > steps.length) {
        active = steps.length;
    }
    updateProgress();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});


prevButton.addEventListener('click', () => {
    active--;
    if (active < 1) {
        active = 1;
    }
    updateProgress();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});


const updateProgress = () => {
    steps.forEach((step, i) => {
        if (i == (active - 1)) {
            step.classList.add('active');
            form_steps[i].classList.add('active');
        } else {
            step.classList.remove('active');
            form_steps[i].classList.remove('active');
        }
    });


    prevButton.disabled = active === 1;


    if (active === steps.length) {
        nextButton.style.display = 'none';
        if (registerButton) {
            registerButton.style.display = 'block';
        }
    } else {
        nextButton.style.display = 'inline-block';
        if (registerButton) {
            registerButton.style.display = 'none';
        }
    }
};
