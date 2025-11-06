<?php

function acfactory_init() {
	/*
	 * Add theme options page via ACF.
	 * https://www.advancedcustomfields.com/resources/options-page/
	 */

	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Theme Settings',
				'menu_title' => 'Theme Settings',
				'menu_slug'  => 'theme-settings',
				'capability' => 'edit_theme_options',
				'redirect'   => false,
			)
		);
	}

	/*
	 * Configure Google Map API with API key.
	 */

	if ( function_exists( 'acf_update_setting' ) ) {
		acf_update_setting( 'google_api_key', get_field( 'google_api_key', 'options' ) );
	}
}

add_action( 'acf/init', 'acfactory_init' );

add_action( 'acf/render_field_settings/type=image', 'add_default_value_to_image_field' );
function add_default_value_to_image_field( $field ) {
	acf_render_field_setting( $field, 
		array(
			'label'        => 'Default Image',
			'instructions' => 'Appears when creating a new post',
			'type'         => 'image',
			'name'         => 'default_value',
		)
	);
}

function get_country() {
    $ip = $_SERVER['REMOTE_ADDR'];
	//$ip = '185.24.10.17';

	$url = "http://www.geoplugin.net/json.gp?ip=".$ip;

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	//for debug only!
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$resp = curl_exec($curl);
	curl_close($curl);
	$data = json_decode($resp);
	echo $data->geoplugin_countryName;
    wp_die();
}

add_action( 'wp_ajax_nopriv_get_country', 'get_country' );
add_action( 'wp_ajax_get_country', 'get_country' );

