<?php
/*
Template Name: Шаблон "Портфолио"
*/

?>

<?php get_header(); ?>

<main class="content">

    <?php get_template_part('template-parts/sections/portfolio'); ?>
    <?php get_template_part('template-parts/sections/work-steps'); ?>
    <?php get_template_part('template-parts/sections/projects'); ?>
    <?php get_template_part('template-parts/sections/hero'); ?>
    <?php get_template_part('template-parts/sections/reviews'); ?>
    <?php get_template_part('template-parts/sections/common-services'); ?>
    <?php get_template_part('template-parts/sections/faq'); ?>
    <?php get_template_part('template-parts/sections/contacts'); ?>


</main>


<?php get_footer(); ?>