<?php
/**
 * Общая секция услуг
 */
?>

<section class="section">
    <div class="section__body">
        <div class="common-services container">
            <div class="common-services__inner">
                <div class="services common-services__services">
                    <h2 class="services__title title--alt">
                        Наши услуги
                    </h2>
                    <div class="common-services__grid">
                        <?php get_template_part('template-parts/blocks/services-list'); ?>

                        <?php get_template_part('template-parts/blocks/print'); ?>
                    </div>
                    <button data-modal="request-window" class="button button--unfilled services__button" type="button">
                        <span>
                            Оставить заявку
                        </span>
                    </button>
                    <?php if ($caption = get_field('c_services_caption', 'option')): ?>
                        <div class="services__caption">
                            <p><?php echo esc_html($caption); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php get_template_part('template-parts/blocks/print'); ?>
            </div>
        </div>
    </div>
</section>