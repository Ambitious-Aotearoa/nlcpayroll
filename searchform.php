<?php
/**
 * The template for displaying search forms
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="sr-only"><?php esc_html_e( 'Search', 'twentyeleven' ); ?></label>
	<div class="field__wrapper">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>">
	</div>
	<button type="submit" class="btn btn-link submit" name="submit" id="searchsubmit" title="searchsubmit" />
	<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path style="fill:currentColor" d="M16.2 7.9c0-4.4-3.6-7.9-8.1-7.9S0 3.5 0 7.9s3.6 7.9 8.1 7.9c1.6 0 3.2-.5 4.6-1.4l3.6 3.6 1.7-1.7-3.6-3.5c1.2-1.4 1.8-3.1 1.8-4.9zm-8.1 5.5c-3.1 0-5.7-2.5-5.7-5.5S5 2.4 8.1 2.4s5.7 2.5 5.7 5.5-2.6 5.5-5.7 5.5z"/></svg>
		<span class="sr-only"><?php esc_attr_e( 'Search', 'twentyeleven' ); ?></span>
	</button>
</form>
