<?php
/**
 * General templating specific functions
 *
 * @package acfactory
 * @since acfactory 1.0
 */

function wpse206329_custom_post_type_args( $args, $post_type ) {
    if ( $post_type === "case-study" ) {
        $args['has_archive'] = get_page_uri(190);
    }

    return $args;
}
add_filter( 'register_post_type_args', 'wpse206329_custom_post_type_args', 20, 2 );

/**
 * Clean up the_excerpt()
 */
function acfactory_excerpt_more() {
	return ' &hellip;';
}
add_filter( 'excerpt_more', 'acfactory_excerpt_more' );

function acfactory_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'acfactory_excerpt_length', 999 );

function acfactory_pagination() {
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	if ( $wp_query->max_num_pages > 1 ) { 
		?>
		<div class="pagination">
			<div class="pagination__link pagination__link--prev">
				<?php previous_posts_link(); ?>
			</div>
			<div class="pagination__state">
				<?php echo $current . ' of ' . $wp_query->max_num_pages; ?>
			</div>
			<div class="pagination__link pagination__link--next">
				<?php next_posts_link(); ?>
			</div>
		</div>
		<?php
	}
}

add_filter( 'get_custom_logo', 'acfactory_logo_class' );
function acfactory_logo_class( $html ) {
	$html = str_replace( 'custom-logo', 'navbar-brand', $html );
	return $html;
}

/**
 * WordPress' missing is_blog_page() function.  Determines if the currently viewed page is
 * one of the blog pages, including the blog home page, archive, category/tag, author, or single
 * post pages.
 *
 * @return bool
 */
function is_blog() {
	global $post;

	// Post type must be 'post'.
	$post_type = get_post_type( $post );

	// Check all blog-related conditional tags, as well as the current post type,
	// to determine if we're viewing a blog page.
	return ( 'post' === $post_type ) && ( is_home() || is_archive() || is_single() );
}

add_filter( 'nav_menu_item_title', 'do_shortcode', 10 );


// Call styleguide
add_shortcode( 'styleguide', 'theme_styleguide' );
function theme_styleguide() {
	ob_start();
	get_template_part( 'templates/styleguide' );
	return ob_get_clean();
}

function hex_to_rgb( $hex, $alpha = false ) {
	$hex      = str_replace('#', '', $hex);
	$length   = strlen($hex);
	$rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
	$rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
	$rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
	if ( $alpha ) {
		$rgb['a'] = $alpha;
	}
	return 'rgba(' . implode(',', $rgb) . ')';
}

add_action( 'wp_head', 'badge_colors', 100 );
function badge_colors() {
	?>
	<style>
		<?php
		$category       = get_terms( 'category' );
		$case_study_cat = get_terms( 'case-study_cat' );
		$all_terms = array_merge( $category, $case_study_cat );
		
		foreach ( $all_terms as $term ) {
			$color            = get_field( 'color', $term );
			$background_color = get_field( 'background_color', $term );
			if ( $color ) {
				?>
					.term-badge--<?php echo $term->term_id; ?>.category-nav__item--active { color: <?php echo $color; ?>; background-color: <?php echo hex_to_rgb( $background_color, 0.1 ); ?> }
					.term-badge--<?php echo $term->term_id; ?> a,
					.term-badge--<?php echo $term->term_id; ?> span { color: <?php echo $color; ?>; background-color: <?php echo hex_to_rgb( $background_color, 0.1 ); ?> }
					.term-badge--<?php echo $term->term_id; ?> time { color: <?php echo $color; ?>; }
					.term-badge--<?php echo $term->term_id; ?> a:hover { color: <?php echo $color; ?>; background-color: <?php echo hex_to_rgb( $background_color, 0.1 ); ?> }
					.term-badge--<?php echo $term->term_id; ?>.category-nav__item--active a:hover { background-color: transparent; }
					.term-badge--<?php echo $term->term_id; ?> a:after { background-color: <?php echo $color; ?>; }
				<?php
			}
		}
		?>
	</style>
	<?php
}

add_shortcode( 'button', 'theme_button' );
function theme_button( $atts, $content = null ) {

	// shortcode attributes
	extract( 
		shortcode_atts(
			array(
				'url'    => '',
				'target' => '',
				'style'  => '',
				'size'   => '',
			), 
			$atts 
		)
	);

	if ( $url ) {

		$link_attr = array(
			'href'   => esc_url( $url ),
			'target' => ( 'blank' === $target ) ? '_blank' : '',
			'class'  => 'btn btn-' . $style . ' btn-' . $size,
		);

		$link_attrs_str = '';

		foreach ( $link_attr as $key => $val ) {
			if ( $val ) {
				$link_attrs_str .= ' ' . $key . '="' . $val . '"';
			}
		}

		return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';

	}
}

add_shortcode( 'phone', 'theme_phone' );
function theme_phone() {
	$phones = get_field( 'phone', 'options' );

	if ( $phones ) {

		ob_start();
		$geoip = geoip_detect2_get_info_from_ip( $_SERVER['REMOTE_ADDR'] );

		?>
		<div class="phones">
			<?php
			foreach ( $phones as $item ) {
				$flag                     = $item['flag'];
				$display_for_country_code = $item['display_for_country_code'];
				$phone                    = $item['phone'];

				$number = preg_replace( '~\D~', '', $phone );
				if ( isset( $geoip->country->isoCode) && $geoip->country->isoCode == $display_for_country_code ) {
					?>
						<a class="phones__link" href="tel:<?php echo $number; ?>">
							<img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>">
							<span class="phones__text"><?php echo $phone; ?></span>
						</a>
					<?php
				}
			}
			?>
		</div>
		<?php

		$output = ob_get_clean();
		return $output;
	}
}


