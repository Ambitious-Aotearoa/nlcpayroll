<?php get_header(); ?>

<?php while ( have_posts() ) { ?>
	<?php the_post(); ?>

	<?php
	/**
	 * Load ACF Flexible Content Sections.
	 * This structure uses the ACF-recommended functions (have_rows/the_row).
	 * We retrieve the raw row data ($section) to support legacy template parts.
	 */
	if( have_rows( 'sections' ) ) {
		$i = 1; // Counter can still be used if needed for custom logic or IDs

		while( have_rows( 'sections' ) ) {
			the_row(); // CRUCIAL: Sets the current row context for get_sub_field()

			// --- FIX FOR LEGACY SECTIONS (Addressing PHP Warnings) ---
			// Retrieve the full array of field data for the current row
			// The 'true' argument ensures all sub-fields are included in the array.
			$section = get_row( true );
			$section['index'] = $i; // Restore the index key for legacy use
			// -----------------------------------------------------------

			// Get the ACF Layout Name (e.g., 'payroll_hero')
			$layout = get_row_layout();

			// Clean the layout name (replaces underscores with hyphens) for the file name
			$slug   = str_replace( '_', '-', $layout );

			// Load the corresponding template part file
			get_template_part( 'sections/section', $slug );

			$i++;
		}
	}
	?>

<?php } ?>

<?php get_footer(); ?>
