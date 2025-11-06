<?php
/**
 * The template part for the page header
 *
 * @package acfactory
 * @since acfactory 1.0
 */

$pid = get_post_type() == 'case-study' ? 190 : 181;

if ( $pid ) {
	$background_image = wp_get_attachment_url( get_post_thumbnail_id( $pid ), 'full' );
}

?>

<div class="section page-header page-header--overlay">
	<div class="container">
		<h1 class="page-header__title"><?php echo acfactory_title(); ?></h1>
		<?php if( is_404() ) { ?>
			<?php esc_html_e( 'Sorry, but the page you were trying to view does not exist.', 'acfactory' ); ?>
		<?php } ?>
	</div>

	<?php if ( $background_image ) { ?>
		<div class="page-header__background-image">
			<img style="display: none" src="<?php echo $background_image; ?>" alt="">
		</div>
	<?php } ?>
</div>
