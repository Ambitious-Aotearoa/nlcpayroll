<?php
global $section;

$content_group = $section['content'];
$media_group   = $section['media'];

$title             = $content_group['title'];
$content           = $content_group['content'];
$button            = $content_group['button'];
$content_alignment = $content_group['content_alignment'];

$image           = $media_group['image'];
$video           = $media_group['video'];
$overlay         = $media_group['overlay'] ?? '';
$media_alignment = $media_group['media_alignment'];

preg_match( "/.*https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9\-_]+)\?/i", $video, $video_url );
if ( isset( $video_url[1] ) ) {
	$video_url = 'https://www.youtube.com/watch?v=' . $video_url[1];
}

?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 <?php echo $media_alignment === 'right' ? 'order-lg-12' : ''; ?>">
				<div class="section-content-media__image">

					<?php if ( $video ) { ?>
						<?php if ( $image ) { ?>
							<a class="mfp-iframe" href="<?php echo $video_url; ?>">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</a>
						<?php } else { ?>
							<div class="responsive-video__wrapper">
								<div class="responsive-video">
									<?php echo do_shortcode( $video ); ?>
								</div>
							</div>
						<?php } ?>
					<?php } else if ( $image ) { ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-6 <?php echo $media_alignment === 'right' ? 'order-lg-0' : ''; ?> <?php echo $content_alignment; ?>">
				<div class="section-content-media__inner">
					<?php if ( $title ) { ?>
						<h2 class="section-content-media__title text-warning">
							<?php echo $title; ?>
						</h2>
					<?php } ?>

					<?php if ( $content ) { ?>
						<div class="section-content-media__content">
							<?php echo $content; ?>
						</div>
					<?php } ?>

					<?php if ( $button['link'] ) { ?>
						<div class="section-content-media__actions">
							<?php acfactory_button( $button ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
