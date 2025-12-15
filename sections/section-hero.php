<?php
global $section;

$before_title     = $section['before_title'];
$title            = $section['title'];
$content          = $section['content'];
$button           = $section['button'];
$overlay          = $section['overlay'];
$size             = $section['size'];
$background_video = $section['background_video'];
$background_image = $section['appearance']['background_image'];

$add_classes = 'section-hero--' . $size;

// --- CONDITIONAL LOGIC START ---
// IMPORTANT: Replace 'employee-payment-portal' with your actual page slug if different.
$is_two_column = is_page('employee-payment-portal');

if ($is_two_column) {
	// 1. Add class for two-column styling (CSS handles full width and alignment)
	$add_classes .= ' section-hero--two-column';
	// 2. Overlay class is omitted when two-column layout is active
} else {
	// 3. For all other pages, add the overlay class as normal
	$add_classes .= ' section-hero--' . $overlay;
}
?>

<section <?php acfactory_section( $add_classes ); ?>>
	<div class="container">

		<?php if ( $is_two_column ) { ?>
		<!-- START: Two-Column Flexbox Wrapper (This div gets display: flex in SCSS) -->
		<div class="section-hero__columns-wrapper">
			<?php } ?>

			<!-- Column 1: Text Content (Left Aligned - 40% width in SCSS) -->
			<div class="section-hero__content-column">
				<div class="section-hero__inner">
					<?php if ( $before_title ) { ?>
						<h1 class="section-hero__before-title">
							<?php echo $before_title; ?>
						</h1>
					<?php } ?>
					<?php if ( $title ) { ?>
						<h1 class="h2 section-hero__title">
							<?php echo $title; ?>
						</h1>
					<?php } ?>

					<?php if ( $content ) { ?>
						<div class="section-hero__content">
							<?php echo $content; ?>
						</div>
					<?php } ?>

					<?php if ( $button['link'] ) { ?>
						<div class="section-hero__actions">
							<?php acfactory_button( $button ); ?>
						</div>
					<?php } ?>
				</div>
			</div>

			<?php if ( $is_two_column ) {
			// Column 2: Image (Right Aligned - 60% width in SCSS)
			?>
			<div class="section-hero__image-column">
				<img
					src="<?php echo $background_image['url']; ?>"
					alt="<?php echo $background_image['alt']; ?>"
					style="display: block; width: 100%; height: auto;"
				>
			</div>
		</div>
		<!-- END: Two-Column Flexbox Wrapper -->
	<?php } ?>

	</div>

	<?php
	// Background Video and Image are displayed only if NOT two-column (default behavior)
	if ( ! $is_two_column ) {
		if ( $background_video ) { ?>
			<div class="section-hero__video">
				<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
					<source src="<?php echo $background_video['url']; ?>" type="<?php echo $background_video['mime_type']; ?>">
				</video>
			</div>
		<?php } ?>

		<?php if ( $background_image ) { ?>
			<div class="section-hero__background-image">
				<img style="display: none" src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>">
			</div>
		<?php }
	} ?>
</section>
