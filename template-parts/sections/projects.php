 <?php
/**
 * Секция "Наши работы" (переиспользуемая)
 */
?>
 <section class="section">
        <header class="section__header container">
            <div class="section__header-info">
                <h2 class="section__title">
                    наши работы <br> <span class="c-main">говорят</span> за нас
                </h2>
                <div class="section__description">
                    <p>
                        Мы можем <span class="c-main">мно-о-о-о-о-го</span> рассказывать
                        о качестве, но лучше просто показать
                    </p>
                </div>
            </div>

        </header>
        <div class="section__body">
            <div class="projects">
                <div class="projects__slider swiper">
                    <div class="projects__slider-wrapper swiper-wrapper">
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/1.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/2.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/3.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/4.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/5.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/1.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/2.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/3.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/4.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                        <div class="projects__slider-slide swiper-slide">
                            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects/5.jpg');"
                                class="projects__item">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="projects__slider-pagination visible-mobile">
                            <button class="projects__prev"></button>
                            <button class="projects__next"></button>
                        </div> -->
                </div>
                <a href="#" class="button projects__link">
                    <span>
                        Больше работ
                    </span>
                </a>
            </div>
        </div>
    </section>