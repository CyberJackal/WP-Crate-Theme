<?php
/*
Tempalte for when a category, author, or date is queried.
Note that this template will be overridden by category.php, 
author.php, and date.php for their respective query types
*/
?>

<?php get_header(); ?>

<?php global $wp_query;
$term =	$wp_query->queried_object; ?>

	<div class="row page-heading">

		<div class="col-sm-5 col-sm-offset-1">

			<h1>Directory: <?php echo $term->name ?></h1>

		</div>

		<div class="clearfix"></div>

	</div>

	<?php get_template_part( 'sidebar', 'left' ); ?>

	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/directory/' ); ?>">
		<label>
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		</label>
		<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>

	<?php /*$terms = get_terms( 'dir_category' ); 
	foreach ($terms as $term) {
		echo '<p><a href="'.home_url( '/dir_category/' ).$term->slug.'">'.$term->name.'</a></p>';
	}*/

	?>

	<?php $term = $wp_query->queried_object; ?>

	<?php $args = array(
		'post_type' => 'directory',
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key'     => 'lh_directory_name',
				'value'   => $_GET['s'],
				'compare' => 'LIKE'
			),
			array(
				'key'     => 'lh_directory_town',
				'value'   => $_GET['s'],
				'compare' => 'LIKE'
			),
			array(
				'key'     => 'lh_directory_county',
				'value'   => $_GET['s'],
				'compare' => 'LIKE'
			)
		),
		'meta_key' => 'lh_directory_name',
		'order' => 'ASC',
		'orderby' => 'meta_value',
		'tax_query' => array(
			array(
				'taxonomy' => 'dir_category',
				'field'    => 'slug',
				'terms'    => $term->slug,
			),
		),
	);

	$the_query = new WP_Query( $args ); ?>

	<?php if ( $the_query->have_posts() ) : ?>				

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php get_template_part( 'content', get_post_type() ); ?>
			<br />

		<?php endwhile; ?>

	<?php else: ?>

		<p>No items found</p>

	<?php endif; ?>

	<?php get_template_part( 'sidebar', 'right' ); ?>

<?php get_footer(); ?>