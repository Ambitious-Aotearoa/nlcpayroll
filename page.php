<?php get_header(); ?>

<?php while ( have_posts() ) { ?>
	<?php the_post(); ?>

	<?php $sections = get_field( 'sections' ); ?>

	<?php if( $sections ) { ?>
		<?php $i = 1; ?>
		<?php foreach ( $sections as $section ) { ?>
			<?php $section['index'] = $i; ?>
			<?php get_template_part( 'sections/section', str_replace( '_', '-', $section['acf_fc_layout'] ) ); ?>
			<?php $i++; ?>
		<?php } ?>
	<?php } ?>

<?php } ?>

<?php get_footer(); ?>
