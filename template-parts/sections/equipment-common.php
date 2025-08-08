<?php
/**
 * Секция оборудование (переиспользуемая)
 */
?>
<section class="section section--decoration-equipment">
    <header class="section__header container">
        <div class="section__header-info">
            <h2 class="section__title">
                <?php the_field('c_equipment_title', 'options'); ?>
            </h2>
            <div class="section__description section__description--medium">
                <?php the_field('c_equipment_description', 'options'); ?>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="equipment container">
            <div class="equipment__inner">
                <?php if (have_rows('c_equipment_list', 'options')): ?>
                    <ul class="equipment__list">
                        <?php
                        $counter = 1;
                        while (have_rows('c_equipment_list', 'options')):
                            the_row();

                            $equipment_post = get_sub_field('c_equipment_item'); // Это объект записи WP_Post
                            $equipment_title = $equipment_post->post_title;
                            $equipment_img = get_field('equipment_img', $equipment_post->ID);
                            $equipment_name = get_field('equipment_name', $equipment_post->ID);
                            $equipment_description = get_field('equipment_description', $equipment_post->ID);
                            ?>
                            <li class="equipment__item">
                                <div class="equipment-item">
                                    <span
                                        class="equipment-item__number">//<?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></span>
                                    <div class="equipment-item__img">
                                        <?php if ($equipment_img): ?>
                                            <img src="<?php echo $equipment_img; ?>"
                                                alt="<?php echo esc_html($equipment_title); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="equipment-item__title">
                                        <?php echo esc_html($equipment_title); ?>
                                    </div>
                                    <div class="equipment-item__description">
                                        <?php echo esc_html($equipment_name); ?>
                                    </div>
                                </div>
                            </li>
                            <?php
                            $counter++;
                        endwhile;
                        ?>
                    </ul>
                <?php endif; ?>

                <a href="<?php the_field('c_equipment_link', 'options'); ?>"
                    class="button equipment__link button--arrow">
                    <span class="title--alt">Смотреть всё оборудование</span>
                    <div class="button__arrow-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-down-right.svg" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>