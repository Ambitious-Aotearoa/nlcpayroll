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
				<div class="col-md-6">
					<div class="two-column-image__column">
						<div class="two-column-image">
							<?php if ( $image ) { ?>
								<div class="two-column-image__image">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
								</div>
							<?php } ?>
							<div class="two-column-image__body">
								<?php if ( $title ) { ?>
									<h2 class="two-column-image__title text-primary"><?php echo $title; ?></h2>
								<?php } ?>
								<?php if ( $content ) { ?>
									<div class="two-column-image__content">
										<?php echo $content; ?>
									</div>
								<?php } ?>
								<?php if ( $button ) { ?>
									<div class="two-column-image__actions">
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
