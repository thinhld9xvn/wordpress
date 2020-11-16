<?php 
	
	/* disable comment form */

	function filter_media_comment_status( $open, $post_id ) {
		return false;
	}
	add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

	function astra_custom_fb_comments_box() { 

		if ( is_single() ) :

			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>

			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="4oLsN20J"></script>

			<div class="fbComments mtop20">

				<div class="fb-comments" data-href="<?= $actual_link ?>" data-numposts="5" data-width="100%"></div>

			</div>

	<?php 
		endif;
	}

	add_action( 'astra_entry_content_after', 'astra_custom_fb_comments_box', 20 );