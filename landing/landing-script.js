jQuery(window).scroll(function() { 
                 var scroll = jQuery(window).scrollTop(); 
                 if (scroll >= 630) { 
                 jQuery(".landing-menu").addClass("sticky");
				 } 
                 if (scroll <= 630) { 
				 jQuery(".landing-menu").removeClass("sticky"); 
                 } }); 	
	
	jQuery(document).ready(function() {
 
  jQuery("#owl").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
autoPlay: true,
responsive: true,
      singleItem:true,
	   arrows: false,
  fade: true,
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
  
  
 

smoothScroll.init();
new WOW().init();