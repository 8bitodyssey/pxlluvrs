<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pxlluvrs
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'pxl_before_body' ); ?>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<?php do_action( 'pxl_before_header' ); ?>

	<div class="fixed">
		<nav class="top-bar" data-topbar>
				<ul class="title-area">
					<li class="name">
						<h1>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					</li>
					<li class="toggle-topbar menu-icon">
						<a href=""><span>Menu</span></a>
					</li>
				</ul>
	  	<section class="top-bar-section">
	    <!-- Right Nav Section -->
				<ul class="right">
					<li class="has-form">
						<div class="row collapse">
								<?php get_search_form(); ?>
						</div>
					</li>
				</ul>
			</ssection>
		</nav>
	</div>

		<div class="header row">
			<div class="small-11 small-centered columns">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/ttl.png" /></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div>

		<?php do_action( 'pxl_after_header' ); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php do_action( 'pxl_before_content' ); ?>
