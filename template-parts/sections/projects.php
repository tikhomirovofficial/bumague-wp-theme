<?php
/**
 * Секция "Наши работы" (переиспользуемая)
 */
?>
<section class="section">
    <header class="section__header container">
        <div class="section__header-info">
            <h2 class="section__title">
                <?php the_field('portfolio_title', 'option') ?: 'наши работы <br> <span class="c-main">говорят</span> за нас'; ?>
            </h2>
            <div class="section__description">
                <?php if (get_field('portfolio_description', 'option')): ?>
                    <?php the_field('portfolio_description', 'option'); ?>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="section__body">
        <div class="projects">
            <?php
            $portfolio_images = get_field('portfolio_list', 'option');
            if ($portfolio_images):
                ?>
                <div class="projects__slider swiper">
                    <div class="projects__slider-wrapper swiper-wrapper">
                        <?php foreach ($portfolio_images as $image): ?>
                            <div class="projects__slider-slide swiper-slide">
                                <div style="background-image: url('<?php echo esc_url($image); ?>');" class="projects__item">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php
                $portfolio_link = get_field('portfolio_link', 'option');
                if ($portfolio_link):
                 
                    ?>
                    <a href="<?php echo esc_url($portfolio_link); ?>" class="button projects__link">
                        <spa>Все работы</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</section>