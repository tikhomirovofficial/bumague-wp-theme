<?php
/*
Template Name: Шаблон "Главная страница"
*/

?>

<?php get_header(); ?>

<main class="content">
    <?php get_template_part('template-parts/sections/home-welcome'); ?>

    <?php if (get_field('h_show_work_steps')): ?>
        <?php get_template_part('template-parts/sections/work-steps'); ?>
    <?php endif; ?>

    <?php if (get_field('h_show_reviews')): ?>
        <?php get_template_part('template-parts/sections/reviews'); ?>
    <?php endif; ?>

    <?php if (get_field('h_show_equipment')): ?>
        <?php get_template_part('template-parts/sections/equipment-common'); ?>
    <?php endif; ?>

    <?php if (get_field('h_show_projects')): ?>
        <?php get_template_part('template-parts/sections/projects'); ?>
    <?php endif; ?>

    <?php if (get_field('h_show_faq')): ?>
        <?php get_template_part('template-parts/sections/faq'); ?>
    <?php endif; ?>

    <?php if (get_field('h_show_contacts')): ?>
        <?php get_template_part('template-parts/sections/contacts'); ?>
    <?php endif; ?>


</main>


<?php get_footer(); ?>