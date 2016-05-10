<?php

do_action( 'genesis_doctype' ); ?>
<?php
do_action( 'genesis_meta' );

wp_head(); /** we need this for plugins **/
?>
<!--[if IE]>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:500|Roboto+Slab:400' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto+Slab:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:700|Roboto+Slab:700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/sau-cce/ie9.css">
<![endif]-->
<!--[if lt IE 9]>
<script src='https://www.drew.edu/wp-content/themes/Drew-v8-r/scripts/respond.min.js'></script>
	<link rel="stylesheet" type="text/css" href="/wp-content/themes/sau-cce/ie8.css">
<![endif]-->
</head>
<body <?php body_class(); ?>>
<?php 

    // declare $post global if used outside of the loop
    global $post;  
        // the fallback – our current active theme's default bg image
        $page_bg_image_url = get_background_image();

    // And below, spit out the <style> tag... ?>
    <div id="backstretch" style="background: url('<?php echo $page_bg_image_url; ?>') no-repeat; background-size: cover;"></div> 
<div id="sticky-container">
<div id="the-top" class="full-thetop">
		<div class="header-bar"></div>
		<div id="other-header" class="wrap">
			<div id ="site-logo"><a href="//web.saumag.edu"><img class="big" src="https://web-southernarkansas.netdna-ssl.com/wp-content/themes/sau-cce/images/web-logo.png" alt="Southern Arkansas University Logo" /></a></div>
			<h1 style="display: none;">Southern Arkansas University - the most affordable, fastest growing university in Arkansas</h1>
			<div id="search" class="big">
				<form id="searchbox_013696501293641384261:ftpfsl2uctk" action="//web.saumag.edu/search/" class="search-form" role="search">
				<input type="search" name="q" size="40" id="gcsinput" placeholder="Search …" aria-label="Search" label="search"/>
				<input type="hidden" name="cx" value="013696501293641384261:ftpfsl2uctk" />
				<input type="hidden" name="cof" value="FORID:11" />
				<input type="submit" name="sa" value="Submit" id="gscsubmit" aria-label="Submit" label="Submit"/>
				</form>
			</div>
			<div id="header-links">
			<!----- <div class="header-social">
						<a href="https://www.facebook.com/SouthernArkansasUniversity" ><i class="fa fa-facebook-square"></i></a>
				<a href="https://twitter.com/muleriders"><i class="fa fa-twitter-square"></i></a>
				<a href="http://instagram.com/muleriderpics" ><i class="fa fa-instagram"></i></a>
					</div> ---->
			<ul id="links-menu">
			<li class="links-toggle">Quick Links <i class="fa fa-bars"></i>
				<ul class="hidden-links">    
					<li><a href="/calendar">Calendar</a></li>
					<li><a href="/directory">Directory</a></li>
					<li><a href="https://mysau.saumag.edu">mySAU</a></li>
					<li>Email: <a href="http://www.outlook.com/muleriders.saumag.edu">Student</a>|<a href="http://www.saumag.edu/exchange">Faculty</a></li>
					<li><a href="http://blackboard.saumag.edu">Blackboard</a></li>
                    <li><a href="https://wamp.saumag.edu/sys_status/status.php">Systems Status</a></li>
					<li style="border: none;"><a href="/library">Library</a></li>
				</ul></li>
			<li class="head-give"><a href="https://admin.saumag.edu/cc3/giving.html" target="_blank"><i class="fa fa-gift"></i> Give</a></li>
			<li class="head-give"><a href="https://web.saumag.edu/admissions/campus-tours/"><i class="fa fa-map-marker"></i> Tour</a></li>
			<li class="head-give"><a href="https://web.saumag.edu/admissions/apply/"><i class="fa fa-check-square-o"></i> Apply</a></li>
			</ul>
					
			</div>
		</div>

</div><div id="navigation"><?php
do_action( 'genesis_before' );
switch_to_blog(1);  
do_action( 'genesis_before_header' );
restore_current_blog();
do_action( 'genesis_header' ); ?>
</div>
</div>
	<?php do_action('genesis_site_title'); ?>
<?php do_action( 'genesis_after_header' );  ?>
<div class="body">
<div class="contents wrap">
<div id="main-content-wrap"> 
<?php 
genesis_structural_wrap( 'inner' );


