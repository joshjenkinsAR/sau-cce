var thetop = (function() {
 
    var docElem = document.documentElement,
        header = document.querySelector( '.full-thetop' ),
        didScroll = false,
        changeHeaderOn = 100;
 
    function init() {
        window.addEventListener( 'scroll', function( event ) {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( scrollPage, 20 );
            }
        }, false );
    }
 
    function scrollPage() {
        var sy = scrollY();
        if ( sy >= changeHeaderOn ) {
            classie.add( header, 'shrink-thetop' );
        }
        else {
            classie.remove( header, 'shrink-thetop' );
        }
        didScroll = false;
    }
 
    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }
 
    init();
 
})();

var thetop = (function() {
 
    var docElem = document.documentElement,
        header = document.querySelector( 'body' ),
        didScroll = false,
        changeHeaderOn = 100;
 
    function init() {
        window.addEventListener( 'scroll', function( event ) {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( scrollPage, 50 );
            }
        }, false );
    }
 
    function scrollPage() {
        var sy = scrollY();
        if ( sy >= changeHeaderOn ) {
            classie.add( header, 'shrink' );
        }
        else {
            classie.remove( header, 'shrink' );
        }
        didScroll = false;
    }
 
    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }
 
    init();
 
})();

var thetop = (function() {
 
    var docElem = document.documentElement,
        header = document.querySelector( '.big' ),
        didScroll = false,
        changeHeaderOn = 100;
 
    function init() {
        window.addEventListener( 'scroll', function( event ) {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( scrollPage, 50 );
            }
        }, false );
    }
 
    function scrollPage() {
        var sy = scrollY();
        if ( sy >= changeHeaderOn ) {
            classie.add( header, 'shrink' );
        }
        else {
            classie.remove( header, 'shrink' );
        }
        didScroll = false;
    }
 
    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }
 
    init();
 
})();