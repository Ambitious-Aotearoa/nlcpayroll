<?php
global $section;

$title   = $section['title'];
$content = $section['content'] ?? '';
$button  = $section['button'] ?? '';
$image   = $section['image'];

$post_count = $section['post_count'];
$post_type  = $section['post_type'];

if ( $post_type == 'all' ) {
	$post_type = array( 'post', 'case-study' );
}

?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="section-posts__column section-posts__column--left">
					<div class="section-posts__inner">
						<div class="section-posts__title">
							<?php echo $title; ?>
						</div>
						<div class="section-posts__links section-posts__links--desktop">
							<div><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-arrow">see all news</a></div>
							<div><a href="<?php echo get_post_type_archive_link( 'case-study' ); ?>" class="btn btn-arrow">see all case studies</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="section-posts__column section-posts__column--right">
					<?php
					$args = array(
						'post_type'      => $post_type,
						'posts_per_page' => $post_count
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						?>
						<div class="section-posts__posts">
							<?php while ( $query->have_posts() ) { ?>
								<?php $query->the_post(); ?>
								<?php get_template_part( 'templates/content', 'simple' ); ?>
							<?php } ?>

							<div class="section-posts__image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</div>
						</div>
						<?php
					}
					wp_reset_query();
					?>

					<div class="section-posts__links section-posts__links--mobile">
						<div><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-arrow">see all news</a></div>
						<div><a href="<?php echo get_post_type_archive_link( 'case-study' ); ?>" class="btn btn-arrow">see all case studies</a></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
