<?php
/**
 * @package Next_Saturday
 */

get_header(); ?>

	<div id="content" role="main">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>

				<div class="entry-container">
					<header class="entry-header">
						<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'next-saturday' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><p>' . __( 'Pages:', 'next-saturday' ), 'after' => '</p></div>' ) ); ?>
					</div><!-- .entry-content -->

					<div class="entry-meta-wrap">
						<div class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'next-saturday' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>

				</div><!-- .entry-container -->
			</article><!-- #post-## -->

		<?php comments_template(); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_footer(); ?>