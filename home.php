<?php
/**
 * The template for displaying the blog index archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>
	<div class="row">
		<section id="primary" class="content-area col col--8">
			<main id="main" class="site-main">
				<?php if ( have_posts() ) : ?>

					<?php if ( ! is_front_page() ) : ?>

						<header class="page-header">
							<h1>Blog</h1>
						</header><!-- .page-header -->

					<?php endif; ?>

					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'excerpt' );
					endwhile;

					crate_pagination();
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				endif;
				?>
			</main><!-- #main -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
<?php get_footer();
