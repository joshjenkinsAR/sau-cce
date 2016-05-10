<?php
/**
 * Template Name: Contact Shortcode
 * Description: Custom page template for directory
 */
//function my_shortcode_to_a_post( $content ) {
//  global $post;
//  if( ! $post instanceof WP_Post ) return $content;

  //switch( $post->post_type ) {
	//case 'contact':
      //return $content . = echo do_shortcode('[gform_update_post_edit_link] [gravityform id="7" title="true" description="true" update require_link]');	
    //default:
      //return $content;
  //}
//}
//echo apply_filters('the_content',get_the_content('Continue reading <span class="meta-nav">→</span>'));
//add_filter( 'the_content', 'my_shortcode_to_a_post' );
function my_shortcode_to_a_post ( $content ) {
	if (body.hasClass('single-contact')) {
		echo do_shortcode('[gform_update_post_edit_link] [gravityform id="7" title="true" description="true" update require_link]');
	}
}
add_filter( 'the_content', 'my_shortcode_to_a_post' );
?>