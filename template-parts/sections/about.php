<?php
/**
 * Секция "О нас"
 */
?>

<section class="section">
    <header class="section__header about-header container">
        <div class="section__header-info">
            <h1 class="section__title">
                <?php the_field('about_title'); ?>
            </h1>
        </div>
    </header>
    <div class="section__body">
        <div class="about">
            <?php
            $gallery = get_field('about_imgs');
            if ($gallery): ?>
                <div class="about-slider swiper">
                    <div class="about-slider__wrapper swiper-wrapper">
                        <?php foreach ($gallery as $image): ?>
                            <div class="about-slider__slide swiper-slide">
                                <div style="background-image: url('<?php echo esc_url($image); ?>');" class="about-img">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="about-slider__pagination"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section section--decoration-cells">
    <header class="section__header container">
        <div class="section__header-info">
            <h2 class="section__title section__title--wide">
                <?php the_field('about_features_title'); ?>
            </h2>
            <div class="section__description section__description--wide">
                <?php the_field('about_features_description'); ?>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="company-qualities container">
            <?php if (have_rows('about_features_list')): ?>
                <ul class="company-qualities__list">
                    <?php while (have_rows('about_features_list')):
                        the_row();
                        $feature = get_sub_field('about_feature_item');
                        ?>
                        <li class="company-qualities__item">
                            <div class="quality-item">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/quality.svg" loading="lazy"
                                    height="50" width="50" alt="">
                                <h3 class="quality-item__title">
                                    <?php echo esc_html($feature); ?>
                                </h3>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>