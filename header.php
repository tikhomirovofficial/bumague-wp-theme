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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<dialog class="window" id="request-window">
		<div class="window__inner">
			<header class="window__header">
				<h2 class="window__title">Заявка на полиграфию</h2>
				<button class="window__close-btn">
					<img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
						alt="">
				</button>
			</header>
			<form class="window__form">
				<div class="window__form-fields">
					<label for="request-name" class="window__form-field field">
						<input required id="request-name" name="name" placeholder="Имя" type="text"
							class="field__input">
					</label>
					<div class="window__form-field field field--select">
						<div class="field__select-wrapper">
							<input type="text" class="field__select-input" placeholder="Услуга" readonly>
							<div class="field__select-indicator">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M19 6.43396L19 19M19 19L6.43396 19M19 19L1 1" stroke="currentColor"
										stroke-width="2" />
								</svg>
							</div>
						</div>
						<div class="field__select-dropdown">
							<div class="field__select-option" data-value="Визитки">Визитки</div>
							<div class="field__select-option" data-value="Листовки">Листовки</div>
							<div class="field__select-option" data-value="Открытки">Открытки</div>
							<div class="field__select-option" data-value="Наклейки">Наклейки</div>
							<div class="field__select-option" data-value="Меню">Меню</div>
							<div class="field__select-option" data-value="Буклеты">Буклеты / евробуклеты / лифлет /
								гармошки</div>
							<div class="field__select-option" data-value="Каталоги">Каталоги / Брошюры</div>
						</div>
						<select id="request-service" name="service" class="field__select-real" required>
							<option value="">Выберите вариант</option>
							<option value="Визитки">Визитки</option>
							<option value="Листовки">Листовки</option>
							<option value="Открытки">Открытки</option>
							<option value="Наклейки">Наклейки</option>
							<option value="Меню">Меню</option>
							<option value="Буклеты">Буклеты / евробуклеты / лифлет / гармошки</option>
							<option value="Каталоги">Каталоги / Брошюры</option>
						</select>
					</div>
					<label for="request-comment" class="window__form-field field">
						<input id="request-comment" name="comment" placeholder="Комментарий" type="text"
							class="field__input">
					</label>
					<fieldset class="window__form-group">
						<label for="request-phone" class="window__form-field field">
							<input required name="phone" inputmode="tel" id="request-phone" placeholder="Телефон"
								type="text" class="field__input phone-mask">
						</label>
						<div class="window__form-field field field--select field--filled">
							<div class="field__select-wrapper">
								<input type="text" class="field__select-input" placeholder="Способ связи" readonly>
								<div class="field__select-indicator">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path d="M19 6.43396L19 19M19 19L6.43396 19M19 19L1 1" stroke="currentColor"
											stroke-width="2" />
									</svg>
								</div>
							</div>
							<div class="field__select-dropdown">
								<div class="field__select-option" data-value="1">Звонок на телефон</div>
								<div class="field__select-option" data-value="2">Сообщение в Whatsapp</div>
								<div class="field__select-option" data-value="3">Сообщение в Telegram</div>
							</div>
							<select required id="request-communication" name="communication" class="field__select-real"
								required>
								<option value="1">Звонок на телефон</option>
								<option value="2">Сообщение в Whatsap</option>
								<option value="3">Сообщение в Telegram</option>
							</select>
						</div>
					</fieldset>

					<div class="field field--upload">
						<input type="file" id="request-files" class="field__upload-input visually-hidden" multiple
							accept=".jpg,.jpeg,.png,.pdf">
						<label for="request-files" class="field__upload-preview">
							<img loading="lazy" height="40" width="40"
								src="<?php echo get_template_directory_uri(); ?>/images/icons/upload.svg" alt="">
							<div class="field__upload-preview-text">
								<span class="field__upload-preview-caption">
									<span class="c-main">
										Нажми для загрузки
									</span>
									или перенеси
								</span>
								<span class="field__upload-preview-requirement">JPG, JPEG, PNG, PDF вес до 10Мб
									(максимум 5 файлов)</span>
							</div>
						</label>
						<div class="field__upload-files">
							<ul class="field__upload-list">

							</ul>
							<button class="field__upload-files-btn">
								<img src="<?php echo get_template_directory_uri(); ?>/images/icons/plus.svg" alt="">
							</button>
						</div>
					</div>
				</div>
				<button type="submit" class="button window__form-button">
					<span>
						Отправить заявку
					</span>

				</button>
			</form>
		</div>
	</dialog>
	<dialog class="window" id="quick-request-window">
		<div class="window__inner">
			<header class="window__header">
				<h2 class="window__title c-main">Быстрый заказ полиграфии</h2>
				<button class="window__close-btn">
					<img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
						alt="">
				</button>
			</header>
			<form class="window__form">
				<div class="window__form-fields">
					<label for="request-name" class="window__form-field field">
						<input required id="request-name" name="name" placeholder="Имя" type="text"
							class="field__input">
					</label>
					<label for="request-phone" class="window__form-field field">
						<input required name="phone" inputmode="tel" id="request-phone" placeholder="Телефон"
							type="text" class="field__input phone-mask">
					</label>
					<div class="window__form-field field field--select field--filled">
						<div class="field__select-wrapper">
							<input required type="text" class="field__select-input" placeholder="Способ связи" readonly>
							<div class="field__select-indicator">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path d="M19 6.43396L19 19M19 19L6.43396 19M19 19L1 1" stroke="currentColor"
										stroke-width="2" />
								</svg>
							</div>
						</div>
						<div class="field__select-dropdown">
							<div class="field__select-option" data-value="1">Звонок на телефон</div>
							<div class="field__select-option" data-value="2">Сообщение в Whatsapp</div>
							<div class="field__select-option" data-value="3">Сообщение в Telegram</div>
						</div>
						<select id="request-communication" name="communication" class="field__select-real" required>
							<option value="">Выберите вариант</option>
							<option value="1">Звонок на телефо</option>
							<option value="2">Сообщение в Whatsap</option>
							<option value="3">Сообщение в Telegram</option>
						</select>
					</div>
				</div>
				<button type="submit" class="button window__form-button">
					<span>
						Отправить заявку
					</span>
				</button>
			</form>
		</div>
	</dialog>
	<dialog class="window" id="request-success-window">
		<form method="dialog" class="window__inner">
			<header class="window__header">
				<h2 class="window__title"></h2>
				<button class="window__close-btn">
					<img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
						alt="">
				</button>
			</header>
			<div class="window__content">
				<h2 class="window__title">Спасибо за вашу заявку</h2>
				<div class="window__description">
					<p>
						Наш менеджер вернётся к вам с уточнениями для просчёта заказа
					</p>
				</div>
			</div>
			<button class="button window__form-button">
				<span>
					Хорошо
				</span>
			</button>
		</form>
	</dialog>
	<dialog class="window" id="quick-request-success-window">
		<form method="dialog" class="window__inner">
			<header class="window__header">
				<h2 class="window__title"></h2>
				<button class="window__close-btn">
					<img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
						alt="">
				</button>
			</header>
			<div class="window__content">
				<h2 class="window__title">Спасибо за вашу заявку</h2>
				<div class="window__description">
					<p>
						наш менеджер свяжется с вами выбранным вами способом
					</p>
				</div>
			</div>
			<button type="button" class="button window__form-button">
				<span>
					Хорошо
				</span>

			</button>
		</form>
	</dialog>
	<div class="mobile-menu" id="mobile-menu">
		<div id="mobile-menu-body" class="mobile-menu__inner container">
			<div class="mobile-menu__content">
				<nav class="mobile-menu__nav">
					<ul class="mobile-menu__list">
						<li class="mobile-menu__item">
							<a href="" class="mobile-menu__link">Портфолио</a>
						</li>
						<li class="mobile-menu__item">
							<a href="" class="mobile-menu__link">Требования</a>
						</li>
						<li class="mobile-menu__item">
							<a href="" class="mobile-menu__link">Услуги</a>
						</li>
						<li class="mobile-menu__item">
							<a href="" class="mobile-menu__link">О компании</a>
						</li>
					</ul>
				</nav>
				<div class="mobile-menu__contacts">
					<div class="mobile-menu__contacts-info">
						<a href="tel:<?php echo wp_normalize_phone(get_field("c_phone", "option")); ?>"" class="
							mobile-menu__link">
							<?php the_field("c_phone", "options"); ?>
						</a>
						<div class="mobile-menu__contacts-socials">
							<a href="#">
								<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M19.9948 3.33398C10.7948 3.33398 3.32812 10.8007 3.32812 20.0007C3.32812 29.2007 10.7948 36.6673 19.9948 36.6673C29.1948 36.6673 36.6615 29.2007 36.6615 20.0007C36.6615 10.8007 29.1948 3.33398 19.9948 3.33398ZM27.7281 14.6673C27.4781 17.3007 26.3948 23.7006 25.8448 26.6507C25.6115 27.9007 25.1448 28.3173 24.7115 28.3673C23.7448 28.4507 23.0115 27.734 22.0781 27.1173C20.6115 26.1507 19.7781 25.5507 18.3615 24.6173C16.7115 23.534 17.7781 22.934 18.7281 21.9673C18.9781 21.7173 23.2448 17.834 23.3281 17.484C23.3397 17.431 23.3382 17.3759 23.3236 17.3237C23.3091 17.2714 23.282 17.2234 23.2448 17.184C23.1448 17.1007 23.0115 17.134 22.8948 17.1507C22.7448 17.184 20.4115 18.734 15.8615 21.8006C15.1948 22.2507 14.5948 22.484 14.0615 22.4673C13.4615 22.4506 12.3281 22.134 11.4781 21.8507C10.4281 21.5173 9.61146 21.334 9.67812 20.7507C9.71146 20.4507 10.1281 20.1507 10.9115 19.834C15.7781 17.7173 19.0115 16.3173 20.6281 15.6507C25.2615 13.7173 26.2115 13.384 26.8448 13.384C26.9781 13.384 27.2948 13.4173 27.4948 13.584C27.6615 13.7173 27.7115 13.9007 27.7281 14.034C27.7115 14.134 27.7448 14.434 27.7281 14.6673Z"
										fill="white" />
								</svg>
							</a>
							<a href="#">
								<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M19.0371 3.33203C10.2704 3.33203 3.16406 10.7937 3.16406 19.9987C3.16406 23.1487 3.9974 26.0987 5.4466 28.612L4.03073 33.6654C3.94943 33.9555 3.94409 34.2633 4.01524 34.5563C4.0864 34.8494 4.23144 35.1169 4.43511 35.3308C4.63878 35.5446 4.89356 35.6969 5.17266 35.7716C5.45176 35.8463 5.74488 35.8407 6.02121 35.7554L10.8339 34.2687C13.3081 35.8403 16.1454 36.6692 19.0371 36.6654C27.8037 36.6654 34.9101 29.2037 34.9101 19.9987C34.9101 10.7937 27.8037 3.33203 19.0371 3.33203ZM15.4466 23.7704C18.6577 27.1404 21.7228 27.5854 22.8053 27.627C24.4514 27.6904 26.0545 26.3704 26.6783 24.8387C26.7564 24.648 26.7847 24.4389 26.7601 24.2329C26.7356 24.027 26.6591 23.8316 26.5387 23.667C25.6688 22.5004 24.4926 21.662 23.3434 20.8287C23.1036 20.6541 22.8086 20.584 22.5206 20.6331C22.2325 20.6822 21.9739 20.8467 21.799 21.092L20.8466 22.617C20.7963 22.6987 20.7183 22.7572 20.6284 22.7808C20.5385 22.8043 20.4434 22.791 20.3625 22.7437C19.7164 22.3554 18.7752 21.6954 18.099 20.9854C17.4228 20.2754 16.8323 19.332 16.5006 18.697C16.4604 18.6161 16.4491 18.5228 16.4686 18.4339C16.4881 18.3451 16.5371 18.2664 16.6069 18.212L18.0736 17.0687C18.2835 16.878 18.419 16.6127 18.4542 16.3236C18.4893 16.0345 18.4216 15.742 18.2641 15.502C17.553 14.4087 16.7244 13.0187 15.5228 12.097C15.3674 11.9798 15.1858 11.9067 14.9956 11.8848C14.8054 11.8629 14.613 11.8929 14.4371 11.972C12.9768 12.6287 11.7133 14.312 11.7736 16.0437C11.8133 17.1804 12.2371 20.3987 15.4466 23.7704Z"
										fill="white" />
								</svg>
							</a>
						</div>
					</div>
					<div class="mobile-menu__contacts-bottom">
						<span class="mobile-menu__contacts-info-item"></span>
						<address class="mobile-menu__contacts-info-item"> <?php the_field("c_address", "options"); ?></address>
						<a href="mailto:<?php the_field("c_email", "option"); ?>" class="mobile-menu__contacts-info-item">
							<?php the_field("c_email", "option"); ?>
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<header class="header">
		<div class="header__inner container">
			<div class="header__top">
				<address class="header__info">
					<b class="header__info-accent">
						<?php the_field("c_work_time", "option"); ?>
					</b>
					<span class="header__info-bottom"> <?php the_field("c_address", "option"); ?></span>
				</address>
				<a href="#" class="header__logo logo">
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
				<a href="#" class="logo header__main-logo">
					<?php the_field("c_name", "option"); ?>
				</a>
				<nav class="header__nav">
					<ul class="header__nav-list">
						<li class="header__nav-item">
							<a href="#" class="header__nav-link">
								Услуги
							</a>
						</li>
						<li class="header__nav-item">
							<a href="#" class="header__nav-link">
								Портфолио
							</a>
						</li>
						<li class="header__nav-item">
							<a href="#" class="header__nav-link">
								Требования
							</a>
						</li>
						<li class="header__nav-item">
							<a href="#" class="header__nav-link">
								О компании
							</a>
						</li>
					</ul>
				</nav>
				<div class="header__contacts">
					<a href="tel:<?php echo wp_normalize_phone(get_field("c_phone", "option")); ?>"" class="
						header__contacts-link">
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