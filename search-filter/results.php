<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2014 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{
	?>
	 <div id="loading" style="display: none;"></div>
	<div class="pagination">
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
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
   </div>
		<?php
	}
	?>

	<div class="pagination">
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	echo "No Results Found";
}
?>