<?php
/**
 * Секция портфолио с AJAX-фильтрацией
 */

// Получаем все категории портфолио
$portfolio_categories = get_terms([
    'taxonomy'   => 'portfolio_category',
    'hide_empty' => true,
    'orderby'    => 'name',
    'order'      => 'ASC'
]);

// Получаем первые работы для первоначальной загрузки
$portfolio_args = [
    'post_type'      => 'gallery', // Используем тип записи "Фотография"
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish'
];

$portfolio_query = new WP_Query($portfolio_args);
?>

<section class="section portfolio-section section--decoration-s">
    <header class="section__header container">
        <div class="section__header-info">
            <h1 class="section__title">
                наши <span class="c-main">работы</span>
            </h1>
        </div>
        <div class="section__header-additional">
            <button data-modal="quick-request-window" class="button button--accent" type="button">
                <div class="button__decoration">
                    <svg class="button__decoration-icon" width="62" height="101" viewBox="0 0 62 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Ваш SVG код кнопки -->
                    </svg>
                </div>
                <span>Хочу также!</span>
                <div class="button__decoration">
                    <svg class="button__decoration-icon" width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Ваш SVG код кнопки -->
                    </svg>
                </div>
            </button>
        </div>
    </header>
    
    <div class="section__body">
        <div class="portfolio container">
            <div class="portfolio__inner">
                <!-- Фильтры по категориям -->
                <ul class="portfolio__tabs">
                    <li class="portfolio__tabs-item">
                        <button class="filter-item filter-item--active" data-category="all">
                            <span>ВСЕ</span>
                        </button>
                    </li>
                    
                    <?php foreach ($portfolio_categories as $category) : ?>
                        <li class="portfolio__tabs-item">
                            <button class="filter-item" data-category="<?php echo esc_attr($category->slug); ?>">
                                <span><?php echo esc_html($category->name); ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                <!-- Галерея работ -->
                <div class="portfolio__gallery">
                    <ul class="portfolio__gallery-list" id="portfolio-gallery">
                        <?php if ($portfolio_query->have_posts()) : ?>
                            <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); 
                                $gallery_img = get_field('gallery_img');
                            ?>
                                <li class="portfolio__gallery-item" 
                                    style="background-image: url('<?php echo $gallery_img ? esc_url($gallery_img) : esc_url(get_template_directory_uri() . '/images/projects/portfolio.jpg'); ?>')"
                                    data-categories="<?php 
                                        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                                        if ($terms && !is_wp_error($terms)) {
                                            $term_slugs = array_map(function($term) { 
                                                return $term->slug; 
                                            }, $terms);
                                            echo esc_attr(implode(' ', $term_slugs));
                                        }
                                    ?>">
                                </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <li class="no-projects">Работ не найдено</li>
                        <?php endif; ?>
                    </ul>
                    
                    <!-- Кнопка загрузки -->
                    <?php if ($portfolio_query->found_posts > 12) : ?>
                        <button class="portfolio__gallery-load" id="load-more-portfolio" data-page="1" data-category="all">
                            <span>Загрузить еще</span>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/icons/arro-down-right-dark.svg'); ?>" alt="">
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    // Обработчик фильтрации
    $('.portfolio__tabs .filter-item').on('click', function() {
        // Обновляем активный фильтр
        $('.portfolio__tabs .filter-item').removeClass('filter-item--active');
        $(this).addClass('filter-item--active');
        
        var category = $(this).data('category');
        
        // Обновляем кнопку "Загрузить еще"
        $('#load-more-portfolio').data('category', category).data('page', 1);
        
        // Показываем индикатор загрузки
        $('#portfolio-gallery').html('<li class="loading">Загрузка работ...</li>');
        
        // AJAX-запрос
        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            type: 'POST',
            data: {
                action: 'filter_portfolio',
                category: category,
                page: 1,
                security: '<?php echo wp_create_nonce("portfolio_nonce"); ?>'
            },
            success: function(response) {
                $('#portfolio-gallery').html(response);
                
                // Показываем/скрываем кнопку "Загрузить еще"
                if($(response).filter('.portfolio__gallery-item').length < 12 || $(response).find('.no-more-projects').length) {
                    $('#load-more-portfolio').hide();
                } else {
                    $('#load-more-portfolio').show();
                }
            },
            error: function() {
                $('#portfolio-gallery').html('<li class="error">Ошибка загрузки работ</li>');
            }
        });
    });
    
    // Обработчик кнопки "Загрузить еще"
    $('#load-more-portfolio').on('click', function() {
        var button = $(this);
        var page = parseInt(button.data('page')) + 1;
        var category = button.data('category');
        
        button.find('span').text('Загрузка...').prop('disabled', true);
        
        $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            type: 'POST',
            data: {
                action: 'filter_portfolio',
                category: category,
                page: page,
                security: '<?php echo wp_create_nonce("portfolio_nonce"); ?>'
            },
            success: function(response) {
                if(response.trim() !== '') {
                    $('#portfolio-gallery').append(response);
                    button.data('page', page).find('span').text(`Загрузить еще`).prop('disabled', false);
                    
                    // Скрываем кнопку если больше нет работ
                    if($(response).filter('.portfolio__gallery-item').length < 12) {
                        button.hide();
                    }
                } else {
                    button.hide();
                }
            },
            error: function() {
                button.find('span').text('Ошибка').prop('disabled', false);
                $('#portfolio-gallery').append('<li class="error">Ошибка загрузки</li>');
            }
        });
    });
});
</script>