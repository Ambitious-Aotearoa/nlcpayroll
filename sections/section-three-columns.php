<?php
global $section;

$columns = $section['columns'];
?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="row">

			<?php $i = 1; ?>
			<?php foreach ( $columns as $item ) { ?>
				<?php
				$image   = $item['image'];
				$title   = $item['title'];
				$content = $item['content'];
				$button  = $item['button'];
				?>
				<div class="col-md-6 col-lg-4">
					<div class="three-column__column">
						<div class="three-column">
							<?php if ( $image ) { ?>
								<div class="three-column__image">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
								</div>
							<?php } ?>
							<div class="three-column__body">
								<?php if ( $title ) { ?>
									<h3 class="three-column__title text-primary"><?php echo $title; ?></h3>
								<?php } ?>
								<?php if ( $content ) { ?>
									<div class="three-column__content">
										<?php echo $content; ?>
									</div>
								<?php } ?>
								<?php if ( $button['link'] != '' ) { ?>
									<div class="three-column__actions">
										<?php acfactory_button( $button ); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php $i++; ?>
			<?php } ?>
		</div>
	</div>
</section>
