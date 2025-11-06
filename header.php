<?php
/**
 * The template for the head document structure
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'templates/head' ); ?>
<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5R59RMK"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="top" class="body-wrapper">
		<?php do_action( 'get_header' ); ?>
		<?php get_template_part( 'templates/header' ); ?>

		<div class="wrap" role="document">
