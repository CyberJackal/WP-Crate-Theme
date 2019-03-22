<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="site.webmanifest">
	<link rel="apple-touch-icon" href="icon.png">
	<!-- Place favicon.ico in the root directory -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!--[if lte IE 9]>
		<p class="browserupgrade alert alert--danger">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/" class="alert--link">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<header id="masthead">
		<div class="container">
			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		</div>
	</header>
	<div id="content" class="container">
