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

//* Add program header
function sau_program_header() {
	$prog_title = get_the_title();
if (has_post_thumbnail( $post->ID ) ):
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'program-image', true);
$thumb_url = $thumb_url_array[0];
else:
    $image = array( '/images/featured.jpg' ); 
endif;
printf( '<div class="program-head"><div class="program-title"><span>%s</span></div><img src="%s" />', $prog_title, $thumb_url);
echo '</div>';
}
add_action('genesis_before_loop', 'sau_program_header');
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Pull in custom fields content
function sau_program_tabs() {
?>
	<div class="tabbable-panel">
				<div class="tabbable-line">
<ul class="nav nav-tabs" role="tablist" id="program-tab">
  <li role="presentation" class="active"><a href="#about" aria-controls="catalog" role="tab" data-toggle="tab"><i class="fa fa-info"></i>About</a></li>
  <?php if (get_field('Courses')) {
  echo '<li role="presentation"><a href="#courses" aria-controls="courses" role="tab" data-toggle="tab"><i class="fa fa-book"></i>Courses</a></li>';
  }; ?>
  <?php if (get_field('Catalog Entry') || get_field('minor_requirements')) {
  echo '<li role="presentation"><a href="#catalog" aria-controls="catalog" role="tab" data-toggle="tab"><i class="fa fa-folder-open"></i>Catalog</a></li>';
  }; ?>
  <?php if (get_field('Accreditations')) {
  echo '<li role="presentation"><a href="#accreditations" aria-controls="accreditations" role="tab" data-toggle="tab"><i class="fa fa-certificate"></i>Accreditation</a></li>';
  }; ?>
    <?php if (get_field('Advisors')) {
  echo '<li role="presentation"><a href="#advisors" aria-controls="advisors" role="tab" data-toggle="tab"><i class="fa fa-group"></i>Advisors</a></li>';
  }; ?>
  <?php if (get_field('Admission Requirements or Deadlines')) {
 echo '<li role="presentation"><a href="#requirements" aria-controls="requirements" role="tab" data-toggle="tab"><i class="fa fa-calendar"></i>Requirements</a></li>';
  }; ?>
   <?php if (get_field('Testimonials')) {
 echo '<li role="presentation"><a href="#testimonials" aria-controls="testimonials" role="tab" data-toggle="tab"><i class="fa fa-users"></i>Testimonials</a></li>';
  }; ?>
</ul>
</div>
</div>
<div class="tabbable-panel">
				<div class="tabbable-line tabs-below">
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade-in active " id="about"><div class="details"><table data-row-style="rowStyle" class="table table-condensed table-hover table-striped"><tbody><tr><td><span class="college-department">Department:</span></td><td><?php the_field('department_college');?></td></tr>
  <tr><td><span class="hours">Hours Required: </span></td><td><?php the_field('Number of Hours'); ?></td></tr>
  <tr><td><span class="type">Categories: </span></td><td><?php $types = get_the_term_list( $post->ID, 'types', '', ', ', '' );
$types = strip_tags ( $types );
echo $types;  ?></td></tr>
    <tr><td><span class="delivery">Delivery:</span></td><td><?php $terms = get_the_term_list( $post->ID, 'delivery', '',', ','' );
$terms = strip_tags ( $terms );
echo $terms; ?></td></tr></tbody></table>
  </div>  
  <?php the_content();?>
  <p style="display: none;"><?php the_field('keywords'); ?></p></div>
   <div role="tabpanel" class="tab-pane fade" id="courses"><p><?php the_field('Courses'); ?></p></div>
  <div role="tabpanel" class="tab-pane fade" id="catalog"><p><?php the_field('Catalog Entry'); ?></p><p><?php if (get_field('minor_requirements')) {
  echo '<h4>Minor Requirements:</h4>';
   the_field('minor_requirements');
  }; ?></p></div>
  <div role="tabpanel" class="tab-pane fade" id="accreditations"><?php the_field('Accreditations'); ?></div>
  <div role="tabpanel" class="tab-pane fade" id="advisors"><?php the_field('Advisors'); ?></div>
  <div role="tabpanel" class="tab-pane fade" id="requirements"><?php the_field('Admission Requirements or Deadlines'); ?></div>
 <div role="tabpanel" class="tab-pane fade" id="testimonials"><?php the_field('Testimonials'); ?></div>
</div>
</div>
</div>
<?php if (get_field('rankings')) { ?>
<div id="program-footer"><?php the_field('rankings'); ?></div>
<?php }; ?>
<script>
jQuery('#program-tab a').click(function (e) {
  e.preventDefault()
  jQuery(this).tab('show')
})
</script>
<?php
}
add_action('genesis_entry_content', 'sau_program_tabs', 10);

//Use custom sidebar
add_post_type_support( 'program', 'genesis-simple-sidebars' );
add_action('get_header','sau_programs_sidebar');
function sau_programs_sidebar() {
        remove_action( 'genesis_sidebar', 'ss_do_sidebar' ); //remove the default genesis sidebar
        add_action( 'genesis_sidebar', 'program_do_sidebar' ); //add an action hook to call the function for my custom sidebar
}
//Function to output my custom sidebar
function program_do_sidebar() {
	dynamic_sidebar( 'program' );
}

//Function to output program  bottom sidebar
function program_bottom_sidebar () {
dynamic_sidebar('program-bottom'); 
}
add_action( 'genesis_after_entry', 'program_bottom_sidebar', 11);

 endif;

//* Run the Genesis loop
genesis();
