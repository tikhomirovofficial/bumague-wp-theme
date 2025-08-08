<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bumague
 */

get_header();
?>

<main class="content">
	<?php get_template_part('template-parts/sections/article-content'); ?>
	<?php get_template_part('template-parts/sections/faq'); ?>
	<?php get_template_part('template-parts/sections/contacts'); ?>
</main>

<?php
get_footer();

