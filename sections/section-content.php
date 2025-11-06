<?php
global $section;

$title   = $section['title'];
$content = $section['content'];

?>

<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="section-content__body">
			<?php if ( $title ) { ?>
				<h2 class="text-primary section-content__title">
					<?php echo esc_html( $title ); ?>
				</h2>
			<?php } ?>

			<?php if ( $content ) { ?>
				<div class="section-content__content">
					<?php echo $content; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
