<?php

/*
Template Name: Landing
*/

//* Add landing body class to the head
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {

	$classes[] = 'landing';
	return $classes;

}



//* Force full width content layout
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove the site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_title', 'custom_site_title' );

//* Remove navigation
remove_action( 'genesis_after_header', 'genesis_do_nav', 15 );
remove_action( 'genesis_footer', 'genesis_do_subnav', 7 );

//* Unregister secondary navigation menu
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );


//* Remove Minimum after header
remove_action( 'genesis_after_header', 'minimum_site_tagline' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

//* Remove site footer elements
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

//* Run the Genesis loop
genesis();
