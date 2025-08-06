<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bumague
 */

?>


 <footer class="footer">
        <div class="footer__inner">
            <div class="footer__main ">
                <div class="footer__main-top container">
                    <div class="footer__company">
                        <h2 class="footer__title">
                            <span class="c-main">Бумажечка - </span>
                            цифровая типография в Москве
                        </h2>
                        <a href="#" class="footer__logo logo">
                            bumague
                        </a>
                    </div>
                    <nav class="footer__nav">
                        <ul class="footer__nav-list">
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="">О нас</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="">Оборудование</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="">Справочная</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="">FAQ</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="">Оплата</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="">Доставка</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="footer__services">
                        <ul class="footer__services-list">
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Визитки</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Листовки</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Буклеты</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Открытки</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Наклейки</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Меню</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Лифтет/гармошки/евробуклеты</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="">Каталоги/Брошюры</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer__main-bottom container">
                    <div class="footer__contacts">
                        <address class="footer__contacts-address">
                            <span class="footer__contacts-item">
                                Москва, Самокатная 4, строение 7
                            </span>
                        </address>
                        <a href="tel:+79266641488" class="footer__contacts-item">
                            +7 926 664 14 88
                        </a>
                        <a href="mailto:a1@bumague.ru" class="footer__contacts-item">
                            a1@bumague.ru
                        </a>
                    </div>
                    <a href="" class="footer__button button">
                        <span>
                            Политика конфиденциальности
                        </span>

                    </a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__bottom-inner container">
                    <div class="footer__bottom-ps">
                        <p>
                            Информация на данном интернет-сайте носит информационный
                            характер
                            и не является публичной офертой, определяемой положениями
                            Статьи 437 (2) ГК РФ
                        </p>
                    </div>
                    <div class="footer__creator">
                        <span>сайт сделан</span>
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <img width="160" height="29" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/icons/babushka.svg" alt="">
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </footer>
    <script src="<?php echo get_template_directory_uri(); ?>/js/sliders.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/mobile-menu.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/select-field.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/upload-field.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/windows.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/phone-mask.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/forms-validation.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/form-senders.js"></script>
</body>

<?php wp_footer(); ?>