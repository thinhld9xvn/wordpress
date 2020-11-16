<?php 
	function lafubrand_get_post_view() {
	    return (int) get_post_meta( get_the_ID(), 'post_views_count', true );
	}
	function lafubrand_set_post_view() {
	    $key = 'post_views_count';
	    $post_id = get_the_ID();
	    $count = (int) get_post_meta( $post_id, $key, true );
	    $count++;	  
	    update_post_meta( $post_id, $key, $count );
	}
	function lafubrand_posts_column_views( $columns ) {
	    $columns['post_views'] = 'Views';
	    return $columns;
	}
	function lafubrand_posts_custom_column_views( $column ) {
	    if ( $column === 'post_views') {
	        echo lafubrand_get_post_view();
	    }
	}
	//add_filter( 'manage_posts_columns', 'lafubrand_posts_column_views' );
	//add_action( 'manage_posts_custom_column', 'lafubrand_posts_custom_column_views' );


	add_action( 'astra_entry_content_after', 'lafubrand_set_post_view', 10 );