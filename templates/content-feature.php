<?php
/**
 * The template part for a post excerpt
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?>

<article <?php post_class( 'entry-feature' ); ?>>
	<a class="entry-feature__link" href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-feature__image">
				<div class="entry-feature__image-inner">
					<?php the_post_thumbnail( 'medium' ); ?>
				</div>
			</div>
		<?php } ?>

		<div class="entry-feature__body">
			<div class="entry-feature__meta">
				<?php get_template_part( 'templates/post-meta' ); ?>
			</div>
			<h2 class="entry-feature__title">
				<?php the_title(); ?>
			</h2>
			<div class="entry-feature__content">
				<?php the_excerpt(); ?>
				<span class="entry-feature__read-more">Read <?php echo get_post_type() == 'case-study' ? 'Case Study' : 'Story'; ?></span>
			</div>
		</div>
	</a>
</article>
