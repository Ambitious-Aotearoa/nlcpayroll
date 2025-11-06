<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package acfactory
 * @since acfactory 1.0
 */

if ( post_password_required() ) {
	return;
}

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php if ( have_comments() ) { ?>

		<ol class="comments__list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 74,
					)
				);
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<nav class="navigation comments__navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'acfactory' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'acfactory' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'acfactory' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php } ?>

		<?php if ( ! comments_open() && get_comments_number() ) { ?>
			<p class="comments__no-comments alert alert-warning"><?php esc_html_e( 'Comments are closed.', 'acfactory' ); ?></p>
		<?php } ?>

	<?php } ?>

	<?php
	comment_form(
		array(
			'comment_notes_after' => '',
		)
	);
	?>

</div><!-- #comments -->
