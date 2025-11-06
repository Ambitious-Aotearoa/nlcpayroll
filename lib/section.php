<?php

function acfactory_section( $add_classes = null ) {
	global $section;

	// --- CRITICAL FIX START: Exit if $section is not a valid array ---
	if ( ! is_array( $section ) || empty( $section ) ) {
		return;
	}
	// --- CRITICAL FIX END ---

	$section_id = $section['appearance']['id'] !== '' ? $section['appearance']['id'] : 'section-' . $section['index'];

	echo 'id="' . esc_html( $section_id ) . '"';

	$section_name       = str_replace( '_', '-', $section['acf_fc_layout'] );
	// Use the null coalescing operator (?? '') on sub-keys for safety, like we did before
	$additional_classes = $section['appearance']['addition_classes'] ?? '';
	$text_alignment     = $section['appearance']['text_alignment'] ?? '';

	// Padding
	$equal_padding_y = $section['appearance']['spacing']['equal_padding_y'] ?? false; // Assuming boolean/false default
	$padding_y       = $section['appearance']['spacing']['padding_y'] ?? '';
	$padding_top     = $section['appearance']['spacing']['padding_top'] ?? '';
	$padding_bottom  = $section['appearance']['spacing']['padding_bottom'] ?? '';
	if ( $equal_padding_y ) {
		$padding = 'p-' . $padding_y;
	} else {
		$padding = 'pt-' . $padding_top . ' pb-' . $padding_bottom;
	}

	// Text color
	$text_color = $section['appearance']['text_color'] ?? '';

	if( $text_color ) {
		$text_color = 'text-' . $text_color;
	}

	// Background color
	$background_color = $section['appearance']['background_color'] ?? '';

	if( $background_color ) {
		$background_color = 'bg-' . $background_color;
	}

	// Classes
	$classes[] = 'section';
	$classes[] = 'section-' . $section_name;
	$classes[] = $padding;
	$classes[] = $text_color;
	$classes[] = $background_color;
	$classes[] = $additional_classes;
	$classes[] = $text_alignment;
	$classes[] = $add_classes;
	$classes   = array_filter( $classes );

	if ( $classes ) {
		echo 'class="' . implode( ' ', $classes ) . '"';
	}

	// Background (Line 55 fix)
	$background_image        = $section['appearance']['background_image']['url'] ?? ''; // FIXED: Added ?? ''
	$background_size         = $section['appearance']['size'] ?? '';
	$background_position     = $section['appearance']['position'] ?? '';
	$background_repeat       = $section['appearance']['repeat'] ?? '';
	$custom_background_color = $section['appearance']['custom_background_color'] ?? '';

	$styles = array();
	if ( $background_color === 'bg-custom' && $custom_background_color ) {
		$styles[] = 'background-color: ' . $custom_background_color;
	}
	if ( $background_image ) {
		$styles[] = 'background-image: url(' . $background_image . ')';
		$styles[] = 'background-size: ' . $background_size;
		$styles[] = 'background-repeat: ' . $background_repeat;
		$styles[] = 'background-position: ' . $background_position;
	}

	if( $text_color === 'text-custom' ) {
		$styles[] = 'color: ' . ($section['appearance']['custom_text_color'] ?? ''); // Added ?? '' here too
	}

	if ( $styles ) {
		echo 'style="' . implode( '; ', $styles ) . '"';
	}
}

function acfactory_button( $button, $is_link = true ) {
// ... The rest of this function is fine as $button is passed directly and likely checked upstream.
// I recommend checking $button here as well if errors occur, but it is outside the scope of the current error.
// ... (omitted for brevity)
	$classes = array( 'btn' );

	$classes[] = $button['style'] ?? '';
	$classes[] = $button['size'] ?? '';

	if ( ($button['alignment'] ?? '') === 'btn-block' ) {
		$classes[] = $button['alignment'];
	}

	if ( isset( $button['lightbox'] ) && $button['lightbox'] != 'none' ) {
		$classes[] = 'mfp-' . $button['lightbox'];
	}

	if ( isset( $button['link']['url'] ) ) {
		?>
	<div class="button_wrapper <?php echo ($button['alignment'] ?? '') !== 'btn-block' ? ($button['alignment'] ?? '') : ''; ?>">
		<<?php echo $is_link ? 'a' : 'span'; ?> class="<?php echo implode( ' ', $classes ); ?>" href="<?php echo $button['link']['url']; ?>" target="<?php echo $button['link']['target']; ?>">
		<span><?php echo $button['link']['title']; ?></span>
		</<?php echo $is_link ? 'a' : 'span'; ?>>
		</div>
		<?php
	}
}
