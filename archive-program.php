<?php
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
/** Replace the standard loop with our custom loop */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'my_custom_loop' );

//Remove read more
function wdc_no_more_jumping($post) {
     return '...';
}
add_filter('excerpt_more', 'wdc_no_more_jumping');

//Custom page title
function assignPageTitle(){
  return "Degrees and Programs | Academics | Southern Arkansas University";
}
add_filter('wp_title', 'assignPageTitle');

function alpha_bet($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'post', 'movie' ) );
    }
  }
}
add_action('pre_get_posts','alpha_bet');

/** Code for custom loop */
function my_custom_loop() {
?>
<h2>Academic Program Directory</h2>
<div class="row">
<div class="col-md-3 search">
<?php echo do_shortcode('[searchandfilter id="10100"]'); ?> 
</div><div id="results" class="col-md-9 results">  <div id="loading" style="display: none;"></div>
<div id="paginate"><?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?> </div>
<?php
  if(have_posts()) : while(have_posts()) : the_post(); ?>
  <div class="dp-wrap">

			<div class="dp-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
	<div class="dp-title"><h3><a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
		</a></h3></div>
<div class="college-department"><?php the_field('department_college');?></div>		
<div class="pills">
<?php
$terms = get_the_terms( $post->ID, 'types' );
if ($terms && ! is_wp_error($terms)): ?>
    <?php foreach($terms as $term): ?>
        <div class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></div>
    <?php endforeach; ?>
<?php endif; ?>
</div>	
     <div class="dp-excerpt">
		 <?php  the_excerpt(); ?>
		   </div>
 <?php  endwhile; else : ?>
 	<p><?php _e( 'Sorry, no degrees or programs matched your criteria. Try another keyword or perhaps filter by category or college/department.' ); ?></p>
 <?php endif; 
 echo '<div id="paginate" style="margin-top: 20px;">'; 
  if(function_exists('wp_paginate')) {
    wp_paginate(); }
 echo '</div></div></div>'; 
}
?> 
 <?php 
genesis();
