<?php
/**
 * Template Name: Social Media Features
 * Description: Custom page template for social
 */
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop
function custom_do_grid_loop() {  
  	
	// Intro Text (from page content)
	echo '<div class="page hentry entry">';
	echo '<h1 class="entry-title">'. get_the_title() .'</h1>';
	echo '<div class="entry-content">' . get_the_content() ;
	$args = array(
		'category_name' => 'social-media',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page'=> '12',  // overrides posts per page in theme settings
	);
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ):
		echo '<div class="row">';		
		while( $loop->have_posts() ): $loop->the_post(); global $post;

		echo '<div class="item">';
		echo '<div class="well">';
		echo '<article id="social-features">';
		echo '<h3 id="social-post-title">';
		the_title();
		echo '</h3>';
		echo '<div id="blog-post-categories">';
		?>
		<?php
$terms = get_the_terms( $post->ID, 'category' );
if ($terms && ! is_wp_error($terms)): ?>
    <?php foreach($terms as $term): ?>
        <a href="<?php echo get_term_link( $term->slug, 'category'); ?>" rel="tag" class="hvr-ripple-out"><?php echo $term->name; ?></a>
    <?php endforeach; ?>
<?php endif; ?>
		<?php
		echo '</div>';
		echo '<div id="social-image">';
		the_post_thumbnail('social');
		echo '</div>';
		echo '<div id="social-post-content">';
		the_content();
		echo '</div>';
		echo '</article>';
		echo '</div>';
		echo '</div>';
		
		endwhile;
		echo '</div>';
	endif;
	
}
	
/** Remove Post Info */
remove_action('genesis_before_post_content','genesis_post_info');
remove_action('genesis_after_post_content','genesis_post_meta');
 
genesis();