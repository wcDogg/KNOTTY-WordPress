 <?php
/**
 * header.php
 * Displays the site header
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>   


<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/b433fadb6c.js"></script>

	<title><?php wp_title(); ?></title>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="site" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'knotty' ); ?></a>
 
	<header id="header" class="site__header">
		
		<?php 
			get_template_part('parts/nav/nav', 'branding');
			get_template_part('parts/nav/nav', 'main'); 
			get_template_part('parts/nav/nav', 'follow'); 
			get_template_part('parts/nav/nav', 'mobile'); 
		?>

	</header><!-- #header -->
	
    <main id="main" class="site__main"> 