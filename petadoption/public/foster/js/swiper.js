import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

        const swiper = new Swiper('.gallery-top', {
            spaceBetween: 10,
            thumbs: {
                swiper: {
                    el: '.gallery-thumbs',
                    spaceBetween: 3,
                    slidesPerView: 3,
                    freeMode: true,
                },
            },
        });