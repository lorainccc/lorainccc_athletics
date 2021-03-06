<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package LCCC Framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="show-on-focus hide-for-print" href="#content"><?php esc_html_e( 'Skip to content', 'lccc-framework' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
  <div class="row show-for-small-only mobile-nav-bar">
    <div class="small-8 columns"> <a href="/athletics"><img src="/athletics/wp-content/themes/lorainccc_athletics/images/lccc-commodore-logo-white.png" alt="Lorain County Community College Commodores Athletics" width="165" height="31.875" /></a> </div>
    <div class="small-2 columns clearfix"> <button data-responsive-toggle="mobile-search" data-hide-for="medium"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/magnifying-glass.svg" height="25" width="25" alt="Toggle LCCC Athletics Website Search" class="float-right" data-toggle/></button> </div>
    <div class="small-2 columns"> <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle>Toggle Menu</button>
      </span> </div>
  </div>
		  <div class="row show-for-medium">
    <div class="large-6 medium-6 columns"><a href="<?php echo esc_url( home_url( '' ) ); ?>"><img src="/athletics/wp-content/uploads/sites/8/2016/07/Commodores-Athletics-web-logo.png" height="92" width="400" alt="Lorain County Community College Commodores Athletics" /></a>  </div>
    <div class="large-6 medium-6 columns header-menu-widgets">
     									<?php
          wp_nav_menu(array(
											'container' => false,
											'menu' => __( 'Header Shortcuts Menu', 'textdomain' ),
											'menu_class' => 'menu align-right',
											'theme_location' => 'athletics-header-shortcuts',
											//'items_wrap'      => '<ul id="%1$s header-menu" class="%2$s">%3$s</ul>',
           'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
           ));
											?>
      <!-- This should be similar to what is generated when using Wordpress searchform.php -->
      <!--<form role="search" method="get" class="search-form" action="">
        <label>
          <input type="search" placeholder="Search" name="s" class="float-right"/>
        </label>
      </form>-->
     <div class="large-9 medium-6 columns searchbox">
      <?php get_sidebar(); ?>
     </div>
    </div>
  </div>
<div id="responsive-menu" class="medium-blue-bg ">
      <div class="small-12">
        <nav class="menu-centered">
									<?php
          wp_nav_menu(array(
											'container' => false,
											'menu' => __( 'Primary', 'textdomain' ),
											'menu_class' => 'dropdown menu',
											'theme_location' => 'athletics-primary',
											'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
											//Recommend setting this to false, but if you need a fallback...
											'fallback_cb' => 'lc_topbar_menu_fallback',
											'walker' => new lc_top_bar_menu_walker,
												));
											?>
        </nav>
      </div>
    </div>
  </div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">