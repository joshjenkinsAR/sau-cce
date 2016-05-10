<?php
/**
 * The custom featured single post template
 */

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Register featured stylesheet
function featured_scripts() {
	wp_enqueue_style( 'featured-styles', '/wp-content/themes/sau-cce/featured.css' );
}
add_action( 'wp_enqueue_scripts', 'featured_scripts' );

//* Move post title up in the header image
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action( 'genesis_after_header', 'genesis_do_post_title', 1 );

//* Remove the entry meta in the entry header
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

//* Remove the author box on single posts
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

//* Remove the entry meta in the entry footer
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

//* Remove the comments template
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );

//* Create header image
function header_overlay() {
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$overlayhtml = '
	<div id="header-overlay">
		<div class="header-background" style="background: url('. $url .') no-repeat; background-size: cover;">
		</div>
		</div>';
		
	if ( is_single() && has_post_thumbnail() ) {
		echo $overlayhtml;
	}
	else {
		echo <<<HTML
		<html>
		<div id="header-overlay">
		<div class="header-background" style="background: url(https://web.saumag.edu/social/files/2015/07/photo-1416339684178-3a239570f315.jpg) no-repeat; background-size: cover;">
		</div>
		</div>
		</html>
HTML;
		}
}
add_action ('genesis_after_header', 'header_overlay', 1);

//* Run the Genesis loop
genesis();