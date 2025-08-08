<?php
/**
 * Секция достоинства компании (переиспользуемая)
 */
?>


<div class="features">
    <div class="features__main">
        <?php
        // Получаем данные из option-полей
        $adventures_title = get_field('cm_adventures_title', 'option');
        $adventures_tail = get_field('cm_adventures_tail', 'option');
        $adventures = get_field('cm_adventures', 'option');
        ?>

        <h2 class="features__title title--alt">
            <?php echo $adventures_title ? esc_html($adventures_title) : 'ПОЧЕМУ ВЫБИРАЮТ НАС?'; ?>
        </h2>

        <?php if ($adventures): ?>
            <ul class="features__list">
                <?php foreach ($adventures as $item): ?>
                    <li class="features__item">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/feature.svg" loading="lazy"
                            alt="" class="feature__icon">
                        <?php if (isset($item['cm_ad_title'])): ?>
                            <h3 class="features__item-title">
                                <?php echo esc_html($item['cm_ad_title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (isset($item['cm_ad_description'])): ?>
                            <div class="features__item-description">
                                <p><?php echo esc_html($item['cm_ad_description']); ?></p>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <!-- Fallback если нет данных -->
            <ul class="features__list">
                <li class="features__item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/feature.svg" loading="lazy"
                        alt="" class="feature__icon">
                    <h3 class="features__item-title">
                        Ответственность
                    </h3>
                    <div class="features__item-description">
                        <p>Срок, качество, планирование - все держим под контролем от и до.</p>
                    </div>
                </li>
                <li class="features__item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/feature.svg" loading="lazy"
                        alt="" class="feature__icon">
                    <h3 class="features__item-title">
                        Премиум-качество печати
                    </h3>
                    <div class="features__item-description">
                        <p>Современное цифровое оборудование гарантирует яркие, четкие и стойкие цвета</p>
                    </div>
                </li>
            </ul>
        <?php endif; ?>
    </div>

    <div class="features__connector"></div>

    <?php if ($adventures_tail): ?>
        <div class="features__tail">
            <div class="feautre__tail-wrapper">
                <div class="features__tail-text">
                    <?php echo esc_html($adventures_tail); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="features__tail">
            <div class="feautre__tail-wrapper">
                <div class="features__tail-text">
                    bumague
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>