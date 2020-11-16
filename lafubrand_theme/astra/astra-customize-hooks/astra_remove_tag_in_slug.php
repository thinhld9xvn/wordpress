<?php 
	/*
	* Remove tag in URL
	* Code by levantoan.com
	*/
	add_filter( 'term_link', 'devvn_post_tag_permalink', 10, 3 );

	function devvn_post_tag_permalink( $url, $term, $taxonomy ){

	    switch ($taxonomy):

	        case 'post_tag':

	            $taxonomy_slug = 'tag';
	            if(strpos($url, $taxonomy_slug) === FALSE) break;
	            $url = str_replace('/' . $taxonomy_slug, '', $url);
	            break;

	    endswitch;

	    return $url;

	}
	// Add our custom product cat rewrite rules
	function devvn_post_tag_rewrite_rules($flash = false) {

	    $terms = get_terms( array(

	        'taxonomy' => 'post_tag',
	        'post_type' => 'post',
	        'hide_empty' => false,

	    ));

	    if ( $terms && ! is_wp_error($terms) ) :

	        $siteurl = esc_url( home_url('/') );

	        foreach ($terms as $term) :

	            $term_slug = $term->slug;

	            $baseterm = str_replace($siteurl,'', get_term_link($term->term_id,'post_tag'));	           

	            add_rewrite_rule($baseterm.'?$','index.php?tag='.$term_slug,'top');
            	add_rewrite_rule($baseterm.'/page/[0-9]{1,}/?$', 'index.php?tag='.$term_slug.'&paged=$matches[1]','top');
	            add_rewrite_rule($baseterm.'(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?tag='.$term_slug.'&feed=$matches[1]','top');

	        endforeach;

	    endif;

	    if ( $flash == true ) flush_rewrite_rules(false);

	    //global $wp_rewrite;

	    //echo "<pre>"; print_r($wp_rewrite); die();

	}

	add_action('init', 'devvn_post_tag_rewrite_rules');

	/*Sửa lỗi khi tạo mới tag bị 404*/
	add_action( 'created_post_tag', 'devvn_new_post_tag_edit_success', 10, 2 );

	function devvn_new_post_tag_edit_success( $term_id, $taxonomy ) {

	    devvn_post_tag_rewrite_rules(true);

	}