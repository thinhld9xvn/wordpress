<?php 
	$items_per_page = 12;

	$options = get_option( 'category_' . get_query_var('cat') );
	$galleries = $options['cat-metabox-gallery-category'];

	if ( $items_per_page > sizeof( $galleries ) ) :
		$items_per_page = sizeof( $galleries );
	endif;

	$galleries_img_tag = array();
	$galleries_iobject_tag = array();

	foreach( $galleries as $gallery ) :

		$cat_thumb_id = pn_get_attachment_id_from_url( $gallery );
		$cat_thumb_tag = wp_get_attachment_image( $cat_thumb_id, 'theme-feature-image-projects' );

		$galleries_img_tag[] = $cat_thumb_tag;

		$gallery_id = pn_get_attachment_id_from_url( $gallery );

		$galleries_iobject_tag[] = sprintf('<img src="%s" alt="%s" />', 
											$gallery,
											get_the_title( $gallery_id ) );
	
	endforeach; ?>

<script>
	var	galleries_project = <?php echo json_encode(  $galleries ) ?>,
		galleries_img_tag = <?php echo json_encode( $galleries_img_tag ) ?>,
		galleries_iobject_tag = <?php echo json_encode( $galleries_iobject_tag ) ?>
</script>


<h4><?php echo single_cat_title( ); ?></h4>

<!-- boxSingleDetails -->
<div class="boxSingleDetails allGalleryObjects mtop20 ohidden" data-wrapper-templates="true">

	<!-- three-columns-layout -->
	<div class="split-columns three-columns-layout galleryImages" 
			data-parent-template="true" 
			data-items-per-page="<?php echo $items_per_page ?>">
		
		<?php 
			for ( $i = 0; $i < $items_per_page; $i++ ) :

					$cat_thumb_id = pn_get_attachment_id_from_url( $galleries[$i] );
					$cat_thumb_tag = wp_get_attachment_image( $cat_thumb_id, 'theme-feature-image-projects' ); ?>				

				<!-- item-layout -->
				<div class="item-layout item-gallery col-md-4 col-sm-6 col-xs-6" data-template="true">

					<!-- singleGallery -->
					<div class="lightgallery-wrap singleGallery">

						<a class="lightgallery-thumbnail" data-template-element="true" href="#">
							<?php echo $cat_thumb_tag; ?>
						</a>						

					</div>
					<!-- #singleGallery -->

				</div>
				<!-- #item-layout -->

		<?php endfor; ?>		

	</div>
	<!-- #three-columns-layout -->

	<!-- galleryObjects -->
	<div class="lightgallery galleryObjects" data-parent-template="true" data-items-per-page="<?php echo $items_per_page ?>">
		
		<?php 
			for ( $j = 0; $j < $items_per_page; $j++ ) :

				$id = pn_get_attachment_id_from_url( $galleries[$j] );
				$gallery_title = get_the_title( $id ); ?>

				<a href="<?php echo $galleries[$j] ?>" data-template="true" data-template-element="true">
					<img src="<?php echo $galleries[$j] ?>" alt="<?php echo $gallery_title ?>" />
				</a>	

		<?php endfor; ?>		

	</div>
	<!-- #galleryObjects -->

	<div class="clearfix"></div>

	<ul class="pagination simple_ajax_pager galleryPagination" 
		data-pg-max-size="<?php echo round( sizeof( $galleries ) / $items_per_page, 0 ); ?>" 
		data-pg-show-size="10"
		data-pg-jump-size="4">
	</ul>

</div>
<!-- #boxSingleDetails -->