<?php
/**
 * The default single column page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>
	<div class="row">
		<section id="primary" class="content-area col col--8">
			<main id="main" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
				?>
			</main><!-- #main -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
<?php get_footer();
