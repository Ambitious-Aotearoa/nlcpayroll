<?php
/**
 * The template part for page content
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?> <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page__content">
		<?php the_content(); ?>
	</div>
	<footer class="page__footer">
		<?php
		wp_link_pages(
			[
				'before' => '<nav class ="page-nav"><p>' . __( 'Pages:', 'acfactory' ),
				'after'  => '</p></nav>',
			]
		);
		?>
	</footer>
	<div class="page__comments">
		<?php comments_template( '/templates/comments.php' ); ?>
	</div>
</article>
