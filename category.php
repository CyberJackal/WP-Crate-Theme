<?php
/*
Shows posts from a specific category
*/
?>

<?php get_header(); ?>
	
	<div class="row page-heading">

		<div class="col-sm-5 col-sm-offset-1">

			<h2>Category: <?php single_cat_title(); ?></h2>

		</div>

		<div class="clearfix"></div>

	</div>

	<?php get_template_part( 'sidebar', 'left' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="post-block post-<?php echo get_post_type() ?>">

					<?php get_template_part( 'content', get_post_type() ); ?>

					<div class="clearfix"></div>

				</div>

			<?php endwhile; ?>

		<?php endif; ?>

	<?php get_template_part( 'sidebar', 'right' ); ?>	

<?php get_footer(); ?>