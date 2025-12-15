<?php
/**
 * Template part for displaying posts/case studies in a three-column layout.
 * Column 1: Title and Archive Links (25%)
 * Column 2: Posts Loop (41.6%)
 * Column 3: Single Large Image (33.3%)
 *
 * File: sections/section-posts.php
 */

// --- Dynamic Content Retrieval using get_sub_field() ---
$title      = get_sub_field( 'title' ) ?? '';
$post_count = get_sub_field( 'post_count' );
$post_type  = get_sub_field( 'post_type' );

if ( $post_type == 'all' ) {
	$post_type = array( 'post', 'case-study' );
}

// --- Define Custom Column Widths (Bootstrap 12-column grid) ---
$col_1_class = 'col-lg-3'; // Title and Links
$col_2_class = 'col-lg-5'; // Posts
$col_3_class = 'col-lg-4'; // Image

// --- Image URL (Single Large Image - 533x800 pixels) ---
$fixed_image_url = 'https://nlc.ddev.site/wp-content/uploads/2023/04/NLC-216-1.jpg';
$fixed_image_alt = 'Static post section feature image';

// Define the common blue color
$blue_color = '#1C355E';
?>

<section <?php acfactory_section(); ?> class="section-posts">
	<div class="container">
		<div class="row align-items-stretch">

			<div class="<?php echo $col_1_class; ?>">
				<!-- UPDATED: Added h-100 here to ensure the column container takes full height -->
				<div class="section-posts__column section-posts__column--explore p-4 h-100">
					<div class="section-posts__inner d-flex flex-column h-100 justify-content-center">
						<div class="section-posts__title">
							<h3 style="color: <?php echo $blue_color; ?>; font-weight: bold;"><?php echo esc_html($title); ?></h3>
						</div>
						<div class="section-posts__links section-posts__links--desktop mt-4">
							<p class="mb-2"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-arrow">see all news</a></p>
							<p><a href="<?php echo get_post_type_archive_link( 'case-study' ); ?>" class="btn btn-arrow">see all case studies</a></p>
						</div>
					</div>
				</div>
			</div>

			<div class="<?php echo $col_2_class; ?>">
				<div class="section-posts__column section-posts__column--posts h-100">
					<?php
					$args = array(
						'post_type'      => $post_type,
						'posts_per_page' => $post_count
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						?>
						<div class="section-posts__posts h-100">
							<?php while ( $query->have_posts() ) { ?>
								<?php $query->the_post(); ?>
								<?php get_template_part( 'templates/content', 'simple' ); ?>
							<?php } ?>
						</div>
						<?php
					}
					wp_reset_postdata();
					?>
				</div>
			</div>

			<div class="<?php echo $col_3_class; ?>">
				<div class="section-posts__column h-100">

					<?php if ( $fixed_image_url ) : ?>

						<img src="<?php echo esc_url($fixed_image_url); ?>"
							 alt="<?php echo esc_attr($fixed_image_alt); ?>"
							 class="img-fluid w-100 h-100"
							 style="object-fit: cover; height: 100%;"
							 loading="lazy">

					<?php else : ?>
						<div class="h-100 w-100 d-flex align-items-center justify-content-center border border-danger p-4 text-center" style="background-color: #fcebeb;">
							<p class="text-danger m-0 font-weight-bold">DEBUG: Image not found (Code Check: Image URL is empty).</p>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-12 d-lg-none mt-3">
				<div class="section-posts__links section-posts__links--mobile d-flex justify-content-around">
					<div><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-arrow">see all news</a></div>
					<div><a href="<?php echo get_post_type_archive_link( 'case-study' ); ?>" class="btn btn-arrow">see all case studies</a></div>
				</div>
			</div>

		</div></div></section>
