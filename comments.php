<?php
/**
 * The template for displaying Comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<div class="toggle-comments">Comments</div>

<div class="row page-comments closed">


	<div id="comments" class="comments-area">

		<?php if ('open' == $post->comment_status) : ?>

			<?php if ( is_user_logged_in() ):

				$user = wp_get_current_user();
				$display_name = $user->display_name;
				$email = $user->user_email;

			endif; ?>

			<div id="respond" class="comment-respond row">
				<?php comment_form(); ?>
			</div>

		<?php endif; ?>

		<?php if ( have_comments() ) : ?>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

				<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">

					<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'crate-wordpress' ); ?></h1>

					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'crate-wordpress' ) ); ?></div>

					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'crate-wordpress' ) ); ?></div>

				</nav><!-- #comment-nav-above -->

			<?php endif; // Check for comment navigation. ?>

			<div class="comment-list">

				<?php
					wp_list_comments( array(
						'style'       => 'div',
						'short_ping'  => true,
						'avatar_size' => 34,
					) );
				?>

			</div><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

				<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">

					<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'crate-wordpress' ); ?></h1>

					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'crate-wordpress' ) ); ?></div>

					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'crate-wordpress' ) ); ?></div>

				</nav><!-- #comment-nav-below -->

			<?php endif; // Check for comment navigation. ?>

			<?php if ( ! comments_open() ) : ?>

				<p class="no-comments"><?php _e( 'Comments are closed.', 'crate-wordpress' ); ?></p>

			<?php endif; ?>

		<?php endif; // have_comments() ?>

	</div><!-- #comments -->

</div>
