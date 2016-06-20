<?php

/*
Template Name: Custom Landing
*/

//* Add landing body class to the head
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {

	$classes[] = 'landing';
	return $classes;

}

function flexible_content_menu_loop(){
	if( have_rows('blocks') ):
	
	echo '<div class="landing-menu wrap"><ul>';
		while ( have_rows('blocks') ) : the_row();
		
		if(get_sub_field('big_text_title')){
			$big_text_title = get_sub_field('big_text_title');
			echo '<li><a href="#' . $big_text_title .'" data-scroll="">' . $big_text_title .'</a></li>';
		}
		if(get_sub_field('video_title')){
			$video_title = get_sub_field('video_title');
			echo '<li><a href="#' . $video_title .'" data-scroll="">' . $video_title .'</a></li>';
		}
		
		
		if( $panel_menu_title ){
			echo '<li><a href="#' . $panel_menu_title . '" data-scroll="">' . $panel_menu_title .'</a></li>';
		}
		if(get_sub_field('photo_block_title')){
			$photo_block_title = get_sub_field('photo_block_title');
			echo '<li><a href="#' . $photo_block_title . '" data-scroll="">' . $photo_block_title .'</a></li>';
		}
		if(get_sub_field('visual_menu_title')){
			$visual_menu_title = get_sub_field('visual_menu_title');
			echo '<li><a href="#' . $visual_menu_title . '" data-scroll="">' . $visual_menu_title .'</a></li>';
		}
		break;
		endwhile;
		echo '<li class="apply fadeInRight" data-wow-delay="1s"><a href="/admissions/apply">Apply</a></li></ul></div>';
		endif;
	
}

//* Pull in flexible content from ACF
function flexible_content_sau(){
	// check if the flexible content field has rows of data
	if( have_rows('blocks') ): 
	echo '<div class="blocks">';
     // loop through the rows of data
		while ( have_rows('blocks') ) : the_row();

			if( get_row_layout() == 'title_block' ){
				$video = get_sub_field('video_background');
				$background = get_sub_field('background_image');
				
				echo '<div class="title-block">';
				echo '<div class="title-block-background" style="background: url('. $background .') no-repeat;">';
				echo '<div class="title-block-video"><div class="fullscreen-bg">';
				
				if(get_sub_field('video_background')){
					echo '<video loop muted autoplay poster="' . $background . '" class="fullscreen-bg__video">';
					echo '<source src="' . $video . '" type="video/mp4"></video>';
					}
				echo '<div class="padder wow fadeInUp" data-wow-delay=".5s"><div class="title-block-title">' . get_sub_field('text_title') . '</div></div>';
				echo '</div></div></div></div>';
				$menu_option = get_sub_field('display_a_menu_after_the_title');
			if ( $menu_option=true) {
			//			flexible_content_menu_loop();
					}
			}
				
			
			if( get_row_layout() == 'big_text_block' ){ 
				$big_text_background = get_sub_field('big_text_background');
				$big_text_title = get_sub_field('big_text_title');
			    echo '<div id="' . $big_text_title . '" class="big-text-block" background="url(' . $big_text_background .')"><div class="big-text-wrap wow fadeInUp" data-wow-delay=".75s">';
				the_sub_field('big_text');
				echo '</div></div>';
			}
			
			if( get_row_layout() == 'video_block' ){ 
			$video_title = get_sub_field('video_title');
				if (get_sub_field('video_url')) {
					the_sub_field('video_url');
				}
				else {
					the_sub_field('youtube_url');
				}
			}
			
		
			if( get_row_layout() == 'slide_text_panels' ){
				$panel_title = get_sub_field('panel-title');
				$panel_menu_title = get_sub_field('panel_menu_title');
				if( have_rows('panel') ){

			 	echo '<div id="' . $panel_menu_title . '" class="slide-text-panels"><div class="bg"><div class="slide-text-title wow fadeInUp" data-wow-delay=".5s">' . $panel_title . '</div><div id="owl" class="wow fadeInUp">';

			 	// loop through the rows of data
			    while ( have_rows('panel') ) : the_row();

					$panel_text = get_sub_field('panel_text');

					echo '<div class="item"><div class="content wrap">' . $panel_text . '</div></div>';

				endwhile;

				echo '</div></div></div>';
				}

			}
			
			if( get_row_layout() == 'photo_with_quote_caption' ){
				$photo_block_title = get_sub_field('photo_block_title');
				echo '<div class="photo-quote"><div class="bg"><div class="photo"><img alt="SAU is a modern, affordable university in the heart of Southern Arkansas" src="';
				the_sub_field('photo_block_image');
				echo '" />'; 
				if (get_sub_field('photo_text_overlay')) {
					echo '<div class="photo-overlay wow fadeInUp" data-wow-delay=".5s">';
					the_sub_field('photo_text_overlay');
					echo '</div>';
				}
				echo '</div>';
				if (get_sub_field('photo_caption')) {
					echo '<div class="quote"><span class="quotation-marks"><i class="fa fa-quote-left"></i></span>';
					the_sub_field('photo_caption');
					echo '</div>'; 
				}
				echo '</div></div>';

			}
			
			if( get_row_layout() == 'full_width_photo' ){
				$full_photo_title = get_sub_field('full_photo_title');
				echo '<div id="full-photo-slider"><div id ="owl-slide">'; 
				if( have_rows('photos') ){
					 while ( have_rows('photos') ) : the_row();
				echo '<div class="photo full item"><img alt="SAU is a modern, affordable university in the heart of Southern Arkansas" src="';
				the_sub_field('full_photo_image');
				echo '" />'; 
				if (get_sub_field('full_photo_overlay')) {
					echo '<div class="photo-overlay wow fadeInUp" data-wow-delay=".5s">';
					the_sub_field('full_photo_overlay');
					echo '</div>';
				}
				echo '</div>';
				endwhile;
				}
				echo '</div></div>';
			}
			
			if( get_row_layout() == 'visual_editor' ){ 
			$visual_menu_title = get_sub_field('visual_menu_title');
			echo '<div id="' . $visual_menu_title . '" class="program-details"><div class="wrap">';
					the_sub_field('visual_content');
			echo '</div></div>';
			}
			
			if( get_row_layout() == 'plain_text' ){ 
			    echo '<div class="plain-text">';
				the_sub_field('plain_text_field');
				echo '</div>';
			}
			
			if( get_row_layout() == 'action_buttons' ){ 
			echo '<div id="actions"><ul>';
				$apply = get_sub_field('apply_button');
				$search = get_sub_field('search_button');
				$contact = get_sub_field('contact_button');
				if($apply=true) {
					echo '<li><a href="/apply"><img src="https://web.saumag.edu/files/2016/03/1456438732_check-circle-outline.png" alt="Apply" />Apply</a></li>';
				}
				if($search=true) {
					echo '<li><a href="/academics/degrees "><img src="https://web.saumag.edu/files/2016/03/1456438770_search.png" alt="Search Degree Programs" />Search Programs</a></li>';
				}
				if($contact=true) {
					$contact_link = get_sub_field('contact_link');
					echo '<li><a href="' . $contact_link .'"><img src="https://web.saumag.edu/files/2016/03/1456439777_send.png" alt="Contact" />Contact</a></li>';
				}
				
			echo '</ul></div>';
			}
 
    endwhile;
echo '</div>';
endif;

}
add_action( 'genesis_entry_content', 'flexible_content_sau', 1);

function custom_landing_scripts() {
	wp_enqueue_script( 'wow-js', 'https://web.saumag.edu/wp-content/themes/sau-cce/js/wow.min.js', array( 'jquery' ), true);
	wp_enqueue_script( 'shuffle-js', 'https://web.saumag.edu/wp-content/themes/sau-cce/js/shuffle.js', array( 'jquery' ), true);
	wp_enqueue_script( 'smooth-scroll', 'https://web.saumag.edu/wp-content/themes/sau-cce/js/smooth-scroll.min.js', array( 'jquery' ), true);
	wp_enqueue_script( 'owl-js', 'https://web.saumag.edu/wp-content/themes/sau-cce/js/owl.js', array( 'jquery' ), true);
	//wp_enqueue_script( 'landing-js', 'https://web.saumag.edu/wp-content/themes/sau-cce/landing/landing-script.js', array( 'jquery, shuffle-js' ), true);
	wp_register_style('animate-css', 'https://web.saumag.edu/wp-content/themes/sau-cce/css/animate.css');
	wp_enqueue_style( 'animate-css' );
	wp_register_style('slick-css', 'https://web.saumag.edu/wp-content/themes/sau-cce/css/slick.css');
	wp_enqueue_style( 'slick-css' );
	wp_register_style('landing-style', 'https://web.saumag.edu/wp-content/themes/sau-cce/landing/landing-styles.css');
	wp_enqueue_style( 'landing-style' );
}
add_action( 'wp_enqueue_scripts', 'custom_landing_scripts');



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
