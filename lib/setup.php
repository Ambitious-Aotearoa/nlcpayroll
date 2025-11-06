<?php
/**
 * acfactory theme setup options
 *
 * @package acfactory
 * @since acfactory 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 998;
}

/**
 * Theme setup
 */
function acfactory_setup() {

	remove_action( 'wp_head', 'wp_generator' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'align-wide' );

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	add_theme_support( 'title-tag' );

	add_theme_support(
		'custom-logo',
		array(
			'width'       => 200,
			'height'      => 80,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus(
		[
			'primary_navigation' => __( 'Primary Navigation', 'acfactory' ),
			'footer_navigation'  => __( 'Footer Navigation', 'acfactory' ),
		]
	);

	// Enable post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support( 'post-thumbnails' );

	// Enable HTML5 markup support
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
}
add_action( 'after_setup_theme', 'acfactory_setup' );

/**
 * Register sidebars
 */
function acfactory_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Primary', 'acfactory' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<section class="widget widget--sidebar %1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget__title">',
			'after_title'   => '</h5>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Footer 1', 'acfactory' ),
			'id'            => 'footer-1',
			'before_widget' => '<section class="widget widget--footer %1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget__title"><span>',
			'after_title'   => '</span></h5>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Footer 2', 'acfactory' ),
			'id'            => 'footer-2',
			'before_widget' => '<section class="widget widget--footer %1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget__title"><span>',
			'after_title'   => '</span></h5>',
		]
	);
}
add_action( 'widgets_init', 'acfactory_widgets_init' );

/**
 * Theme assets
 */

function acfactory_assets() {
	// wp_enqueue_style( 'typekit-fonts', '', false, '1.0.0' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=DM+Sans:400,500,700|Roboto|Work+Sans&display=swap', false, '1.0.0' );
	wp_enqueue_style( 'swiper-styles', 'https://unpkg.com/swiper/css/swiper.min.css', false );
	wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/dist/styles/main.css', false );

	// Enqueue editor-styles.css
	wp_enqueue_style( 'editor-styles', get_template_directory_uri() . '/dist/styles/editor-styles.css', false );

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$acfactory_settings = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);

	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/dist/scripts/main.js', [ 'jquery' ], '1.0', true );
	wp_enqueue_script( 'swiper-scripts', 'https://unpkg.com/swiper/js/swiper.min.js', [ 'jquery' ], '1.0', true );
	wp_localize_script( 'theme-scripts', 'acfactory_settings', $acfactory_settings );

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'wp_enqueue_scripts', 'acfactory_assets', 100 );

add_action( 'gform_after_submission', 'my_gravityform_submission_event', 10, 2 );
function my_gravityform_submission_event( $entry, $form ) {
    if ( $form['id'] == '1' ) { // Replace '1' with the ID of the form you want to track
        $event = array(
            'event' => 'gform_submission',
            'formId' => 'Contact us'
        );
        $params = array(
            'event_category' => 'gravity-forms',
            'event_action' => 'submit',
            'event_label' => 'Contact Us Form'
        );
        $args = array(
            'send_to' => 'AW-545137966/YVA-CPOmiOkBEK7K-IMC', // Replace with your Google Ads conversion ID
            'event_callback' => '__gaTracker'
        );
        ?>
        <script>
            gtag('event', <?php echo json_encode( $params ); ?>, <?php echo json_encode( $args ); ?>);
        </script>
        <?php
    }
}
