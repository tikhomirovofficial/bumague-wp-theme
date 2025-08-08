<?php
/**
 * Секция блога
 */

// Получаем все рубрики (категории)
$categories = get_categories([
    'taxonomy' => 'category', // Используем стандартную таксономию рубрик
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true // Только рубрики с постами
]);
?>

<section class="section" id="blog-section">
    <div class="section__body">
        <div class="blog container">
            <div class="blog__inner">
                <!-- Фильтры по рубрикам -->
                <ul class="blog__tabs">
                    <li class="blog__tabs-item">
                        <button class="filter-item filter-item--active" data-category="all">
                            <span>ВСЕ</span>
                        </button>
                    </li>
                    <?php foreach ($categories as $category): ?>
                        <li class="blog__tabs-item">
                            <button class="filter-item" data-category="<?php echo esc_attr($category->slug); ?>">
                                <span><?php echo esc_html($category->name); ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>


                <div class="blog__list" id="blog-list">
                    <?php
                    // Первоначальная загрузка последних 8 статей
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish'
                    ];

                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            $article_img = get_field('article_img'); // ACF поле для изображения
                            ?>
                            <div class="blog__item">
                                <article class="blog-item">
                                    <div class="blog-item__info">
                                        <div class="blog-item__img"
                                            style="background-image: url('<?php echo $article_img ? esc_url($article_img) : esc_url(get_template_directory_uri() . '/images/articles/bg.jpg'); ?>')">
                                        </div>
                                        <h3 class="blog-item__title">
                                            <?php echo esc_html(get_the_title()); ?>
                                        </h3>
                                    </div>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="blog-item__link">
                                        <div class="blog-item__link-text">
                                            <span>больше</span>
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.832 4.01887V11M10.832 11H3.8509M10.832 11L0.832031 1"
                                                    stroke="#9896A5" stroke-width="2" />
                                            </svg>
                                        </div>
                                        <span class="blog-item__link-hovered">читать</span>
                                    </a>
                                </article>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p class="no-posts">Статей не найдено</p>
                    <?php endif; ?>
                </div>

                <!-- Кнопка загрузки дополнительных статей -->
                <?php if ($query->found_posts > 3): ?>
                    <div class="load-more-container">
                        <button class="blog-load blog__load-btn" id="load-more" class="button" data-page="1"
                            data-category="all">
                            <span>Загрузить еще</span>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arro-down-right-dark.svg"
                                alt="">
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<!-- AJAX-обработчики -->
<script>
    jQuery(document).ready(function ($) {
        // Обработчик фильтрации по рубрикам
        $('.filter-item').on('click', function () {
            // Активный фильтр
            $('.filter-item').removeClass('filter-item--active');
            $(this).addClass('filter-item--active');

            var category = $(this).data('category');

            // Обновляем данные кнопки "Загрузить еще"
            $('#load-more').data('category', category).data('page', 1);

            // Показываем индикатор загрузки
            $('#blog-list').html('<div class="loading-spinner">Загрузка...</div>');

            // AJAX-запрос
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                data: {
                    action: 'filter_blog_by_category',
                    category: category,
                    page: 1,
                    security: '<?php echo wp_create_nonce("filter_blog_nonce"); ?>'
                },
                success: function (response) {
                    $('#blog-list').html(response);

                    // Показываем/скрываем кнопку "Загрузить еще"
                    if ($(response).filter('.blog__item').length < 3 || $(response).find('.no-more-posts').length) {
                        $('#load-more').hide();
                    } else {
                        $('#load-more').show();
                    }
                },
                error: function (xhr, status, error) {
                    $('#blog-list').html('<p class="error-message">Ошибка загрузки статей</p>');
                }
            });
        });

        // Обработчик кнопки "Загрузить еще"
        $('#load-more').on('click', function () {
            var button = $(this);
            var page = parseInt(button.data('page')) + 1;
            var category = button.data('category');

            button.text('Загрузка...').prop('disabled', true);

            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                data: {
                    action: 'filter_blog_by_category',
                    category: category,
                    page: page,
                    security: '<?php echo wp_create_nonce("filter_blog_nonce"); ?>'
                },
                success: function (response) {
                    if (response.trim() !== '') {
                        $('#blog-list').append(response);
                        button.data('page', page).html(`
                            <span>Загрузить еще</span>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arro-down-right-dark.svg"
                                alt="">
                        `).prop('disabled', false);

                        // Скрываем кнопку если больше нет статей
                        if ($(response).filter('.blog__item').length < 3) {
                            button.hide();
                        }
                    } else {
                        button.hide();
                    }
                },
                error: function (xhr, status, error) {
                    button.text('Ошибка').prop('disabled', false);
                    $('#blog-list').append('<p class="error-message">Ошибка загрузки</p>');
                }
            });
        });
    });
</script>