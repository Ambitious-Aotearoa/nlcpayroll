<?php
/**
 * The template part for search results of all content types
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?><article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--excerpt entry--search' ); ?>>
	<header class="entry__header">
		<h2 class="entry__title h4">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
	</header>
	<div class="entry__content entry__content--excerpt">
		<?php echo wp_trim_words( get_the_excerpt(), 55 ); ?>
	</div>
</article>
