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

jQuery(function( $ ){

	$(".nav-secondary .genesis-nav-menu, .nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon">');

	$(".responsive-menu-icon").click(function(){
		$(this).next(".nav-secondary .genesis-nav-menu, .nav-primary .genesis-nav-menu").slideToggle();
		$("#the-top #search").hide();
	});

	$(window).resize(function(){
		if(window.innerWidth > 768) {
			$(".nav-secondary .genesis-nav-menu, nav .sub-menu, .nav-primary .genesis-nav-menu").removeAttr("style");
			$(".responsive-menu > .menu-item").removeClass("menu-open");
		}
	});

	$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});

jQuery(function( $ ){

	$("#the-top #search").addClass("responsive-search").before('<div class="responsive-search-icon">');

	$(".responsive-search-icon").click(function(){
		$(this).next("#the-top #search").fadeToggle();
		$(".nav-primary .genesis-nav-menu").hide();
		
		
	});

	 $(window).resize(function(){
		if(window.innerWidth > 768) {
			$("#the-top #search").removeAttr("style");
		}
	}); 

	/***$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});****/

});