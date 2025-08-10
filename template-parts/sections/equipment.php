<?php
/**
 * Секция "Всё оборудование"
 */
?>

<section class="section section--decoration-m">
    <header class="section__header container">
        <div class="section__header-info">
            <h1 class="section__title">
               <?php the_field('all_eq_title'); ?>
            </h1>
            <div class="section__description section__description--wide">
                <?php the_field('all_eq_description'); ?>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="devices container">
            <div class="devices__inner">
                <ul class="devices__list">
                    <?php
                    if (have_rows('all_eq_list')):
                        $counter = 1;
                        while (have_rows('all_eq_list')):
                            the_row();
                            $equipment = get_sub_field('all_eq_item');
                            if ($equipment):
                                setup_postdata($equipment);
                                $equipment_id = $equipment->ID;
                                $name = get_field('equipment_name', $equipment_id);
                                $description = get_field('equipment_description', $equipment_id);
                                $image = get_field('equipment_img', $equipment_id);
                                ?>
                                <li class="devices__item">
                                    <div class="device-item accordion">
                                        <input type="checkbox" id="accordion-device-<?php echo $counter; ?>"
                                            class="accordion__input visually-hidden">
                                        <label for="accordion-device-<?php echo $counter; ?>"
                                            class="accordion__header device-item__header">
                                            <span class="device-item__number">

                                            </span>
                                            <h3 class="device-item__name">
                                                <?php echo get_the_title($equipment_id); ?>

                                            </h3>
                                        </label>
                                        <div class="accordion__content">
                                            <div class="device-item__info">
                                                <?php if ($image): ?>
                                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo $name; ?>"
                                                        class="device-item__img">
                                                <?php endif; ?>
                                                <div class="device-item__texts">
                                                    <h4 class="device-item__title"> <?php echo $name ?></h4>
                                                    <div class="device-item__description">
                                                        <?php echo $description ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                wp_reset_postdata();
                                $counter++;
                            endif;
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>