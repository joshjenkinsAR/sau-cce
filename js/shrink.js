jQuery(window).scroll(function() { 
                 var scroll = jQuery(window).scrollTop(); 
                 if (scroll >= 100) { 
                 jQuery("body").addClass("shrink");
				 jQuery("#the-top").addClass("shrink-thetop");
				 jQuery(".big").addClass("shrink");
				 } 
                 if (scroll <= 100) { 
				 jQuery("body").removeClass("shrink"); 
				 jQuery("#the-top").removeClass("shrink-thetop");
				 jQuery(".big").removeClass("shrink");
				 
                 } }); 
				 

jQuery(document).ready(function() {
jQuery('li.links-toggle').hover(function () {
	    jQuery(this).find('ul.hidden-links').stop(true, false).slideToggle();
	});
});