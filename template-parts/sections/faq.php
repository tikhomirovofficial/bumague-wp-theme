<?php
/**
 * Секция FAQ (переиспользуемая)
 */
?>
<section class="section section--decoration-m">
    <header class="section__header container">
        <div class="section__header-info">
            <h2 class="section__title">
                <?php the_field('faq_title', 'options'); ?>
            </h2>
            <div class="section__description section__description--wide">
                <?php the_field('faq_description', 'options'); ?>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="faq container">
            <?php if (have_rows('faq_groups', 'options')): ?>
                <ul class="faq__list">
                    <?php
                    $group_counter = 1;
                    while (have_rows('faq_groups', 'options')):
                        the_row();
                        $group_title = get_sub_field('faq_group_title');
                        ?>
                        <li class="faq__item">
                            <div class="faq__accordion accordion">
                                <input type="checkbox" id="accordion-faq-<?php echo $group_counter; ?>"
                                    class="accordion__input visually-hidden">
                                <label for="accordion-faq-<?php echo $group_counter; ?>" class="accordion__header">
                                    <h3 class="faq__item-title">
                                        <?php echo esc_html($group_title); ?>
                                    </h3>
                                    <div class="faq__accordion-state">
                                        <span>больше</span>
                                        <span>меньше</span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arro-down-right-dark.svg"
                                            alt="">
                                    </div>
                                </label>
                                <div class="accordion__content">
                                    <div id="faq-slider-<?php echo $group_counter; ?>" class="faq__slider swiper">
                                        <div class="faq__slider-wrapper swiper-wrapper">
                                            <?php
                                            if (have_rows('faq_list')):
                                                while (have_rows('faq_list')):
                                                    the_row();
                                                    $faq_item = get_sub_field('faq_item');
                                                    $question = $faq_item['faq_item_question'];
                                                    $answer = $faq_item['faq_item_answer'];
                                                    ?>
                                                    <div class="faq__slider-item swiper-slide">
                                                        <article class="faq-item">
                                                            <header class="faq-item__header">
                                                                <h4 class="faq-item__title">
                                                                    <?php echo $question ?>
                                                                </h4>
                                                            </header>
                                                            <div class="faq-item__description">
                                                                <?php echo $answer ?>
                                                            </div>
                                                        </article>
                                                    </div>
                                                <?php
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                        <div class="faq__slider-nav visible-mobile">
                                            <button type="button" class="faq__slider-nav-prev">
                                                <img style="scale: -1"
                                                    src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg"
                                                    alt="">
                                            </button>
                                            <button type="button" class="faq__slider-nav-next">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg"
                                                    alt="">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                        $group_counter++;
                    endwhile;
                    ?>
                </ul>
            <?php endif; ?>

            <a href="<?php the_field('faq_link', 'options'); ?>" class="button faq__link">
                <span>Справочная</span>
            </a>
        </div>
    </div>
</section>