<?php
/**
 * Преимущества услуги (переиспользуемая)
 * 
 */
$title = get_query_var('service_features_title', 'Продукты типографии');
?>

<section class="section">
    <header class="section__header container">
        <div class="section__header-info">
            <h2 class="section__title section__title--biggest">
                <?php the_field("services_adventures_title", "option"); ?>
            </h2>
            <div class="section__description section__description--wide">
                <p>
                    Точно в Цель: <?php echo esc_html(mb_strtolower($title, 'UTF-8')); ?>, которые решают ваши задачи:
                    познакомить, запомниться, продать.
                </p>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="advantages container">
            <div class="advantages__inner">
                <?php
                $advantages = get_field('services_adventures', 'option');
                if ($advantages && is_array($advantages)):
                    ?>
                    <ul class="advantages__list">
                        <?php foreach ($advantages as $item): ?>
                            <li class="advantages__item">
                                <div class="quality-item">
                                    <?php if (!empty($item['s_adventure_name'])): ?>
                                        <h3 class="quality-item__title">
                                            <?php echo esc_html($item['s_adventure_name']); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($item['s_adventure_description'])): ?>
                                        <div class="quality-item__description">
                                            <p><?php echo esc_html($item['s_adventure_description']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <ul class="advantages__list">
                        <li class="advantages__item">
                            <div class="quality-item">
                                <h3 class="quality-item__title">Дизайн-поддержка</h3>
                                <div class="quality-item__description">
                                    <p>Бесплатная консультация дизайнера. Поможем создать или адаптировать макет.</p>
                                </div>
                            </div>
                        </li>
                        <li class="advantages__item">
                            <div class="quality-item">
                                <h3 class="quality-item__title">Срочная печать</h3>
                                <div class="quality-item__description">
                                    <p>Нужно очень быстро? Сделаем в срок и даже раньше!</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>