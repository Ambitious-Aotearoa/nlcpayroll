<?php
/**
 * The template for the search listing
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?><?php get_header(); ?>

<?php get_template_part( 'templates/page', 'header' ); ?>

<section class="section p-md">
	<div class="container">
		<?php if ( ! have_posts() ) { ?>
			<div class="alert alert-warning">
				<?php esc_html_e( 'Sorry, no results were found.', 'acfactory' ); ?>
			</div>
		<?php } ?>

		<?php while ( have_posts() ) { ?>
			<?php the_post(); ?>
			<?php get_template_part( 'templates/content', 'search' ); ?>
		<?php } ?>

		<?php acfactory_pagination(); ?>
	</div>
</section>

<?php get_footer(); ?>
