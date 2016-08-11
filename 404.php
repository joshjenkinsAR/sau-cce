<?php

//* Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove the site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );

//* Remove Minimum after header
remove_action( 'genesis_after_header', 'minimum_site_tagline' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

// Register style sheets
add_action( 'wp_enqueue_scripts', 'oops_register_styles' );
/**
 * Register style sheet.
 */
function oops_register_styles() {
	wp_register_style('oopsFonts', 'https://fonts.googleapis.com/css?family=Pacifico');
	 wp_enqueue_style( 'oopsFonts');
}


//* Remove site footer elements
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
/**
 * This function outputs a 404 "Not Found" error message
 *
 * @since 1.6
 */
function genesis_404() {
echo '<style>p.not-found-text { width: 800px; max-width: 100%; font-size: 20px; margin: 30px auto;} .not-found span { color: #003087;} h1.entry-title.not-found { font-size: 50px !important; text-align: center !important;  font-weight: 400 !important;  border: 0px;  width: auto;  margin-bottom: 50px;} img.not-found-image {    width: 600px; max-width: 100%; margin: 0 auto; display: block;}</style>'; 
	echo genesis_html5() ? '<article class="entry">' : '<div class="post hentry">';

		printf( '<h1 class="entry-title not-found">%s</h1>', __( 'We are <span>reining</span> in the problem...', 'genesis' ) );
		echo '<div class="entry-content">';

			if ( genesis_html5() ) :
				
				echo '<p class="not-found-text">You didn’t find what you were looking for this time, but be stubborn as a mule and saddle up in the search bar to locate the SAU webpage you seek.  We’re sure you’ll be braying in celebration when you land your virtual greener pasture.</p>';

			else :
	?>

			<img src="https://web.saumag.edu/files/2015/11/404pagelighter.png">
			
			<p class="not-found-text">You didn’t find what you were looking for this time, but be stubborn as a mule and saddle up in the search bar to locate the SAU webpage you seek.  We’re sure you’ll be braying in celebration when you land your virtual greener pasture.</p>

			<h4><?php _e( 'Pages:', 'genesis' ); ?></h4>
			<ul>
				<?php wp_list_pages( 'title_li=' ); ?>
			</ul>

			<h4><?php _e( 'Categories:', 'genesis' ); ?></h4>
			<ul>
				<?php wp_list_categories( 'sort_column=name&title_li=' ); ?>
			</ul>

			<h4><?php _e( 'Authors:', 'genesis' ); ?></h4>
			<ul>
				<?php wp_list_authors( 'exclude_admin=0&optioncount=1' ); ?>
			</ul>

			<h4><?php _e( 'Monthly:', 'genesis' ); ?></h4>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>

			<h4><?php _e( 'Recent Posts:', 'genesis' ); ?></h4>
			<ul>
				<?php wp_get_archives( 'type=postbypost&limit=100' ); ?>
			</ul>

<?php
			endif;
			?>
			<div style="width: 800px; max-width: 100%; margin: 0 auto; display: block;"><script>
  (function() {
    var cx = '013696501293641384261:ftpfsl2uctk';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
</div>
<?php 

			echo '</div>';

		echo genesis_html5() ? '</article>' : '</div>';

}

genesis();
