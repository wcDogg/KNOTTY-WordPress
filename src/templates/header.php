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
		<h1 class="branding">
			<a class="white branding__link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Home">
				<span class="branding__logo">
						<!-- svg here -->
				</span>
				<span class="branding__text">
					<?php bloginfo( 'name' ); ?>               
				</span>
			</a>
		</h1>

		<nav id="nav-main" class="white nav nav--horizontal" role="navigation" aria-label="Popular Pages">
			<?php wp_nav_menu( array(
				'theme_location' => 'menu-main',	
			) ); ?>
		</nav>

		<?php 
			get_template_part('parts/nav/nav', 'follow'); 
			get_template_part('parts/nav/nav', 'mobile'); 
		?>

	</header><!-- #header -->
	
    <main id="main" class="site__main"> 