<?php

/*************************************************
## Woocommerce 
*************************************************/

if ( class_exists( 'woocommerce' ) ) {
add_theme_support( 'woocommerce' );
add_image_size('dealsdot-woo-product', 450, 450, true);

// Remove woocommerce defauly styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// hide default shop title anasayfadaki title gizlemek için
add_filter('woocommerce_show_page_title', 'dealsdot_override_page_title');
function dealsdot_override_page_title() {
return false;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); /*remove result count above products*/
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); //remove rating
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);

add_action( 'woocommerce_before_shop_loop_item', 'dealsdot_shop_thumbnail', 10);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'dealsdot_related_products', 20);

function dealsdot_related_products(){
    woocommerce_related_products( array('posts_per_page' => 7));
}

add_action('extra_vendor_info_widget','dealsdot_vendor_info',10);
function dealsdot_vendor_info(){
	global $post;
	$vendor = get_wcmp_product_vendors($post->ID);

	$vendor_fb_profile = get_user_meta($vendor->id, '_vendor_fb_profile', true);
	$vendor_twitter_profile = get_user_meta($vendor->id, '_vendor_twitter_profile', true);
	$vendor_linkdin_profile = get_user_meta($vendor->id, '_vendor_linkdin_profile', true);
	$vendor_google_plus_profile = get_user_meta($vendor->id, '_vendor_google_plus_profile', true);
	$vendor_youtube = get_user_meta($vendor->id, '_vendor_youtube', true);
	$vendor_instagram = get_user_meta($vendor->id, '_vendor_instagram', true);
	$store_name = $vendor->page_title;

	$output = '';
	$output .= '<div class="store-box">';
	if($vendor->image){
		$output .= '<img class="img-responsive" src="'.esc_url(wp_get_attachment_url( $vendor->image )).'" alt="'.esc_attr($store_name).'">';
	}
	$output .= '<h2><a href="#">'.esc_html($store_name).'</a></h2>';
	$output .= '<div class="mail-box"><a href="mailto:'.esc_attr($vendor->user_data->user_email).'">'.esc_html($vendor->user_data->user_email).'</a></div>';
	$output .= '<div class="social">';
	$output .= '<ul class="link">';
	if ($vendor_fb_profile) {
		$output .= '<li class="fb"><a target="_blank" rel="nofollow" href="'.esc_url($vendor_fb_profile).'" title="'.esc_attr__('Facebook','dealsdot').'"></a></li>';
	}
	if ($vendor_twitter_profile) {
		$output .= '<li class="tw"><a target="_blank" rel="nofollow" href="'.esc_url($vendor_twitter_profile).'" title="'.esc_attr__('Twitter','dealsdot').'"></a></li>';
	}
	if ($vendor_google_plus_profile) {
		$output .= '<li class="googleplus"><a target="_blank" rel="nofollow" href="'.esc_url($vendor_google_plus_profile).'" title="'.esc_attr__('GooglePlus','dealsdot').'"></a></li>';
	}
	if ($vendor_linkdin_profile) {
		$output .= '<li class="linkedin"><a target="_blank" rel="nofollow" href="'.esc_url($vendor_linkdin_profile).'" title="'.esc_attr__('linkedin','dealsdot').'"></a></li>';
	}
	if ($vendor_youtube) {
		$output .= '<li class="youtube"><a target="_blank" rel="nofollow" href="'.esc_url($vendor_youtube).'" title="'.esc_attr__('youtube','dealsdot').'"></a></li>';
	}
	if ($vendor_instagram) {
		$output .= '<li class="instagram"><a target="_blank" rel="nofollow" href="'.esc_url($vendor_instagram).'" title="'.esc_attr__('instagram','dealsdot').'"></a></li>';
	}

	$output .= '</ul>';
	$output .= '</div>';
	$output .= '<p>'.dealsdot_sanitize_data($vendor->description).'</p>';
	$output .= '</div>';

	echo dealsdot_sanitize_data($output);
}

/*----------------------------
  Single Wishlist
 ----------------------------*/
add_action( 'klb_favorite_buttons', 'dealsdot_ti_wishlists', 36);
function dealsdot_ti_wishlists(){
	$wishlist = get_theme_mod( 'dealsdot_wishlist_button', '0' );

	if($wishlist == '1'){
		echo do_shortcode('[ti_wishlists_addtowishlist]');
	}
}

/*----------------------------
  Single Compare
 ----------------------------*/
add_action( 'klb_favorite_buttons', 'dealsdot_yith_compare', 36);
function dealsdot_yith_compare(){
	$compare = get_theme_mod( 'dealsdot_compare_button', '0' );

	if($compare == '1'){
		echo do_shortcode('[yith_compare_button]');
	}
}

/*----------------------------
  Single Vendor Mail
 ----------------------------*/
add_action( 'klb_favorite_buttons', 'dealsdot_vendor_mail', 37);
function dealsdot_vendor_mail(){
	global $post;

	if (function_exists('get_wcmp_vendor_settings')) {
		$vendormail = get_theme_mod( 'dealsdot_vendor_mail', '0' );
		$vendor = get_wcmp_product_vendors($post->ID);
		
		if($vendormail && $vendor){
			echo ' <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="mailto:'.esc_attr($vendor->user_data->user_email).'">
						<i class="fa fa-envelope"></i>
				</a>';
		}
	}
}

/*----------------------------
  Add my owns
 ----------------------------*/
function dealsdot_shop_thumbnail () {
		$id = get_the_ID();
		global $product;
		global $post;
		global $woocommerce;

		$rating = wc_get_rating_html($product->get_average_rating()); //get rating
	    $cart_url = wc_get_cart_url();
		$price = $product->get_price_html();
		$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
		$stock_status = $product->get_stock_status();
		$stock_text = $product->get_availability();
		$weight = $product->get_weight();
		$wishlist = get_theme_mod( 'dealsdot_wishlist_button', '0' );
		$compare = get_theme_mod( 'dealsdot_compare_button', '0' );
		if (function_exists('get_wcmp_vendor_settings')) {
		$vendor = get_wcmp_product_vendors($post->ID);
		$store_name = $vendor->page_title;
		}
		
		$output = '';

		$att=get_post_thumbnail_id();
		$image_src = wp_get_attachment_image_src( $att, 'full' );
		$image_src = $image_src[0]; 
		$imageresize = dealsdot_resize( $image_src, 260, 170, true, true, true );  

		$percentage = '';
		if( $product->get_sale_price() && $product->get_regular_price()){
			$percentage .= '<div class="tag new"><span>';			
			$percentage .= ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);			
			$percentage .= '%</span></div>';			
		}
		
		$output .= '<div class="item">';
		$output .= '<div class="products">';
		$output .= '<div class="product">';
		$output .= '<div class="product-image">';
		$output .= '<div class="image"> ';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '<img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '</div>';
		$output .= $percentage;
		$output .= '</div>';
		$output .= '<div class="product-info text-left">';
		if(isset($vendor)){
		$output .= '<div class="store"><a href="'.$vendor->permalink.'" title="'.the_title_attribute( 'echo=0' ).'">'.$store_name.'</a></div>';
		}
		$output .= '<h3 class="name"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h3>';
		$output .= $rating;
		$output .= '<div class="description"></div>';
		$output .= '<div class="product-price"> <span class="price">'.$price.'</span> </div>';
		$output .= '</div>';
		$output .= '<div class="cart clearfix animate-effect">';
		$output .= '<div class="action">';
		$output .= '<ul class="list-unstyled">';
		$output .= '<li class="add-cart-button btn-group">';
		$output .= dealsdot_add_to_cart_button();
		$output .= '</li>';
		if($wishlist == '1'){
		$output .= '<li class="lnk wishlist"> '.do_shortcode('[ti_wishlists_addtowishlist]').' </li>';
		}
		if($compare == '1'){
		$output .= '<li class="lnk compare"> '.do_shortcode('[yith_compare_button]').' </li>';
		}
		
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		$output_escaped = $output;

	 echo $output_escaped;

}

/*************************************************
## Woocommerce Cart Text
*************************************************/

//add to cart button
function dealsdot_add_to_cart_button(){
	global $product;
	$output = '';

	ob_start();
	woocommerce_template_loop_add_to_cart();
	$output .= ob_get_clean();

	if(!empty($output)){
		$pos = strpos($output, ">");
		
		if ($pos !== false) {
		    $output = substr_replace($output,">", $pos , strlen(1));
		}
	}
	
	if($product->get_type() == 'variable' && empty($output)){
		$output = "<a class='btn btn-primary add-to-cart cart-hover' href='".get_permalink($product->get_id())."'>".esc_html__('Select options','dealsdot')."</a>";
	}

	if($product->get_type() == 'simple'){
		$output .= "";
	} else {
		$btclass  = "single_bt";
	}
	
	if($output) return "$output";
}



/*************************************************
## Woo Cart Ajax
*************************************************/ 

add_filter('woocommerce_add_to_cart_fragments', 'dealsdot_header_add_to_cart_fragment');
function dealsdot_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<span class="cartcount"> <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'dealsdot'), $woocommerce->cart->cart_contents_count);?> </span>
	

	<?php
	$fragments['span.cartcount'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

    ob_start();
    ?>

    <div class="fl-mini-cart-content">
        <?php woocommerce_mini_cart(); ?>
    </div>

    <?php $fragments['div.fl-mini-cart-content'] = ob_get_clean();

    return $fragments;

} );

/*************************************************
## Dealsdot Woo Search Form
*************************************************/ 

add_filter( 'get_product_search_form' , 'dealsdot_custom_product_searchform' );

function dealsdot_custom_product_searchform( $form ) {

	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
				<div class="control-group">
                  <input type="text" class="search-field" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search','dealsdot').'">
                  <button type="submit" class="search-button"> </button>
                  <input type="hidden" name="post_type" value="product" />
				</div>
              </form>';

	return $form;
}

/*************************************************
## Quick View Scripts
*************************************************/ 

function dealsdot_quick_view_scripts() {
	wp_enqueue_script( 'dealsdot-grid-list', get_template_directory_uri() . '/assets/js/custom/grid_list.js', array('jquery'), '1.0.0', true );
	if (is_tax()) {
		wp_localize_script( 'dealsdot-grid-list', 'MyAjax', array(
			'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
			'security' => wp_create_nonce( 'dealsdot-special-string' ),
			'post_idm' => get_queried_object()->term_id,
			'is_tax' => is_tax() ? '1' : '0',
		));
	} else {
		wp_localize_script( 'dealsdot-grid-list', 'MyAjax', array(
			'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
			'security' => wp_create_nonce( 'dealsdot-special-string' ),
		));
	}
}
add_action( 'wp_enqueue_scripts', 'dealsdot_quick_view_scripts' );

/*************************************************
## List View
*************************************************/ 

add_action( 'wp_ajax_nopriv_list_view', 'dealsdot_list_view_callback' );
add_action( 'wp_ajax_list_view', 'dealsdot_list_view_callback' );
function dealsdot_list_view_callback() {
	check_ajax_referer( 'dealsdot-special-string', 'security' );

	$id = get_the_ID();
	global $product;
	global $woocommerce;
	$output = '';

    if(is_front_page()){
		$paged = get_query_var('page') ? get_query_var('page') : 1;
    } else { 
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
    }

	$loop = array(
		'post_type' => 'product',
		'posts_per_page'         => 15,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish',
        'paged' 			=> $paged
	);
	if($_POST['is_tax']){
	$loop['tax_query'][] = array(
		'taxonomy' 	=> 'product_cat',
		'field' 	=> 'id',
		'terms' 	=> $_POST['id']
	);
	}
    query_posts( $loop );		


	while ( have_posts() ) : the_post(); 
	$product = new WC_Product(get_the_ID());

	$rating = wc_get_rating_html($product->get_average_rating()); //get rating
	$cart_url = wc_get_cart_url();
	$price = $product->get_price_html();
	$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$weight = $product->get_weight();
	$wishlist = get_theme_mod( 'dealsdot_wishlist_button', '0' );
	$compare = get_theme_mod( 'dealsdot_compare_button', '0' );
	$review_count = $product->get_review_count();

	$att=get_post_thumbnail_id();
	$image_src = wp_get_attachment_image_src( $att, 'full' );
	$image_src = $image_src[0]; 
	
	
	$output .= '<div class="category-product-inner">';
	$output .= '<div class="products">';
	$output .= '<div class="product-list product">';
	$output .= '<div class="row product-list-row">';
	$output .= '<div class="col col-sm-3 col-lg-4">';
	$output .= '<div class="product-image">';
	$output .= '<div class="image">';
	$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">';
	$output .= '<img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'">';
	$output .= '</a>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="col col-sm-9 col-lg-8">';
	$output .= '<div class="product-info">';
	$output .= '<h3 class="name"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h3>';
	$output .= $rating;
	$output .= '<div class="product-price"> <span class="price">'.$price.'</span> </div>';
	$output .= '<div class="description m-t-10">'.dealsdot_limit_words(get_the_excerpt(), '25').'</div>';

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';


		  
		endwhile; 
		wp_reset_query();
		
	
	 $output_escaped = $output;
	 echo $output_escaped;

	
		wp_die();

}

/*************************************************
## Grid View
*************************************************/ 

add_action( 'wp_ajax_nopriv_grid_view', 'dealsdot_grid_view_callback' );
add_action( 'wp_ajax_grid_view', 'dealsdot_grid_view_callback' );
function dealsdot_grid_view_callback() {
	check_ajax_referer( 'dealsdot-special-string', 'security' );

	$id = get_the_ID();
	global $product;
	global $woocommerce;
	$output = '';

    if(is_front_page()){
		$paged = get_query_var('page') ? get_query_var('page') : 1;
    } else { 
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
    }
		
	$output .= '<div class="row">';
	$loop = array(
		'post_type' => 'product',
		'posts_per_page'         => 20,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'post_status'    => 'publish',
        'paged' 			=> $paged
	);
	if($_POST['is_tax']){
	$loop['tax_query'][] = array(
		'taxonomy' 	=> 'product_cat',
		'field' 	=> 'id',
		'terms' 	=> $_POST['id']
	);
	}
    query_posts( $loop );		


	while ( have_posts() ) : the_post(); 
	$product = new WC_Product(get_the_ID());

	$rating = wc_get_rating_html($product->get_average_rating()); //get rating
	$cart_url = wc_get_cart_url();
	$price = $product->get_price_html();
	$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
	$stock_status = $product->get_stock_status();
	$stock_text = $product->get_availability();
	$weight = $product->get_weight();
	$wishlist = get_theme_mod( 'dealsdot_wishlist_button', '0' );
	$compare = get_theme_mod( 'dealsdot_compare_button', '0' );
	if (function_exists('get_wcmp_vendor_settings')) {
	$vendor = get_wcmp_product_vendors(get_the_ID());
	$store_name = $vendor->page_title;
	}
	

	$att=get_post_thumbnail_id();
	$image_src = wp_get_attachment_image_src( $att, 'full' );
	$image_src = $image_src[0]; 
	$imageresize = dealsdot_resize( $image_src, 260, 170, true, true, true );  

	$percentage = '';
	if( $product->get_sale_price() && $product->get_regular_price()){
		$percentage .= '<div class="tag new"><span>';			
		$percentage .= ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);			
		$percentage .= '%</span></div>';			
	}
 	

		$output .= '<div class="col-sm-6 col-md-4 col-lg-4">';
		$output .= '<div class="item">';
		$output .= '<div class="products">';
		$output .= '<div class="product">';
		$output .= '<div class="product-image">';
		$output .= '<div class="image"> ';
		$output .= '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '<img src="'.esc_url($image_src).'" alt="'.the_title_attribute( 'echo=0' ).'">';
		$output .= '</a>';
		$output .= '</div>';
		$output .= $percentage;
		$output .= '</div>';
		$output .= '<div class="product-info text-left">';
		if(isset($vendor)){
		$output .= '<div class="store"><a href="'.$vendor->permalink.'" title="'.the_title_attribute( 'echo=0' ).'">'.$store_name.'</a></div>';
		}
		$output .= '<h3 class="name"><a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'">'.get_the_title().'</a></h3>';
		$output .= $rating;
		$output .= '<div class="description"></div>';
		$output .= '<div class="product-price"> <span class="price">'.$price.'</span> </div>';
		$output .= '</div>';
		$output .= '<div class="cart clearfix animate-effect">';
		$output .= '<div class="action">';
		$output .= '<ul class="list-unstyled">';
		$output .= '<li class="add-cart-button btn-group">';
		$output .= dealsdot_add_to_cart_button();
		$output .= '</li>';
		if($wishlist == '1'){
		$output .= '<li class="lnk wishlist"> '.do_shortcode('[ti_wishlists_addtowishlist]').' </li>';
		}
		
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		endwhile; 
		wp_reset_query();
		
	$output .= '</div>';
	
	 	$output_escaped = $output;
	 	echo $output_escaped;

	
		wp_die();

}



} // is woocommerce activated

?>