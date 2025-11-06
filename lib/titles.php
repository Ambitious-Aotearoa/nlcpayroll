<?php
/**
 * Page title specific functions
 *
 * @package acfactory
 * @since acfactory 1.0
 */

/**
 * Page titles
 */
function acfactory_title() {
	if ( is_home() || is_category() || is_singular( 'post' ) ) {
		if ( get_field( 'post_header_title', 'options' ) ) {
			return get_field( 'post_header_title', 'options' );
		} elseif ( get_option( 'page_for_posts', true ) ) {
			return get_the_title( get_option( 'page_for_posts', true ) );
		} else {
			return __( 'Latest Posts', 'acfactory' );
		}
	} elseif ( is_post_type_archive( 'case-study' ) || is_singular( 'case-study' ) ) {
		if ( get_field( 'case_study_header_title', 'options' ) ) {
			return get_field( 'case_study_header_title', 'options' );
		} else {
			return get_the_archive_title();
		}
	} elseif ( is_archive() ) {
		return get_the_archive_title();
	} elseif ( is_search() ) {
		/* translators: %s: search results term */
		return sprintf( __( 'Search Results for %s', 'acfactory' ), get_search_query() );
	} elseif ( is_404() ) {
		return __( 'Not Found', 'acfactory' );
	} else {
		return get_the_title();
	}
}

add_filter( 'get_the_archive_title', 'tu_archive_title_remove_prefix' );
function tu_archive_title_remove_prefix( $title ) {
	if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}

	return $title;
}
