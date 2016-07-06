<?php
/*
 WARNING: This file is part of the core Genesis framework. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Handles the footer structure.
 *
 * This file is a core Genesis file and should not be edited.
 *
 * @category Genesis
 * @package  Templates
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

genesis_structural_wrap( 'inner', '</div><!-- end .wrap -->' );
echo '</div></div><!-- end #inner -->';
?>
<?php
do_action( 'genesis_before_footer' );
do_action( 'genesis_footer' );
do_action( 'genesis_after_footer' );
?></div></div><!-- end #wrap -->
<div id="generalFooter">
<div class="wrap">
	<div class="homeFooter">
		<div class="one-fourth schools first"><h3>Schools & Colleges</h3>
			<ul>
				<li><a href="https://web.saumag.edu/business">Business</a></li>
				<li><a href="https://web.saumag.edu/education">Education</a></li>
				<li><a href="https://web.saumag.edu/lpa">Liberal & Performing Arts</a></li>
				<li><a href="https://web.saumag.edu/science">Science & Engineering</a></li>
				<li><a href="https://web.saumag.edu/honors">Honors College</a></li>
				<li><a href="https://web.saumag.edu/graduate">Graduate Studies</a></li>
			</ul>
		</div>
		<div class="one-fourth ilnks"><h3>Quick Links</h3>
			<ul>
				<li><a href="https://web.saumag.edu/academics/degrees/">Majors & Minors</a></li>
				<li><a href="https://web.saumag.edu/admissions/apply/scholarships/">Scholarships & Financial Aid</a></li>
				<li><a href="https://web.saumag.edu/bulletin">Mulerider Bulletin</a></li>
				<li><a href="https://mysau.saumag.edu/ICS/Course_Search/">Course Schedules</a></li>
				<li><a href="https://web.saumag.edu/registrar/transcripts/">Transcript Request</a></li>
				<li><a href="http://www.sau.bkstr.com/">Bookstore</a></li>
				<li><a href="https://web.saumag.edu/admissions/apply/transfer/">Transferring to SAU</a></li>
				<li><a href="https://web.saumag.edu/academics/finals/">Finals Schedule</a></li>
				<li><a href="https://web.saumag.edu/title-ix/">Title IX</a></li>
				<li><a href="https://www.getrave.com/login/saumag">Campus Emergency Alerts</a></li>
			</ul>
		</div>
		<div class="one-fourth social"><h3>Social</h3>
		<div class="social-icons">
<a href="https://www.facebook.com/SouthernArkansasUniversity"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/facebook_square_gray.png" alt="SAU on Facebook"></a>
<a href="https://twitter.com/muleriders"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/twitter_square_gray.png" alt="SAU on Twitter"></a>
<a href="https://www.youtube.com/user/saumag"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/youtube_square_gray.png" alt="SAU on YouTube"></a><br>
<a href="http://instagram.com/muleriderpics"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/instagram_square.png" alt="SAU on Instagram"></a>
<a href="https://www.flickr.com/photos/saumag/"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/flickr_square_gray.png" alt="SAU on Flickr"></a>
<a href="https://www.linkedin.com/edu/southern-arkansas-university-17757"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/linkedin_square_gray.png" alt="SAU on LinkedIn"></a><br>
<a href="http://saumag.meritpages.com/"><img src="https://web.saumag.edu/wp-content/themes/sau-cce/images/merit.png" alt="Share Your Achievements"></a>
</div>
</div>
			<div class="one-fourth about">
			<div class="foot-actions">
			<a href="https://web.saumag.edu/calendar"><i class="fa fa-calendar-o"></i>Calendar of Events</a>
			<a href="https://admin.saumag.edu/cc3/giving.html"><i class="fa fa-gift "></i>Make a Gift</a>
			<a href="https://web.saumag.edu/ask"><i class="fa fa-question-circle"></i>Ask a Question</a>
			<a href="http://photos.saumag.edu"><i class="fa fa-camera-retro"></i>Photos.SAUmag.edu</a>
			<a href="https://web.saumag.edu/apply"><i class="fa fa-check-square-o "></i>Apply Now</a>
			</div>
			</div>
	</div>
		<div class="homeFooter" style="text-align: center;">
		<div class="foot-logos">
			</div>
		<div class="foot-credits"><span class="vcard"><span class="org">Southern Arkansas University</span> is <a href="https://web.saumag.edu/about/accredited/">accredited</a> by <a href="http://www.ncahlc.org/">The Higher Learning Commission</a>. All Rights Reserved.</span>
	<div>
<span class="adr">
 <span class="street-address">100 E. University</span>,
  <span class="locality">Magnolia</span>,
  <span class="region">Arkansas</span>
  <span class="postal-code">71753-5000</span>
 </span>
 Telephone: <span class="tel">(870) 235-4000</span></div>
</div></div></div></div>
<a href="#" id="scrollToTop" alt="Back to Top"><label class="screen-reader" for="scrollToTop">Scroll to Top</label></a>
<?php
	wp_footer(); // we need this for plugins
	do_action( 'genesis_after' );
?>
</body>
</html>