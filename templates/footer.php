<?php
/**
 * The footer content for our theme.
 *
 * @package acfactory
 * @since acfactory 1.0
 */

$phone = get_field( 'phone' , 'option' );

?>
<footer class="footer">

	<div class="footer__main">
		<div class="container">
			<div class="footer__inner">
				<div class="row">
					<div class="col-xl-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="col-xl-9">
						<?php
						if ( has_nav_menu( 'footer_navigation' ) ) {
							wp_nav_menu(
								[
									'theme_location' => 'footer_navigation',
									'menu_class'     => '',
									'depth'          => 1,
									'container'      => null,
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
								]
							);
						}
						?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>
