<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to bouquet_comment() which is
 * located in the functions.php file.
 *
 * @package Bouquet
 */

if ( post_password_required() )
	return;
?>

<div id="comments">

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'bouquet' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'bouquet' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bouquet' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bouquet' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use bouquet_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define bouquet_comment() and that will be used instead.
				 * See bouquet_comment() in bouquet/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'bouquet_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'bouquet' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bouquet' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bouquet' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'bouquet' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
