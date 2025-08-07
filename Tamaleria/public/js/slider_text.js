document.addEventListener('DOMContentLoaded', function () {
    let swiperHome = new Swiper('.home__swiper', {
        loop: true,
        spaceBetween: 2, //-22
        grabCursor: true,
        slidesPerView: 'auto',
        centeredSlides: true, //'auto'
        
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        breakpoints: {
            1220: {
                spaceBetween: 2, //-32
            }
        }
    });
});
