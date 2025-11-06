<?php
/**
 * The template for listing post types
 *
 * @package acfactory
 * @since acfactory 1.0
 */

$queried_object = get_queried_object();
$current_term_id = 0;

if ( isset( $queried_object->term_id ) ) {
	$current_term_id = $queried_object->term_id;
}

?><?php get_header(); ?>

<?php get_template_part( 'templates/page', 'header' ); ?>

<div class="category-nav__section">
	<div class="container">
		<?php
		$taxonomy = get_post_type() == 'case-study' ? 'case-study_cat' : 'category';
		$terms    = get_terms( $taxonomy );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			?>
			<ul class="category-nav">
			<?php
			foreach ( $terms as $term ) {
				?>
				<li class="category-nav__item term-badge--<?php echo $term->term_id; ?> <?php echo $current_term_id == $term->term_id ? 'category-nav__item--active' : ''; ?>">
					<a class="category-nav__link" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
				</li>
				<?php
			}
			?>
			</ul>
			<?php
		}
		?>
	</div>
</div>

<div class="section">
	<div class="container">
		<?php if ( ! have_posts() ) { ?>
			<div class="alert alert-warning">
				<?php esc_html_e( 'Sorry, no results were found.', 'acfactory' ); ?>
			</div>
			<?php get_search_form(); ?>
		<?php } ?>

		<div class="posts-grid">
			<div class="row">
				<div class="col-lg-4">
					<div class="posts-grid__column posts-grid__column--left">
					<?php $i = 1; ?>
					<?php while ( have_posts() ) { ?>
						<?php the_post(); ?>
						<?php if ( $i == 1 ) { ?>
							<?php get_template_part( 'templates/content', 'feature' ); ?>
							</div>
						</div>
						<div class="col-lg-7 ml-auto">
							<div class="posts-grid__column posts-grid__column--right">
								<?php } else { ?>
									<?php get_template_part( 'templates/content', get_post_type() !== 'post' ? get_post_type() : get_post_format() ); ?>
								<?php } ?>
								<?php $i++; ?>
						<?php } ?>

						<?php acfactory_pagination(); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>
