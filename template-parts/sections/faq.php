<?php
/**
 * Секция FAQ (переиспользуемая)
 */
?>
 <section class="section section--decoration-m">
        <header class="section__header container">
            <div class="section__header-info">
                <h2 class="section__title">
                    часто спрашивают —
                    с радостью <span class="c-main">отвечаем</span>
                </h2>
                <div class="section__description section__description--wide">
                    <p>
                        Мы любим честность и простоту. Вот ответы на то,
                        <br> что вы, скорее всего, хотели спросить <span class="c-main">(но
                            стеснялись)</span>
                    </p>
                </div>
            </div>
        </header>
        <div class="section__body">
            <div class="faq container">
                <ul class="faq__list">
                    <li class="faq__item">
                        <div class="faq__accordion accordion">
                            <input type="checkbox" id="accordion-faq-1" class="accordion__input visually-hidden">
                            <label for="accordion-faq-1" class="accordion__header">
                                <h3 class="faq__item-title">
                                    А можно ли...
                                </h3>
                                <div class="faq__accordion-state">
                                    <span>больше</span>
                                    <span>меньше</span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arro-down-right-dark.svg"
                                        alt="">
                                </div>
                            </label>
                            <div class="accordion__content">
                                <div id="faq-slider-1" class="faq__slider swiper">
                                    <div class="faq__slider-wrapper swiper-wrapper">
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Конечно! Наш адрес: Москва,
                                                        Самокатная 4, строение 7
                                                        (территория завода "Кристалл").
                                                        После проходной
                                                        двигайтесь
                                                        налево — увидите четыре больших
                                                        окна! Это мы :)
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...напечатать быстро?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Конечно! Наш адрес: Москва,
                                                        Самокатная 4, строение 7
                                                        (территория завода "Кристалл").
                                                        После проходной
                                                        двигайтесь
                                                        налево — увидите четыре больших
                                                        окна! Это мы :)
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Ваш заказ — от 1 часа до 1 дня!
                                                        Срочные заказы
                                                        (визитки/листовки) напечатаем
                                                        при вас за 15-30
                                                        минут.
                                                        Точный
                                                        срок назовем после просчёта
                                                        тиража.
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Отличная работа! Всегда
                                                        оперативно реагируют на
                                                        заказы,
                                                        качество печати
                                                        на высоте — цвета яркие,
                                                        четкость отличная. Приятно
                                                        удивила
                                                        цена — недорогие
                                                        услуги по сравнению
                                                        с конкурентами.
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Отличная работа! Всегда
                                                        оперативно реагируют на
                                                        заказы,
                                                        качество печати
                                                        на высоте — цвета яркие,
                                                        четкость отличная. Приятно
                                                        удивила
                                                        цена — недорогие
                                                        услуги по сравнению
                                                        с конкурентами.
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="faq__slider-nav visible-mobile">
                                        <button type="button" class="faq__slider-nav-prev">
                                            <img style="scale: -1"
                                                src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg"
                                                alt="">
                                        </button>
                                        <button type="button" class="faq__slider-nav-next">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg"
                                                alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="faq__item">
                        <div class="faq__accordion accordion">
                            <input type="checkbox" id="accordion-faq-2" class="accordion__input visually-hidden">
                            <label for="accordion-faq-2" class="accordion__header">
                                <h3 class="faq__item-title">
                                    А можно ли...
                                </h3>
                                <div class="faq__accordion-state">
                                    <span>больше</span>
                                    <span>меньше</span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arro-down-right-dark.svg"
                                        alt="">
                                </div>
                            </label>
                            <div class="accordion__content">
                                <div id="faq-slider-2" class="faq__slider swiper">
                                    <div class="faq__slider-wrapper swiper-wrapper">
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Конечно! Наш адрес: Москва,
                                                        Самокатная 4, строение 7
                                                        (территория завода "Кристалл").
                                                        После проходной
                                                        двигайтесь
                                                        налево — увидите четыре больших
                                                        окна! Это мы :)
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...напечатать быстро?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Конечно! Наш адрес: Москва,
                                                        Самокатная 4, строение 7
                                                        (территория завода "Кристалл").
                                                        После проходной
                                                        двигайтесь
                                                        налево — увидите четыре больших
                                                        окна! Это мы :)
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Ваш заказ — от 1 часа до 1 дня!
                                                        Срочные заказы
                                                        (визитки/листовки) напечатаем
                                                        при вас за 15-30
                                                        минут.
                                                        Точный
                                                        срок назовем после просчёта
                                                        тиража.
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Отличная работа! Всегда
                                                        оперативно реагируют на
                                                        заказы,
                                                        качество печати
                                                        на высоте — цвета яркие,
                                                        четкость отличная. Приятно
                                                        удивила
                                                        цена — недорогие
                                                        услуги по сравнению
                                                        с конкурентами.
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="faq__slider-item swiper-slide">
                                            <article class="faq-item">
                                                <header class="faq-item__header">
                                                    <h4 class="faq-item__title">
                                                        ...приехать к вам
                                                        на производство?
                                                    </h4>
                                                </header>
                                                <div class="faq-item__description">
                                                    <p>
                                                        Отличная работа! Всегда
                                                        оперативно реагируют на
                                                        заказы,
                                                        качество печати
                                                        на высоте — цвета яркие,
                                                        четкость отличная. Приятно
                                                        удивила
                                                        цена — недорогие
                                                        услуги по сравнению
                                                        с конкурентами.
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="faq__slider-nav visible-mobile">
                                        <button type="button" class="faq__slider-nav-prev">
                                            <img style="scale: -1"
                                                src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg"
                                                alt="">
                                        </button>
                                        <button type="button" class="faq__slider-nav-next">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg"
                                                alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
                <a href="#" class="button faq__link">
                    <span>Справочная</span>
                </a>
    </section>