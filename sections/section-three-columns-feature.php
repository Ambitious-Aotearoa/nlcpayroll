<?php
global $section;

$image   = $section['image'];
$title   = $section['title'];
$content = $section['content'];
$button  = $section['button'];
?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="three-column-feature">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="three-column-feature__column">
						<?php if ( $image ) { ?>
							<div class="three-column-feature__image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6 col-lg-8">
					<div class="three-column-feature__column">
						<div class="three-column-feature__body">
							<?php if ( $title ) { ?>
								<h3 class="three-column-feature__title text-primary"><?php echo $title; ?></h3>
							<?php } ?>
							<?php if ( $content ) { ?>
								<div class="three-column-feature__content">
									<?php echo $content; ?>
								</div>
							<?php } ?>
							<?php if ( $button['link'] != '' ) { ?>
								<div class="three-column-feature__actions">
									<?php acfactory_button( $button ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
