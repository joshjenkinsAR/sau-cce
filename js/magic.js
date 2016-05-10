	jQuery(function() {

    var $el, leftPos, newWidth,
        $mainNav = jQuery("#menu-main-menu");
    
    $mainNav.append("<li id='magic-line'></li>");
    var $magicLine = jQuery("#magic-line");
    
    $magicLine
        .width(jQuery(".current_page_item").width())
        .css("left", jQuery(".current_page_item a").position().left)
        .data("origLeft", $magicLine.position().left)
        .data("origWidth", $magicLine.width());
        
    jQuery("#menu-main-menu li a").hover(function() {
        $el = jQuery(this);
        leftPos = $el.position().left;
        newWidth = $el.parent().width();
        $magicLine.stop().animate({
            left: leftPos,
            width: newWidth
        });
    }, function() {
        $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            width: $magicLine.data("origWidth")
        });    
    });
});