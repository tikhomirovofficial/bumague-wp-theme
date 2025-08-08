<?php
/**
 * Общий список услуг (переиспользуемая)
 * 
 */

?>

<ul class="services__list">
    <?php
    if (have_rows('c_services_list', 'option')):
        while (have_rows('c_services_list', 'option')):
            the_row();
            $service = get_sub_field('c_service_item');
            if ($service):
                $service_title = get_the_title($service);
                $service_description = get_field('service_description', $service->ID);
                $service_price = get_field('service_price_start', $service->ID);
                ?>
                <li class="services__item">
                    <div class="service-item">
                        <div class="service-item__info">
                            <?php if ($service_title): ?>
                                <h3 class="service-item__title"><?php echo esc_html($service_title); ?></h3>
                            <?php endif; ?>

                            <?php if ($service_description): ?>
                                <div class="service-item__description">
                                    <p><?php echo esc_html($service_description); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <button data-modal="request-window" class="service-item__btn">
                            Заказать
                        </button>

                        <?php if ($service_price): ?>
                            <span class="service-item__price">
                                от <?php echo number_format((float) $service_price, 0, '', ' '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </li>
                <?php
            endif;
        endwhile;
    else:
        // Fallback контент, если услуги не заполнены
        ?>
        <li class="services__item">
            <div class="service-item">
                <div class="service-item__info">
                    <h3 class="service-item__title">Визитки</h3>
                    <div class="service-item__description">
                        <p>Визитки Ваше первое впечатление – в деталях. Печать визиток с выбором
                            дизайна или
                            по вашему макету.</p>
                    </div>
                </div>
                <button data-modal="request-window" class="service-item__btn">
                    Заказать
                </button>
                <span class="service-item__price">
                    от 1 400
                </span>
            </div>
        </li>
        <li class="services__item">
            <div class="service-item">
                <div class="service-item__info">
                    <h3 class="service-item__title">Листовки</h3>
                    <div class="service-item__description">
                        <p>Ярко, быстро, эффективно. Любые форматы листовок, оперативная печать,
                            насыщенные
                            цвета.</p>
                    </div>
                </div>
                <button data-modal="request-window" class="service-item__btn">
                    Заказать
                </button>
                <span class="service-item__price">
                    от 1 400
                </span>
            </div>
        </li>
    <?php endif; ?>
</ul>