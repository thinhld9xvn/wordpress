jQuery(function($) {

	function qTranslateRedirectLocation(e) {		

		href = $(this).attr('href').toString().trim();

		if ( '#' != href && '' != href ) {

			e.preventDefault();

			var prefix_langcode = '';				

			if ( ! href.startsWith( window.location.protocol + '//' + window.location.hostname ) &&
				 ! href.startsWith( window.location.hostname ) &&
				 ! href.startsWith( '/' ) ) {
				
				href = window.location.protocol + '//' + window.location.hostname + '/' + href;
			}

			else if ( ( ! href.startsWith( window.location.protocol + '//' + window.location.hostname ) && 
				 	  ! href.startsWith( window.location.hostname ) ) &&
				 	  href.startsWith( '/' ) ) {
				
				href = window.location.protocol + '//' + window.location.hostname  + href;
			}

			else if ( ! href.startsWith( window.location.protocol + '//' + window.location.hostname ) &&
					   	href.startsWith( window.location.hostname ) ) {
				
				href = window.location.protocol + '//' + href;
			}	

			uri = href.split('//');			
			uri = uri[1].split( '/' );

			if ( uri.length > 1 ) {
				prefix_langcode = uri[1];
			}
			
			if ( '' != prefix_langcode ) {

				has_prefix_langcode = qtranslate_languages.find( function(langcode) { 
																	return langcode == prefix_langcode;
																});

				if ( ! has_prefix_langcode ) {					

					uri.splice( 1, 0, qtranslate_site_langcode );					

				}

				uri = window.location.protocol + '//' + uri.join( '/' );

			}

			else {

				uri = window.location.protocol + '//' + uri[0] + '/' + qtranslate_site_langcode;

			}

			window.location.href = uri;

		}

	}

	$('a').click( qTranslateRedirectLocation );

});