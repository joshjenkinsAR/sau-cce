<?php
/**
 * The custom portfolio post type single post template
 */
 if($post->post_content=="") : 
echo 'empty';
else :

//* Remove stuff
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );
remove_action('genesis_entry_content','genesis_do_post_content');
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add res-hall header
function res_hall_left() {
	$res_hall_title = get_the_title();

if (has_post_thumbnail( $post->ID ) ):
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'res-hall-image', true);
$thumb_url = $thumb_url_array[0];


else:
    $image = array( '/images/featured.jpg' ); 
endif;
$second = get_field('second_image');
$second_med = $second['sizes']['medium']; 
$third = get_field('third_image');
$third_med = $third['sizes']['medium']; 
$fourth = get_field('fourth_image');
$fourth_med = $fourth['sizes']['medium']; 

echo '<div class="hall-wrap row"><div class="hall-left col-md-8"><div class="row">';
printf( '<div class="res-hall-head col-md-9" style="background: url(%s);"><div class="res-hall-title"><span>%s</span></div></div>', $thumb_url, $res_hall_title);
?> 
<div class="col-md-3 hall-thumbs">
<a href="<?php echo $second['url'];?>"><img src="<?php echo $second_med; ?>" /></a>
<a href="<?php echo $third['url'];?>"><img src="<?php echo $third_med; ?>" /></a>
<a href="<?php echo $fourth['url'];?>"><img src="<?php echo $fourth_med; ?>" /></a>
</div>
</div>
<!--- other hall-left stuff --->
<div class="amenities">
<?php

// vars	
$amenities = get_field('amenities_copy');


// check
if( $amenities ): ?>
<ul>
	<?php foreach( $amenities as $amenity ): ?>
		<li><i class="fa fa-<?php echo $amenity['value']; ?>"></i><?php echo $amenity['label']; ?></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
</div>
</div>
<?php
}
add_action('genesis_entry_content', 'res_hall_left');
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Pull in custom fields content
function res_hall_right() {
?>
<div class="hall-right col-md-4">
<div class="description"><h2 class="widget-title">About</h2>
<?php 
$thecontent = get_the_content();
if(!empty($thecontent)) {
	echo $thecontent;
} ?>
</div>
</div>
</div>

<?php
}
add_action('genesis_entry_content', 'res_hall_right', 10);

 endif;

//* Run the Genesis loop
genesis();
