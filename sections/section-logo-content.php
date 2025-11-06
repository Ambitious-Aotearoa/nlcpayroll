<?php
global $section;

$media   = $section['media'];
$content = $section['content'];

?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="section-logo-content__image">
					<?php if ( $media ) { ?>
						<img src="<?php echo $media['url']; ?>" alt="<?php echo $media['alt']; ?>">
					<?php } ?>
				</div>
			</div>
			<div class="col-md-7">
				<?php if ( $content ) { ?>
					<div class="section-logo-content__content">
						<?php echo $content; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
