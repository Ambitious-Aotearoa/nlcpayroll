<?php
global $section;

$columns   = $section['columns'];

?>

<section <?php acfactory_section(); ?>>
	<div class="container">

		<?php if ( $columns ) { ?>
			<div class="section-two-columns__columns">
				<div class="row">
					<?php $i = 1; ?>
					<?php foreach ( $columns as $column ) { ?>
						<?php
						$title   = $column['title'];
						$content = $column['content'];
						$button  = $column['button'];
						?>
						<div class="<?php echo $i == 1 ? 'col-lg-4' : 'col-lg-6'; ?>">
							<div class="section-two-columns__column section-two-columns__column--<?php echo $i; ?>">
								<div class="section-two-columns__column-inner">
									<?php if ( $title ) { ?>
										<h2 class="section-two-columns__column-title text-warning">
											<?php echo $title; ?>
										</h2>
									<?php } ?>
									<?php if ( $content ) { ?>
										<div class="csection-two-columns__column-content">
											<?php echo $content; ?>
										</div>
									<?php } ?>
									<?php if ( $button ) { ?>
										<div class="section-two-columns__column-action">
											<?php acfactory_button( $button ); ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php $i++; ?>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

	</div>
</section>
