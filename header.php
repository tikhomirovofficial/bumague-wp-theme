<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bumague
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, max-scale=1.0, min-scale=1.0, user-scalable=0">
	<!-- Основные SEO-метатеги -->
	<!-- <title>Бумажечка — цифровая типография в Москве | Печать визиток, листовок, меню</title> -->
	<meta name="description"
		content="Типография «Бумажечка» в Москве: печать визиток, листовок, открыток, наклеек и меню для ресторанов. Быстро, качественно и со вкусом. Срочная печать от 1 дня. Доступные цены от 1 400 руб.">
	<meta name="keywords"
		content="типография Москва, печать визиток, печать листовок, срочная печать, печать меню для ресторанов, цифровая типография, печать открыток, изготовление наклеек, печать буклетов">

	<!-- Favicon (адаптивный под тему браузера) -->
	<link rel="icon" type="image/png" href="favicon_light.png" media="(prefers-color-scheme: light)">
	<link rel="icon" type="image/png" href="favicon_dark.png" media="(prefers-color-scheme: dark)">
	<link rel="icon" type="image/png" href="favicon_dark.png">

	<!-- OpenGraph / Социальные метатеги -->
	<meta property="og:title" content="Бумажечка — печать полиграфии в Москве">
	<meta property="og:description"
		content="Профессиональная печать визиток, листовок, меню и другой полиграфии. Качественно, быстро и со вкусом!">
	<meta property="og:image" content="https://ваш-сайт.ru/images/og-image.jpg">
	<meta property="og:url" content="https://ваш-сайт.ru">
	<meta property="og:type" content="website">

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Бумажечка — печать полиграфии в Москве">
	<meta name="twitter:description"
		content="Профессиональная печать визиток, листовок, меню и другой полиграфии. Качественно, быстро и со вкусом!">
	<meta name="twitter:image" content="https://ваш-сайт.ru/images/og-image.jpg">

	<!-- Каноническая ссылка -->
	<link rel="canonical" href="https://ваш-сайт.ru">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper-bundle.min.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/swiper-bundle.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.7.1.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php get_template_part('template-parts/windows/request-window'); ?>
	<?php get_template_part('template-parts/windows/request-window-quick'); ?>
	<?php get_template_part('template-parts/windows/mobile-menu'); ?>

	<header class="header">
		<div class="header__inner container">
			<div class="header__top">
				<address class="header__info">
					<b class="header__info-accent">
						<?php the_field("c_work_time", "option"); ?>
					</b>
					<span class="header__info-bottom"><?php the_field("c_address", "option"); ?></span>
				</address>
				<a href="<?php echo home_url('/'); ?>" class="header__logo logo">
					<?php the_field("c_name", "option"); ?>
				</a>
				<div class="header__info header__top-contacts">
					<a href="tel:<?php echo wp_normalize_phone(get_field("c_phone", "option")); ?>"
						class="header__info-accent">
						<?php the_field("c_phone", "option"); ?>
					</a>
					<a href="mailto:<?php the_field("c_email", "option"); ?>"
						class="header__info-bottom"><?php the_field("c_email", "option"); ?></a>
				</div>
			</div>
			<div id="header-main" class="header__main">
				<a href="<?php echo home_url('/'); ?>" class="logo header__main-logo">
					<?php the_field("c_name", "option"); ?>
				</a>
				<nav class="header__nav">
					<?php if (have_rows('menu_list', 'option')): ?>
						<ul class="header__nav-list">
							<?php while (have_rows('menu_list', 'option')):
								the_row();

								$menu_item = get_sub_field('menu_item');
								$text = $menu_item['menu_item_text'];
								$link = $menu_item['menu_item_link'];

								// Получаем slug текущей страницы
								$current_slug = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
								$menu_slug = trim(parse_url($link, PHP_URL_PATH), '/');

								// Проверяем, совпадает ли slug
								$is_active = $menu_slug === $current_slug;

								// Для главной страницы
								if (is_front_page() && $menu_slug === '') {
									$is_active = true;
								}

								$link_class = $is_active ? 'header__nav-link header__nav-link--active' : 'header__nav-link';
								?>
								<li class="header__nav-item">
									<a href="<?php echo esc_url($link); ?>" class="<?php echo $link_class; ?>">
										<?php echo esc_html($text); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</nav>
				<div class="header__contacts">
					<a href="tel:<?php echo wp_normalize_phone(get_field("c_phone", "option")); ?>"
						class="header__contacts-link">
						<?php the_field("c_phone", "option"); ?>
					</a>
					<a href="https://wa.me/79266641488" class="header__contacts-link">
						<img height="29" width="29"
							src="<?php echo get_template_directory_uri(); ?>/images/icons/whatsapp.svg" alt="">
					</a>
					<a href="" class="header__contacts-link">
						<img height="30" width="30"
							src="<?php echo get_template_directory_uri(); ?>/images/icons/telegram.svg" alt="">
					</a>
				</div>
				<button type="button" class="header__burger-btn button">
					<span class="header__burger-line"></span>
					<span class="header__burger-line"></span>
					<span class="header__burger-line"></span>
				</button>
			</div>
		</div>
	</header>