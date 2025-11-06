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
