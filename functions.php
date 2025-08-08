<?php
/**
 * bumague functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bumague
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bumague_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bumague, use a find and replace
		* to change 'bumague' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bumague', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'bumague' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bumague_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bumague_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bumague_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bumague_content_width', 640 );
}
add_action( 'after_setup_theme', 'bumague_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bumague_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bumague' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bumague' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bumague_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bumague_scripts() {
	wp_enqueue_style( 'bumague-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bumague-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bumague-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bumague_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if (function_exists("acf_add_options_page")) {
    acf_add_options_page(array(
        "page_title" => "Настройка общего контента, который повторяется на разных страницах",
        "menu_title" => "Общий контент",
        "menu_slug"  => "theme_settings",
    ));
}

/**
 * Нормализация телефонного номера для WordPress
 * Преобразует любой формат номера в +79266641488
 */
function wp_normalize_phone($phone) {
    // Удаляем все нецифровые символы
    $digits = preg_replace('/[^0-9]/', '', $phone);
    
    // Обработка российских номеров
    if (strlen($digits) >= 11) {
        // Если номер начинается с 8, заменяем на 7
        if ($digits[0] == '8') {
            $digits = '7' . substr($digits, 1);
        }
        // Если номер начинается с 7, просто добавляем +
        elseif ($digits[0] == '7') {
            $digits = '+' . $digits;
        }
        // Для номеров без кода страны (начинаются с 9...) добавляем +7
        elseif (strlen($digits) == 10 && $digits[0] == '9') {
            $digits = '+7' . $digits;
        }
    }
    
    // Для коротких номеров (например, 8800) оставляем как есть
    if (strlen($digits) <= 6) {
        return $phone;
    }
    
    return $digits;
}

// Шорткод для использования в редакторе WordPress
add_shortcode('normalize_phone', function($atts) {
    $atts = shortcode_atts(['phone' => ''], $atts);
    return wp_normalize_phone($atts['phone']);
});


// Добавьте это в functions.php

// Обработчик AJAX для фильтрации
add_action('wp_ajax_filter_blog_by_category', 'filter_blog_by_category_callback');
add_action('wp_ajax_nopriv_filter_blog_by_category', 'filter_blog_by_category_callback');

function filter_blog_by_category_callback() {
    // Проверка nonce для безопасности
    check_ajax_referer('filter_blog_nonce', 'security');
    
    $category = sanitize_text_field($_POST['category'] ?? 'all');
    $page = absint($_POST['page'] ?? 1);
    
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
        'paged'         => $page
    ];
    
    // Фильтр по рубрике если выбрана конкретная
    if ($category !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $category
            ]
        ];
    }
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $article_img = get_field('article_img');
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
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.832 4.01887V11M10.832 11H3.8509M10.832 11L0.832031 1" stroke="#9896A5" stroke-width="2" />
                            </svg>
                        </div>
                        <span class="blog-item__link-hovered">читать</span>
                    </a>
                </article>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
    
    wp_die(); // Обязательно завершаем AJAX-запрос
}