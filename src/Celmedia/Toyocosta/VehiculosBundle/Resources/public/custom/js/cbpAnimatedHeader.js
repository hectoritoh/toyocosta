/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var cbpAnimatedHeader = (function() {

	var docElem = document.documentElement,
		header = document.querySelector( '.navbar-default' ),
		didScroll = false,
		changeHeaderOn = 300;

	function init() {
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			classie.add( header, 'navbar-shrink' );
			$(".navbar-shrink").find("div#header-home").find('a').css("color", "#666666");
			$("#logoblanco").hide();
			$("#logorojo").show();

			$("#fb").hide();
			$("#fb-gris").show();

			$("#tw").hide();
			$("#tw-gris").show();

			$("#bl").hide();
			$("#bl-gris").show();
			
		}
		else {
			classie.remove( header, 'navbar-shrink' );
			$("#header-home").find('a').css("color", "#ffffff");
			$("#logorojo").hide();
			$("#logoblanco").show();

			$("#fb").show();
			$("#fb-gris").hide();

			$("#tw").show();
			$("#tw-gris").hide();

			$("#bl").show();
			$("#bl-gris").hide();

		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();

})();