document.addEventListener('DOMContentLoaded', function () {

    const swiper = new Swiper('.service-hero__gallery-slider', {
        // Optional parameters
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        // Pagination
        pagination: {
            el: '.service-hero__gallery-slider-pagination',
            clickable: true,
            type: "bullets"
        },
    });

    const projectsSlider = new Swiper(".projects__slider", {
        grabCursor: true,
        loop: true,
        centeredSlides: true,
        spaceBetween: 20,
        slidesPerView: 4,
        // navigation: {
        //     nextEl: '.projects__next',
        //     prevEl: '.projects__prev',
        // },
        breakpoints: {
            1: {
                enabled: false,
                centeredSlides: false,
                spaceBetween: 0
            },
            820: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1160: {
                slidesPerView: 4,
                spaceBetween: 20
            }
        }
    })

    const reviews = new Swiper(".reviews__slider", {
        grabCursor: true,
        navigation: {
            nextEl: '.reviews__slider-nav-next',
            prevEl: '.reviews__slider-nav-prev',
        },
        breakpoints: {
            1: {
                grid: {
                    rows: 3,
                    fill: "row"
                },
                enabled: true,
                slidesPerView: 1,
                spaceBetween: 25,
            },
            820: {
                enabled: false,
            }
        },
        on: {
            init: function () {
                updateNavButtons(this);
            },
            reachBeginning: function () {
                updateNavButtons(this);
            },
            reachEnd: function () {
                updateNavButtons(this);
            },
            slideChange: function () {
                updateNavButtons(this);
            }
        }
    })

    function updateNavButtons(swiper) {
        const prevBtn = document.querySelector('.reviews__slider-nav-prev');
        const nextBtn = document.querySelector('.reviews__slider-nav-next');

        // Добавляем/удаляем классы в зависимости от положения слайдера
        if (swiper.isBeginning) {
            prevBtn.classList.add('slider-nav-disabled');
        } else {
            prevBtn.classList.remove('slider-nav-disabled');
        }

        if (swiper.isEnd) {
            nextBtn.classList.add('slider-nav-disabled');
        } else {
            nextBtn.classList.remove('slider-nav-disabled');
        }
    }

    //const faqSliders = document.querySelectorAll('.faq__slider');

    // Инициализация всех слайдеров с классом .faq__slider
    document.querySelectorAll('.faq__slider').forEach((sliderElement, index) => {
        // Генерируем уникальные классы для кнопок навигации этого слайдера
        const sliderId = `faq-slider-${index + 1}`;
        const prevBtnClass = "faq__slider-nav-prev";
        const nextBtnClass = "faq__slider-nav-next";

        // Находим кнопки навигации для этого слайдера (предполагаем, что они находятся в том же контейнере)
        const prevBtn = sliderElement.closest('.faq__slider')?.querySelector('.faq__slider-nav-prev');
        const nextBtn = sliderElement.closest('.faq__slider')?.querySelector('.faq__slider-nav-next');

        // Добавляем уникальные классы к кнопкам
        if (prevBtn) prevBtn.classList.add(prevBtnClass);
        if (nextBtn) nextBtn.classList.add(nextBtnClass);

        // Инициализируем слайдер
        const faqSlider = new Swiper(`#${sliderId}`, {
            grabCursor: true,
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: `.${nextBtnClass}`,
                prevEl: `.${prevBtnClass}`,
            },
            breakpoints: {
                300: {
                    slidesPerView: 1,
                    grid: {
                        rows: 3,
                        fill: "row"
                    },
                    spaceBetween: 10
                },
                821: {
                    enabled: false,
                    spaceBetween: 0,
                    slidesPerView: 2,
                    grid: {
                        rows: 1
                    }
                }
            },
            // Обработчики событий для обновления кнопок
            on: {
                init: function () {
                    updateFaqNavButtons(this, prevBtn, nextBtn);
                },
                reachBeginning: function () {
                    updateFaqNavButtons(this, prevBtn, nextBtn);
                },
                reachEnd: function () {
                    updateFaqNavButtons(this, prevBtn, nextBtn);
                },
                slideChange: function () {
                    updateFaqNavButtons(this, prevBtn, nextBtn);
                }
            }
        });
    });

    // Универсальная функция для обновления состояния кнопок
    function updateFaqNavButtons(swiper, prevBtn, nextBtn) {
        if (!prevBtn || !nextBtn) return;

        // Добавляем/удаляем классы в зависимости от положения слайдера
        if (swiper.isBeginning) {
            prevBtn.classList.add('slider-nav-disabled');
        } else {
            prevBtn.classList.remove('slider-nav-disabled');
        }

        if (swiper.isEnd) {
            nextBtn.classList.add('slider-nav-disabled');
        } else {
            nextBtn.classList.remove('slider-nav-disabled');
        }
    }

    const aboutSlider = new Swiper('.about-slider', {
        // Optional parameters
        grabCursor: true,
        loop: true,
        centeredSlides: true,
        spaceBetween: 10,
        slidesPerView: 2,
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },

        // Pagination
        pagination: {
            el: '.about-slider__pagination',
            clickable: true,
            type: "bullets"
        },
        breakpoints: {
            300: {
                slidesPerView: 1.1
            },
            961: {

            }
        },
    });
})
