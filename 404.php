<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bumague
 */

get_header();
?>
<main class="content">
	<section style="min-height: 50vh" class="section section--decoration-s">
		<header class="section__header container">
			<div class="section__header-info">
				<h1 class="section__title section__title--wide">
					Страница <span class="c-main">не найдена</span> 
				</h1>
				<div class="section__description section__description--wide">
					У-у-упс! Данная страница была удалена <br> или никогда  <span class="c-main">не существовала</span> 
				</div>
			</div>
		</header>
		<div class="section__body">
			<div class="not-found container">
				<a style="max-width: 500px" href="/" class="button">
					На главную
				</a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
