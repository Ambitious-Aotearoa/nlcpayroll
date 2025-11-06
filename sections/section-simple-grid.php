<?php
global $section;

$columns_count = $section['columns_count'];
$columns       = $section['columns'];

?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="row">
			<?php if ( $columns ) { ?>
				<?php foreach ( $columns as $item ) { ?>
					<?php $content = $item['content']; ?>
					<div class="col-md-<?php echo 12 / $columns_count; ?>">
						<?php if ( $content ) { ?>
							<div class="section-logo-content__content">
								<?php echo $content; ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>
