<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'sau-cce', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'sau-cce' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'SAU-CCE', 'sau-cce' ) );
define( 'CHILD_THEME_URL', 'https://web.saumag.edu' );
define( 'CHILD_THEME_VERSION', '3.0' );

//* Add HTML5 markup structure
add_theme_support( 'html5' );


/**
 * HTML5 DOCTYPE
 * removes the default Genesis doctype, adds new html5 doctype with IE8 detection
*/

function mb_html5_doctype() {
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="lt-ie9" <?php language_attributes( 'html' ); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes( 'html' ); ?>> <!--<![endif]-->
<?php
}
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'mb_html5_doctype' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enqueue scripts
add_action( 'wp_enqueue_scripts', 'sau_enqueue_scripts' );
function sau_enqueue_scripts() {
wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'reponsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), true);
   wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() .'/js/bootstrap.min.js', array( 'jquery' ), true);
	wp_enqueue_script('sau-smooth-scroll', get_stylesheet_directory_uri() .'/js/smooth-scroll.js', array('jquery'), true );
	wp_enqueue_script('shrink', get_stylesheet_directory_uri() . '/js/shrink.js', true );	
	wp_enqueue_script('countup', get_stylesheet_directory_uri() .'/js/countUp.min.js', true );	
	wp_enqueue_script('waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js', true );
}

// Register style sheets
add_action( 'wp_enqueue_scripts', 'sau_register_styles' );
/**
 * Register style sheet.
 */
function sau_register_styles() {
	wp_register_style( 'minimum-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );
	wp_register_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
	wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,800|Roboto+Slab:400,300,700');
	wp_enqueue_style( 'minimum-font-awesome' );
	wp_register_style('printstyles', get_stylesheet_directory_uri() . '/print.css');
	wp_enqueue_style( 'printstyles' );
	wp_enqueue_style( 'bootstrap' );
	 wp_enqueue_style( 'googleFonts');
}

remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
    ?>
	<head>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="theme-color" content="#003087">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}


//* Add new image sizes
add_image_size( 'portfolio', 540, 340, TRUE );
add_image_size( 'tile', 320, 200, TRUE );

//* Add support for custom background
add_theme_support( 'custom-background', array( 'wp-head-callback' => '__return_false', 'default-image' => '/wp-content/themes/sau-cce/images/front-science-small.jpg'  ) );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 582,
	'height'          => 127,
	'header-selector' => '.site-title',
	'header-text'     => false
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'site-tagline',
	'nav',
	'subnav',
	'home-featured',
	'site-inner',
	'footer-widgets',
	'footer'
) );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar 
unregister_sidebar( 'sidebar-alt' );

// Replace h3 with h2 for all widget titles
add_filter( 'genesis_register_sidebar_defaults', 'custom_register_sidebar_defaults' );
function custom_register_sidebar_defaults( $defaults ) {
	$defaults['before_title'] = '<h2 class="widget-title widgettitle">';
	$defaults['after_title'] = '</h2>';
	return $defaults;
}

//* Remove site description and footer credits
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
 remove_action('genesis_footer', 'genesis_do_footer');
 remove_action('genesis_footer', 'genesis_footer_markup_open', 5);
 remove_action('genesis_footer', 'genesis_footer_markup_close', 15);
 
 //* Hide author post info, category, etc
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

//* Reposition the Mobile Nav menu to primary nav
function modify_nav_menu_args ( $args ) {
	switch_to_blog(1);
      wp_nav_menu( $args );   
       return $args; 
	   restore_current_blog();
}

/**
 * Filter Genesis H1 Post Titles to add <span> for styling
 * 
 */	
add_filter( 'genesis_post_title_output', 'ac_post_title_output', 15 );
 
function ac_post_title_output( $title ) {
 
	if ( is_singular() )
		$title = sprintf( '<h1 class="entry-title"><span>%s</span></h1>', apply_filters( 'genesis_post_title_text', get_the_title() ) );
 
	return $title;
}



/************* THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<div>' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
}
return $content;
}
 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');
*************/

//* Modify Read More text
 //Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '... <a class="more-link" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//* Change the number of portfolio items to be displayed (props Bill Erickson)
add_action( 'pre_get_posts', 'minimum_portfolio_items' );
function minimum_portfolio_items( $query ) {

	if ( $query->is_main_query() && !is_admin() && is_post_type_archive( 'portfolio' ) ) {
		$query->set( 'posts_per_page', '6' );
	}

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-top',
	'name'        => __( 'Home Top', 'minimum' ),
	'description' => __( 'This is the home top section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-bottom',
	'name'        => __( 'Home Bottom', 'minimum' ),
	'description' => __( 'This is the home bottom section.', 'minimum' ),
) );

//*Remove sitewide universal header
remove_action('genesis_before', 'universal_header');

/** Remove Genesis Header, Title & Description */
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
remove_action( 'genesis_header', 'genesis_do_header' );


/**** 
*  Use the custom post template if the post is in featured-layout category
****/
function get_custom_cat_template($single_template) {
     global $post;
 
       if ( in_category( 'featured-layout' )) {
          $single_template = dirname( __FILE__ ) . '/single-featured.php';
     }
     return $single_template;
}
 
add_filter( "single_template", "get_custom_cat_template" ) ;


/**
* Entries Left Shortcode
* http://gravitywiz.com/2012/09/19/shortcode-display-number-of-entries-left/
*/
add_filter( 'gform_shortcode_entries_left', 'gwiz_entries_left_shortcode', 10, 2 );
function gwiz_entries_left_shortcode( $output, $atts ) {
    
    extract( shortcode_atts( array(
        'id' => false,
        'format' => false // should be 'comma', 'decimal'
    ), $atts ) );
 
    if( ! $id )
        return '';
    
    $form = RGFormsModel::get_form_meta( $id );
    if( ! rgar( $form, 'limitEntries' ) || ! rgar( $form, 'limitEntriesCount' ) )
        return '';
        
    $entry_count = RGFormsModel::get_lead_count( $form['id'], '', null, null, null, null, 'active' );
    $entries_left = rgar( $form, 'limitEntriesCount' ) - $entry_count;
    $output = $entries_left;
    
    if( $format ) {
        $format = $format == 'decimal' ? '.' : ',';
        $output = number_format( $entries_left, 0, false, $format );
    }
    
    return $entries_left > 0 ? $output : 0;
}


/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

/**** Fix p tags in ACF WYSIWYG field ****/
function advisors_without_filters( $advisors=null ) {
    add_filter('acf_the_content', 'wpautop');
    if( $advisors ) {
      the_field( $advisors);
    } else {
      the_field();
    }
    remove_filter('acf_the_content', 'wpautop');
}

function contact_without_filters( $Program_Contact_Info=null ) {
    add_filter('acf_the_content', 'wpautop');
    if( $Program_Contact_Info ) {
      the_field( $Program_Contact_Info );
    } else {
      the_field();
    }
    remove_filter('acf_the_content', 'wpautop');
}

/**** Hide admin bar for subscribers ****/
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

/*** Login Shortcode ****/
add_action( 'init', 'my_add_shortcodes' );

function my_add_shortcodes() {

	add_shortcode( 'sau-login-form', 'sau_login_form_shortcode' );
}

function sau_login_form_shortcode() {

	if ( is_user_logged_in() )
		return '';

	return wp_login_form( array( 'echo' => false ) );
}

//* Read more ellipse for shared content excerpt
add_filter( 'post-content-shortcodes-read-more', 'add_ellipsis_to_pcs_excerpt' );
function add_ellipsis_to_pcs_excerpt( $readmore ) {
    return '&hellip; ' . $readmore;
}

/*** Custom Social Links Theme Setting ***/
add_action( 'genesis_settings_sanitizer_init', 'my_genesis_settings_sanitizer_init' );
add_action( 'genesis_theme_settings_metaboxes', 'my_genesis_theme_settings_metaboxes' ); 

function my_genesis_settings_sanitizer_init() {
  genesis_add_option_filter(
    'no_html', 
    GENESIS_SETTINGS_FIELD, 
    array( 
      'department_facebook',
	  'department_twitter',
	  'department_instagram',
	  'department_pinterest'
    )
  );
}
function my_genesis_theme_settings_metaboxes( $pagehook ) {
  add_meta_box( 
    'custom-settings',
    'Social Links', 
    'my_custom_settings', 
    $pagehook, 
    'main', 
    'high' 
  );
}
 
function my_custom_settings() {
  ?>
 
  <p>
    <?php _e( 'Facebook Link:', 'my_domain' );?><br />
    <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[department_facebook]" value="<?php echo esc_attr( genesis_get_option( 'department_facebook' ) ); ?>" size="50" />
  </p>
 
  <p>
    <?php _e( 'Twitter Link:', 'my_domain' );?><br />
    <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[department_twitter]" value="<?php echo esc_attr( genesis_get_option( 'department_twitter' ) ); ?>" size="50" />
  </p>
 
  <p>
    <?php _e( 'Instagram Link:', 'my_domain' );?><br />
    <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[department_instagram]" value="<?php echo esc_attr( genesis_get_option( 'department_instagram' ) ); ?>" size="50" />
  </p>
 
  <p>
    <?php _e( 'Pinterest Link:', 'my_domain' );?><br />
    <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[department_pinterest]" value="<?php echo esc_attr( genesis_get_option( 'department_pinterest' ) ); ?>" size="50" />
  </p>
 
  <?php
}
//Display it on the front end
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
function custom_site_title() { 
     echo '<p class="site-title" itemprop="headline"><a class="text-title" href="'.get_bloginfo('url').'">' .get_bloginfo('name') .'</a>';
	  $grab_facebook = genesis_get_option( 'department_facebook' );
	 if ( !empty ( $grab_facebook ) ) {
	 echo  '<a class="social_stuff facebook" href=" ' . $grab_facebook . ' " alt="Visit us on Facebook" target="_blank"><i class="fa fa-facebook"></i></a>'; 
	 }
	  $grab_twitter = genesis_get_option( 'department_twitter' );
	 if ( !empty ( $grab_twitter ) ) {
	 echo  '<a class="social_stuff twitter" href=" ' . $grab_twitter . ' " alt="Visit us on Facebook" target="_blank"><i class="fa fa-twitter"></i></a>'; 
	 }
	 echo '</p>'; 
}
add_action( 'genesis_site_title', 'custom_site_title' );

//4.4 Depreciation of wp_title fix 

add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}

/**
* Filter the document title before it is generated.
*
* Passing a non-empty value will short-circuit wp_get_document_title(),
* returning that value instead.
*
*/
add_filter('pre_get_document_title', 'sau_pre_get_document_title', 10);
add_filter('wpseo_title', 'sau_pre_get_document_title', 15);
function sau_pre_get_document_title(){
	// Make sure we're running multisite
	if( is_multisite() ) {
	global $blog_id;
	global $post;
	$archive_title = get_the_archive_title();
	$blog_title = get_bloginfo();
	$page_title = get_the_title($post->ID);
	$sep = ' | '; 
	$global_details = get_blog_details( 1 );
	$global_title = $global_details->blogname;
	$tagline = 'Modern, Affordable, Competitive';
	if ( ($blog_id == 1) ) {
		if (is_home()) {
			$title = "$global_title $sep $tagline";
			return $title;
		}
		else {
			$title = "$page_title $sep $global_title";
			return $title;
		}
	}
if ( ($blog_id != 1) && ( is_home()) || (is_front_page() ) ) {
	$title = "$blog_title $sep $global_title";
	return $title;
	} // end if
if ( is_archive() ) {
	$title = "$archive_title $sep $blog_title $sep $global_title";
	return $title;
	} // end if
if ( ($blog_id != 1) && ( !is_home()) && (!is_front_page() ) ) {
	$title = "$page_title $sep $blog_title $sep $global_title";
	return $title;
	} // end if
	
else {
	return $title;
}
	} // end multisite if
}

/*** 
* Remove pingback and comments feed links from head
***/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

remove_action( 'wp_head', 'feed_links', 2 );
add_action('wp_head', 'addBackPostFeed', 1);
function addBackPostFeed() {
    echo '<link rel="alternate" type="application/rss+xml" title="RSS 2.0 Feed" href="'.get_bloginfo('rss2_url').'" />';
}

/****
** Force full width shortcode
****/
function ffw_script(){
	wp_register_script( 'force-full-width-shortcode-script','/wp-content/themes/sau-cce/js/force-full-width-shortcode.js' , array( 'jquery') );
}
add_action( 'wp_enqueue_scripts', 'ffw_script' );

// adding shortcodes functions
function ffw_shortcode( $atts, $content = null ) {
	wp_enqueue_script( 'force-full-width-shortcode-script' );
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
	return '<div class="force-full-width">' . $content . '</div>';
}
add_shortcode( 'full-width', 'ffw_shortcode' );

/*** 
* filter the dave live search results to pull from different blog
***/
function fix_dave_links( $wpQueryResults, $deprecated, $davesWordPressLiveSearchResults ) {

	// Add post object to prevent PHP warnings
	$post = new stdClass();

	// Loop through all the search results
	foreach ( $wpQueryResults as $result ) {
		if( is_multisite() ) {
		switch_to_blog('33');
		$post->permalink = get_permalink( $post->ID );
		}
	}

	return $wpQueryResults;

}

add_filter( 'dwls_alter_results', 'fix_dave_links', 10, 3 );