<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/acfactory/pull/1042
 */

$includes = [
	'lib/extras.php',     // Custom functions.
	'lib/setup.php',      // Theme setup.
	'lib/titles.php',     // Page titles.
	'lib/class-wp-bootstrap-navwalker.php', // Navwalker.
	'lib/post-types.php',
	'lib/section.php',
	'lib/admin.php',
];

/*
 * comment out the following to slimline theme if now being used
 */
// $includes[] = 'lib/woocommerce.php';

foreach ( $includes as $file ) {
	require_once $file;
}

add_filter( 'embed_oembed_html', 'wrap_oembed_html', 99, 4 );

function wrap_oembed_html( $cached_html, $url, $attr, $post_id ) {
	if ( false !== strpos( $url, "://youtube.com") || false !== strpos( $url, "://youtu.be" ) || false !== strpos( $url, "://vimeo.com")) {
	$cached_html = '<div class="responsive-video__wrapper"><div class="responsive-video">' . $cached_html . '</div></div>';
	}
	return $cached_html;
	}

add_action('media_buttons', 'add_form_buttons');

function add_form_buttons() {
	echo '<a href="#" id="insert-my-media" class="button">Add my media</a>';
}


function display_current_template()
{
	if (is_super_admin()) { // Restrict to super admins for security
		global $template;
		echo '<div style="position: fixed; bottom: 0; left: 0; background: rgba(0,0,0,0.7); color: white; padding: 5px 10px; z-index: 9999;">';
		echo 'Template: ' . basename($template);
		echo '</div>';
	}
}


// 1. Register a custom block category using the 'nlcpayroll' text domain
function nlcpayroll_register_block_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'nlcpayroll-sections',
				'title' => __( 'NLC Payroll Sections', 'nlcpayroll' ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'nlcpayroll_register_block_categories' );


// 2. Register a dynamic Block Pattern using the 'nlcpayroll' slug
function nlcpayroll_register_dynamic_payroll_hero_pattern() {

	// Define the callback function that will render the PHP template part file
	$render_callback = function() {
		// Start output buffering
		ob_start();

		// Include your template part file, now correctly pointing to /sections/section-payroll-hero.php
		get_template_part( 'sections/section', 'payroll-hero' );

		// Return the buffered content
		return ob_get_clean();
	};

	// ... rest of the register_block_pattern call remains the same ...

	register_block_pattern(
		'nlcpayroll/dynamic-payroll-hero',
		array(
			'title'       => __( 'Payroll Hero Section (Dynamic)', 'nlcpayroll' ),
			'description' => __( 'A two-column hero section loaded from /sections/section-payroll-hero.php.', 'nlcpayroll' ),
			'content'     => '<div class="nlcpayroll-hero-preview">Payroll Hero Content (Dynamically Loaded)</div>',
			'categories'  => array( 'nlcpayroll-sections' ),
		)
	);
}
add_action( 'init', 'nlcpayroll_register_dynamic_payroll_hero_pattern' );
