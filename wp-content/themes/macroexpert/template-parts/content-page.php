<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package macroexpert
 */
?>

<?php if (is_front_page()) : ?>
    <?php get_template_part('template-parts/content', 'home'); ?>
<?php endif; ?>


