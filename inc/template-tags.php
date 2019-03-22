<?php
/**
 * Custom template tags for this theme
 */

/**
 * Numbered pagination.
 *
 * @see paginate_links
 */
function crate_pagination() {
	$args = array(
		'prev_text' => '<',
		'next_text' => '>',
		'type' => 'list',
	);
	echo '<nav aria-label="Page Navigation" class="pager">';
	echo paginate_links( $args );
	echo '</nav>';
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function crate_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);
	printf(
		'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
		'',
		esc_url( get_permalink() ),
		$time_string
	);
}

/**
 * Prints HTML with meta information about theme author.
 */
function crate_posted_by() {
	printf(
		'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
		/* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
		'',
		__( 'Posted by', 'crate-wordpress' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

/**
 * Prints HTML with the comment count for the current post.
 */
function crate_comment_count() {
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		//echo crate_get_icon_svg( 'comment', 16 );
		/* translators: %s: Name of current post. Only visible to screen readers. */
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'crate-wordpress' ), get_the_title() ) );
		echo '</span>';
	}
}

function crate_entry_footer() {
	// Hide author, post date, category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		// Posted by
		crate_posted_by();
		// Posted on
		crate_posted_on();
		/* translators: used between list items, there is a space after the comma. */
		$categories_list = get_the_category_list( __( ', ', 'crate-wordpress' ) );
		if ( $categories_list ) {
			/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
			printf(
				'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
				'<i class=""></i>',
				__( 'Posted in', 'crate-wordpress' ),
				$categories_list
			); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma. */
		$tags_list = get_the_tag_list( '', __( ', ', 'crate-wordpress' ) );
		if ( $tags_list ) {
			/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
			printf(
				'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
				//crate_get_icon_svg( 'tag', 16 ),
				__( 'Tags:', 'crate-wordpress' ),
				$tags_list
			); // WPCS: XSS OK.
		}
	}
	// Comment count.
	if ( ! is_singular() ) {
		crate_comment_count();
	}
	// Edit post link.
	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers. */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'crate-wordpress' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
