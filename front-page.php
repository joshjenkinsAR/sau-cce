<?php

//* Enqueue scripts
//add_action( 'wp_enqueue_scripts', 'minimum_front_page_enqueue_scripts' );
//function minimum_front_page_enqueue_scripts() {
	
	//* Load scripts only if custom background is being used
	//if ( ! get_background_image() )
	//	return;

	//* Enqueue Backstretch scripts
	//wp_enqueue_script( 'minimum-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0' );
	//wp_enqueue_script( 'minimum-backstretch-set', get_bloginfo('stylesheet_directory').'/js/backstretch-set.js' , array( 'jquery', 'minimum-backstretch' ), '1.0.0' );
	//wp_localize_script( 'minimum-backstretch-set', 'BackStretchImg', array( 'src' => get_background_image() ) );
	
	//* Add custom body class
	//add_filter( 'body_class', 'minimum_add_body_class' );
	//} 
	
//* Minimum custom body class
function minimum_add_body_class( $classes ) {
	$classes[] = 'minimum';
		return $classes;
}

//* Add widget support for homepage if widgets are being used
add_action( 'genesis_meta', 'minimum_front_page_genesis_meta' );
function minimum_front_page_genesis_meta() {

	if ( is_home() ) {

		//* Remove entry meta in entry footer and Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		
		//* Add Genesis grid loop
		add_action( 'genesis_loop', 'minimum_grid_loop_helper' );
		
		//* Remove entry footer functions
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
		
	}

	if ( is_main_site()  ) {

		//* Add Home featured Widget areas
		add_action( 'genesis_before_content_sidebar_wrap', 'minimum_home_top', 2);
		
	//* Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	}
}
		
//*Add homepage top area
function minimum_home_top() {

	printf( '<div %s>', genesis_attr( 'home-top' ) );
	genesis_structural_wrap( 'home-top' );

		genesis_widget_area( 'home-top', array(
			'before' => '<div class="home-top widget-area">',
			'after'	 => '</div>',
		) );

	genesis_structural_wrap( 'home-top', 'close' );
	echo '</div>'; //* end .home-top

}

//* Add markup for homepage  bottom widgets
function minimum_home_bottom() {

	printf( '<div %s>', genesis_attr( 'home-bottom' ) );
	genesis_structural_wrap( 'home-bottom' );

		genesis_widget_area( 'home-bottom', array(
			'before' => '<div class="home-bottom widget-area">',
			'after'	 => '</div>',
		) );

	genesis_structural_wrap( 'home-bottom', 'close' );
	echo '</div>'; //* end .home-bottom

}
add_action( 'genesis_after_loop', 'minimum_home_bottom', 10);

//* Genesis grid loop
function minimum_grid_loop_helper() {

	if ( is_active_sidebar( 'home-bottom' ) || is_main_site() ) {
		
	} else {

		add_action( 'genesis_loop', 'genesis_do_loop' );

	}

}

//* Run the Genesis loop
genesis();
