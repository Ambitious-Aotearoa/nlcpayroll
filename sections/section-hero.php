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
$add_classes .= ' section-hero--' . $overlay;

?>

<section <?php acfactory_section( $add_classes ); ?>>
	<div class="container">
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

	<?php if ( $background_video ) { ?>
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
	<?php } ?>
</section>
