<?php
/**
 * Подвал сайта
 */
?>

<footer class="footer">
    <div class="footer__inner">
        <div class="footer__main">
            <div class="footer__main-top container">
                <div class="footer__company">
                    <h2 class="footer__title">
                        <?php echo get_field("footer_title", "options"); ?>
                    </h2>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo logo">
                        <?php echo esc_html(get_field("c_name", "options")); ?>
                    </a>
                </div>

                <?php if (have_rows('footer_menu', 'option')): ?>
                    <nav class="footer__nav">
                        <ul class="footer__nav-list">
                            <?php while (have_rows('footer_menu', 'option')):
                                the_row();
                                $menu_item = get_sub_field('footer_menu_item');
                                $text = $menu_item['f_menu_item_text'];
                                $link = $menu_item['f_menu_item_link'];
                                ?>
                                <li class="footer__nav-item">
                                    <a class="footer__nav-link" href="<?php echo esc_url($link); ?>">
                                        <?php echo esc_html($text); ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </nav>
                <?php else: ?>
                    <!-- Fallback навигация -->
                    <nav class="footer__nav">
                        <ul class="footer__nav-list">
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="/about">О нас</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="/equipment">Оборудование</a>
                            </li>
                            <li class="footer__nav-item">
                                <a class="footer__nav-link" href="/help">Справочная</a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>

                <?php if (have_rows('footer_services', 'option')): ?>
                    <div class="footer__services">
                        <ul class="footer__services-list">
                            <?php while (have_rows('footer_services', 'option')):
                                the_row();
                                $service_item = get_sub_field('footer_service_item');
                                $service = $service_item['footer_service_obj'];

                                if ($service):
                                    $mini_title = get_field('service_mini_title', $service->ID);
                                    $display_title = $mini_title ?: get_the_title($service->ID);
                                    ?>
                                    <li class="footer__services-item">
                                        <a class="footer__services-link" href="<?php echo esc_url(get_permalink($service->ID)); ?>">
                                            <?php echo esc_html($display_title); ?>
                                        </a>
                                    </li>
                                <?php
                                endif;
                            endwhile; ?>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Fallback услуг -->
                    <div class="footer__services">
                        <ul class="footer__services-list">
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="/visiting-cards">Визитки</a>
                            </li>
                            <li class="footer__services-item">
                                <a class="footer__services-link" href="/flyers">Листовки</a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer__main-bottom container">
                <div class="footer__contacts">
                    <address class="footer__contacts-address">
                        <?php if ($address = get_field("c_address", "options")): ?>
                            <span class="footer__contacts-item">
                                <?php echo $address; ?>
                            </span>
                        <?php endif; ?>
                    </address>

                    <?php if ($phone = get_field("c_phone", "option")): ?>
                        <a href="tel:<?php echo esc_attr(wp_normalize_phone($phone)); ?>" class="footer__contacts-item">
                            <?php echo esc_html($phone); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($email = get_field("c_email", "option")): ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="footer__contacts-item">
                            <?php echo esc_html($email); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ($privacy_policy = get_field("c_privacy", "option")): ?>
                    <a href="<?php echo esc_url($privacy_policy); ?>" target="_blank" class="footer__button button">
                        <span>Политика конфиденциальности</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="footer__bottom-inner container">
                <div class="footer__bottom-ps">
                    <p>
                        Информация на данном интернет-сайте носит информационный характер
                        и не является публичной офертой, определяемой положениями
                        Статьи 437 (2) ГК РФ
                    </p>
                </div>
                <div class="footer__creator">
                    <span>сайт сделан</span>
                    <a href="#" target="_blank" rel="noopener noreferrer">
                        <img width="160" height="29" loading="lazy"
                            src="<?php echo esc_url(get_template_directory_uri() . '/images/icons/babushka.svg'); ?>"
                            alt="Разработчик сайта">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>