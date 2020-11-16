<?php 
	
	require_once 'metaboxes/schema-metaboxes.php';

	function schema_enqueues() {

		if ( ! is_admin() ) :

			global $uc_enqueues;

			$uc_enqueues['stylesheets'][] = dirname(__FILE__) . '/css/schema.css';
			$uc_enqueues['scripts'][] = dirname(__FILE__) . '/js/schema.js';

		endif;

	}

	add_action('init', 'schema_enqueues');

	function schema_rating_star( $post ) {

		if ( ! is_admin() ) :

			if ( ! is_front_page() && false === strpos( $post->post_content, "<section id='schema-rating-star'" ) ) :

				ob_start(); ?>

				<section id='schema-rating-star' class='schema-rating-star'>

				  <h4>
				  	Đánh giá bài viết
				  </h4>
				  
				  <!-- Rating Stars Box -->
				  <div class='rating-stars text-left'>
				    <ul id='stars'>
				      <li class='star' title='Kém' data-value='1'>
				        <i class='fa fa-star fa-fw'></i>
				      </li>
				      <li class='star' title='Tồi' data-value='2'>
				        <i class='fa fa-star fa-fw'></i>
				      </li>
				      <li class='star' title='Tốt' data-value='3'>
				        <i class='fa fa-star fa-fw'></i>
				      </li>
				      <li class='star' title='Tuyệt vời' data-value='4'>
				        <i class='fa fa-star fa-fw'></i>
				      </li>
				      <li class='star' title='Trên cả tuyệt vời' data-value='5'>
				        <i class='fa fa-star fa-fw'></i>
				      </li>
				    </ul>
				  </div>
				 
				  
				</section>
<?php
				$contents = ob_get_contents();		
				ob_end_clean();

				$post->post_content .= $contents;

			endif;

		endif;

		return $post;		

	}

	add_action('the_post', 'schema_rating_star');
?>