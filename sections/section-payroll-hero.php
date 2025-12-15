<?php
/**
 * Template part for the Payroll Hero Section.
 * File: sections/section-payroll-hero.php
 * Framework: Bootstrap 4.6
 */

// --- Dynamic Content Retrieval from ACF Flexible Content ---

// 1. Get the simple text fields
$hero_heading = get_sub_field( 'text_heading' );
$hero_text    = get_sub_field( 'text_content' );
// ACF field for the text above the main heading
$pre_header   = get_sub_field( 'pre_header' );

// 2. Define the custom dark blue color for styling
$blue_color = '#1C355E'; // Define the dark blue color

// 3. Get the Image field (Check for Array or ID return format)
$image_field  = get_sub_field( 'right_image' );

if ( is_array( $image_field ) && isset( $image_field['ID'] ) ) {
	// If ACF is set to return 'Image Array'
	$image_id = $image_field['ID'];
	$image_alt = $image_field['alt'];
} elseif ( is_numeric( $image_field ) ) {
	// If ACF is set to return 'Image ID'
	$image_id = $image_field;
	$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
} else {
	$image_id = 0;
	$image_alt = '';
}

// 4. Get the Button fields
$demo_link    = get_sub_field( 'demo_button_link' );
$learn_more_url = get_sub_field( 'learn_more_url' );

// Fallback class for styling
$section_class = 'payroll-hero-section py-5';

// Check if there is any content before outputting the section
if ( $hero_heading || $hero_text || $image_id ) :
	?>

	<section class="<?php echo esc_attr( $section_class ); ?>">
		<div class="container">
			<div class="row align-items-center">

				<!-- Left Column: Text Content - 40% Width (col-md-5) -->
				<div class="col-md-5 mb-4 mb-md-0" style="padding-right: 90px !important;" >
					<header class="hero-content">
						<?php if ( $pre_header ) : ?>
							<!-- UPDATED: Added inline style to apply the blue color to the preheader -->
							<p class="mb-2 text-muted" style="color: <?php echo $blue_color; ?> !important;">
								<?php echo esc_html( $pre_header ); ?>
							</p>
						<?php endif; ?>

						<?php if ( $hero_heading ) : ?>

							<!-- Heading 2 (Desktop/Tablet) -->
							<h2 class="display-4 mb-3 d-none d-sm-block" style="color: <?php echo $blue_color; ?>; font-weight: 500; line-height: 100%; ">
								<?php echo esc_html( $hero_heading ); ?>
							</h2>

							<!-- Heading 3 (Mobile) -->
							<h3 class="mb-3 d-sm-none" style="color: <?php echo $blue_color; ?>; font-weight: 500; line-height: 100%; ">
								<?php echo esc_html( $hero_heading ); ?>
							</h3>

						<?php endif; ?>
						<?php if ( $hero_text ) : ?>
							<p class="text-justify" style="font-size: 16px; line-height: 1.4; font-weight: 200;">
								<?php echo esc_html( $hero_text ); ?>
							</p>
						<?php endif; ?>
					</header>

					<div class="hero-actions mt-4">

						<?php if ( $demo_link ) : ?>
							<a href="<?php echo esc_url( $demo_link['url'] ); ?>"
							   class="btn btn-secondary btn-lg mr-3"
							   target="<?php echo esc_attr( $demo_link['target'] ); ?>">
								<?php echo esc_html( $demo_link['title'] ); ?>
							</a>
						<?php endif; ?>

						<?php if ( $learn_more_url ) : ?>
							<a href="<?php echo esc_url( $learn_more_url ); ?>"
							   class="btn btn-outline-light btn-lg">
								Learn More
							</a>
						<?php endif; ?>
					</div>
				</div>

				<!-- Right Column: Image - 60% Width (col-md-7) -->
				<div class="col-md-7 text-center">
					<?php if ( $image_id ) : ?>
						<figure class="hero-image">
							<?php echo wp_get_attachment_image( $image_id, 'large', false, ['class' => 'img-fluid', 'alt' => esc_attr($image_alt), 'loading' => 'lazy'] ); ?>
						</figure>
					<?php endif; ?>
				</div>

			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.payroll-hero-section -->

<?php endif; // End check for content ?>
