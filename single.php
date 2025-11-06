<?php
/**
 * The template for locating the correct single template for the post type
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?><?php get_header(); ?>

<?php get_template_part( 'templates/page', 'header' ); ?>

<?php while ( have_posts() ) { ?>
	<?php the_post(); ?>
	<?php get_template_part( 'templates/content-single', get_post_type() ); ?>
<?php } ?>

<?php get_footer(); ?>
