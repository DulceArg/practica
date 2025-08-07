'use strict';

const header = document.querySelector("[data-header]");
const navToggleBtn = document.querySelector("[data-menu-toggle-btn]");

navToggleBtn?.addEventListener("click", function () {
    header.classList.toggle("active");
});

/************card********************/
const menuBtn = document.querySelectorAll("[data-menu-btn]");
for (let i = 0; i < menuBtn.length; i++) {
    menuBtn[i].addEventListener("click", function () {
        this.nextElementSibling.classList.toggle("active");
    });
}

/************button more********************/
const loadMoreBtn = document.querySelector("[data-load-more]");
loadMoreBtn?.addEventListener("click", function () {
    this.classList.toggle("active");
});
