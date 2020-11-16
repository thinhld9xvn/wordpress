<?php 
	require_once 'libraries/qTranslate_manage_admin_bar_menu_hook.php';

	require_once 'libraries/qtranslate_manage_action_term_hook.php';

	require_once 'libraries/qTranslate_manage_action_post_hook.php';

	require_once 'libraries/qTranslate_manage_term_columns_hook.php';

	require_once 'libraries/qTranslate_request_hook.php';

	function qTranslate_add_langcode_to_link() { 

		$langcode = $_GET['qtranslate_lang'];

		if ( ! isset( $langcode ) ) :

			$langcode = $_SESSION['qtranslate_active_lang'];

		endif;

		if ( false !== strpos( $_SERVER['REQUEST_URI'], 'edit.php' ) || false !== strpos( $_SERVER['REQUEST_URI'], 'edit-tags.php' )  ) :  ?>

			<script type="text/javascript">

				jQuery(function($) {

					$('a').each(function(i, e) {

						const $link = $(e);

						const href = $link.attr('href');

						if ( typeof( href ) !== 'undefined' && 
							 href !== '' && 
							 ( href.indexOf('https://') === 0 || href.indexOf('http://') === 0 || href.indexOf('//') === 0 ) 
						    ) {

							if ( href.indexOf('qtranslate_lang') === -1 ) {

								let s = href.substr( href.length - 4 ),	
									s1 = href.substr( href.length - 1 );

								if ( s !== '.php' && s1 !== '?' && 
									 s1 !== '/' && s1 !== '&' ) {

									$link.attr('href', href + '&qtranslate_lang=' + '<?= $langcode ?>' );

								}


							}

						}

					});

				});
				
			</script>

	<?php 

		endif;
	
	}


	add_action('in_admin_footer', 'qTranslate_add_langcode_to_link');

	/*$debug_tags = array();
	add_action( 'all', function ( $tag ) {
	    global $debug_tags;
	    if ( in_array( $tag, $debug_tags ) ) {
	        return;
	    }
	    echo "<pre>" . $tag . "</pre>";
	    $debug_tags[] = $tag;
	} );*/