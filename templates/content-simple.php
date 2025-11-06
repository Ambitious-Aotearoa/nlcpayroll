<?php
/**
 * The template part for a post excerpt
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?>

<article <?php post_class( 'entry-excerpt' ); ?>>
	<a class="entry-excerpt__link" href="<?php the_permalink(); ?>">

		<div class="entry-excerpt__body">
			<div class="entry-excerpt__meta">
				<?php get_template_part( 'templates/post-meta' ); ?>
			</div>
			<h2 class="entry-excerpt__title">
				<?php the_title(); ?>
			</h2>
			<div class="entry-excerpt__content">
				<?php the_excerpt(); ?>
				<span class="entry-excerpt__read-more">Read <?php echo get_post_type() == 'case-study' ? 'Case Study' : 'Story'; ?></span>
			</div>
		</div>
	</a>
</article>
