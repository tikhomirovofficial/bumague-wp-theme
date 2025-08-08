<?php
/**
 * Секция отзывов
 */
?>


<section class="section section--decoration-s">
    <header class="section__header container">
        <div class="section__header-info">
            <h2 class="section__title">
                <?php the_field('reviews_title', 'option'); ?>
            </h2>
            <?php if (get_field('reviews_description', 'option')): ?>
                <div class="section__description">
                    <p><?php the_field('reviews_description', 'option'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="section__body">
        <div class="reviews container">
            <div class="reviews__slider swiper">
                <div class="reviews__slider-wrapper swiper-wrapper">
                    <?php
                    $reviews = get_field('reviews', 'option');
                    if ($reviews && is_array($reviews)):
                        foreach ($reviews as $review):
                            $item = $review['reviews_item'];
                            if (empty($item))
                                continue;

                            $author = $item['review_author'];
                            $position = $item['review_position'];
                            $avatar = $item['review_avatar'];
                            $text = $item['review_text'];
                            $highlight = $item['review_highlight'];
                            ?>
                            <div class="reviews__slider-item swiper-slide">
                                <article class="review-item <?php echo $highlight ? 'review-item-highlight' : ''; ?>">
                                    <header class="review-item__header">
                                        <div class="review-item__profile">
                                            <?php if ($avatar): ?>
                                                <div style="background-image: url('<?php echo esc_url($avatar); ?>')"
                                                    class="review-item__profile-img">
                                                </div>
                                            <?php endif; ?>
                                            <div class="review-item__profile-info">
                                                <?php if ($author): ?>
                                                    <div class="review-item__profile-name">
                                                        <?php echo esc_html($author); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($position): ?>
                                                    <div class="review-item__profile-position">
                                                        <?php echo esc_html($position); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <time class="review-item__date" datetime="<?php echo date('Y-m-d'); ?>">
                                            <?php echo date('d.m.Y'); ?>
                                        </time>
                                    </header>
                                    <?php if ($text): ?>
                                        <div class="review-item__content">
                                            <?php echo wpautop($text); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="review-item__tail">
                                        <div class="review-item__tail-triangle"></div>
                                    </div>
                                </article>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="reviews__slider-nav visible-mobile">
                    <button type="button" class="reviews__slider-nav-prev">
                        <img style="scale: -1"
                            src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg" alt="">
                    </button>
                    <button type="button" class="reviews__slider-nav-next">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/slider-arrow.svg" alt="">
                    </button>
                </div>
            </div>
            <a href="#" class="button reviews__link">
                <span>Все отзывы</span>
            </a>
        </div>
    </div>
</section>