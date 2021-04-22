<?php

/*************************************************
## dealsdot Metabox
*************************************************/

if ( ! function_exists( 'rwmb_meta' ) ) {
  function rwmb_meta( $key, $args = '', $post_id = null ) {
   return false;
  }
 }

add_filter( 'rwmb_meta_boxes', 'dealsdot_register_page_meta_boxes' );

function dealsdot_register_page_meta_boxes( $meta_boxes ) {
	
$prefix = 'klb_';
$meta_boxes = array();


/* ----------------------------------------------------- */
// Destination URL
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'klb_shop_coupon_settings',
	'title' => esc_html__('Coupon Settings','dealsdot'),
	'pages' => array( 'shop_coupon' ),
	'context' => 'side',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> esc_html__('Destination Url','dealsdot'),
			'id'		=> $prefix . 'coupon_destination_url',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
				
	)
);


/* ----------------------------------------------------- */
// Blog Post Slides Metabox
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-gallery',
	'title'		=> esc_html__('Blog Post Image Slides','dealsdot'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> esc_html__('Blog Post Slider Images','dealsdot'),
			'desc'	=> esc_html__('Upload unlimited images for a slideshow - or only one to display a single image.','dealsdot'),
			'id'	=> $prefix . 'blogitemslides',
			'type'	=> 'image_advanced',
		)
		
	)
);

/* ----------------------------------------------------- */
// Blog Audio Post Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'klb-blogmeta-audio',
	'title' => esc_html('Audio Settings','dealsdot'),
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(	
		array(
			'name'		=> esc_html('Audio Code','dealsdot'),
			'id'		=> $prefix . 'blogaudiourl',
			'desc'		=> esc_html__('Enter your Audio URL(Oembed) or Embed Code.','dealsdot'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
	)
);



/* ----------------------------------------------------- */
// Blog Video Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'klb-blogmeta-video',
	'title'		=> esc_html__('Blog Video Settings','dealsdot'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> esc_html__('Video Type','dealsdot'),
			'id'		=> $prefix . 'blog_video_type',
			'type'		=> 'select',
			'options'	=> array(
				'youtube'		=> esc_html__('Youtube','dealsdot'),
				'vimeo'			=> esc_html__('Vimeo','dealsdot'),
				'own'			=> esc_html__('Own Embed Code','dealsdot'),
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> dealsdot_sanitize_data(__('Embed Code<br />(Audio Embed Code is possible, too)','dealsdot')),
			'id'	=> $prefix . 'blog_video_embed',
			'desc'	=> dealsdot_sanitize_data(__('Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br />This will show the Video <strong>INSTEAD</strong> of the Image Slider.<br /><strong>Of course you can also insert your Audio Embedd Code!</strong>','dealsdot')),
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		)
	)
);
 

return $meta_boxes;
}
