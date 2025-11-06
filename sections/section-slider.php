<?php
global $section;

$slides = $section['slides'];

?>

<section <?php acfactory_section(); ?>>

	<div class="section-slider__wrapper">
		<div class="swiper-container swiper-container--images">
			<div class="swiper-wrapper">
				<?php foreach ( $slides as $item ) { ?>
					<?php
					$title   = $item['title'];
					$content = $item['content'];
					$button  = $item['button'];
					$image   = $item['image'];
					?>
					<div class="swiper-slide">

						<img src="<?php echo $image['url']; ?>">

						<div class="slide__body">
							<?php if ( $title ) { ?>
								<h1 class="slide__title">
									<?php echo $title; ?>
								</h1>
							<?php } ?>

							<?php if ( $content ) { ?>
								<div class="slide__content">
									<?php echo $content; ?>
								</div>
							<?php } ?>

							<?php if ( $button['link'] ) { ?>
								<div class="slide__actions">
									<?php acfactory_button( $button ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="swiper-controls">
			<div class="swiper-button-prev btn-arrow btn-arrow--reverse"></div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next btn-arrow"></div>
		</div>
	</div>
</section>
