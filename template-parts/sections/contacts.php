<?php
/**
 * Контактная секция (переиспользуемая)
 */
?>
<section class="section">
    <h2 class="visually-hidden">Наши контакты</h2>
    <div class="section__body">
        <div class="contacts container">
            <div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/icons/m_decoration.svg');"
                class="contacts__inner">
                <div class="contacts__info">
                    <header class="contacts__info-header">
                        <address class="contacts__info-address">
                            <h3>
                                <br> <?php the_field("c_address", "option"); ?>
                            </h3>
                        </address>
                        <div class="contacts__info-socials">
                            <a href="tg://resolve?domain=<?php echo esc_attr(get_field("c_telegram", "option")); ?>">
                                <img height="56" width="56" loading="lazy"
                                    src="<?php echo get_template_directory_uri(); ?>/images/icons/telegram.svg"
                                    alt="Telegram">
                            </a>
                            <a
                                href="https://wa.me/<?php echo esc_attr(wp_normalize_phone(get_field("c_phone", "option"))); ?>">
                                <img height="56" width="56" loading="lazy"
                                    src="<?php echo get_template_directory_uri(); ?>/images/icons/whatsapp.svg"
                                    alt="WhatsApp">
                            </a>
                        </div>
                    </header>
                    <div class="contacts__info-main">
                        <span class="contacts__info-item">
                            <?php the_field("c_work_time", "option"); ?>
                        </span>
                        <a href="tel:<?php echo esc_attr(wp_normalize_phone(get_field("c_phone", "option"))); ?>"
                            class="contacts__link contacts__info-item">
                            <?php the_field("c_phone", "option"); ?>
                        </a>
                        <a href="mailto:<?php echo esc_attr(get_field("c_email", "option")); ?>"
                            class="contacts__link contacts__info-item">
                            <?php the_field("c_email", "option"); ?>
                        </a>
                    </div>
                </div>
                <div class="contacts__map">
                    <iframe class="contacts__map-element"
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A029a343ff4e2c1eadb76eec6c4d2fbdf43a8cce4b211ca350af224400d04ea01&amp;source=constructor"
                        width="100%" height="459" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>