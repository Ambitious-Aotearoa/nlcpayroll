<?php
/**
 * The template part for the site header
 *
 * @package acfactory
 * @since acfactory 1.0
 */

 
$phone = get_field( 'phone' , 'option' );

?>

<header class="header" role="banner">

	<nav class="navbar" role="navigation">
		<div class="container-fluid">
			<?php the_custom_logo(); ?>
		
			<div class="navbar-search">
				<?php echo get_search_form(); ?>

				<button class="navbar-search-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-search" aria-controls="navbar-search" aria-expanded="false" aria-label="Toggle navbar-search">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"><path style="fill:currentColor" d="M16.2 7.9c0-4.4-3.6-7.9-8.1-7.9S0 3.5 0 7.9s3.6 7.9 8.1 7.9c1.6 0 3.2-.5 4.6-1.4l3.6 3.6 1.7-1.7-3.6-3.5c1.2-1.4 1.8-3.1 1.8-4.9zm-8.1 5.5c-3.1 0-5.7-2.5-5.7-5.5S5 2.4 8.1 2.4s5.7 2.5 5.7 5.5-2.6 5.5-5.7 5.5z"/></svg>
				</button>
			</div>

<!-- 			<div class="navbar-phone">
				<?php// echo theme_phone(); ?>
			</div> -->

			<button class="navbar-toggle x collapsed" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				
			<div class="collapse navbar-collapse" id="menu">
				<?php
				if ( has_nav_menu( 'primary_navigation' ) ) {
					wp_nav_menu(
						[
							'theme_location' => 'primary_navigation',
							'menu_class'     => 'primary-menu navbar-nav',
							'depth'          => 2,
							'container'      => null,
							'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							'walker'         => new WP_Bootstrap_Navwalker(),
						]
					);
				}
				?>
		
				<div class="navbar-search">
					<?php echo get_search_form(); ?>
				</div>
			</div>
				
			<div class="collapse navbar-search-collapse" id="navbar-search">
				<div class="navbar-search">
					<?php echo get_search_form(); ?>
				</div>
			</div>
			
		</div>
	</nav>

</header>
