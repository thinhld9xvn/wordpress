<?php 
	/* Template Name: Commerce Layout Page */  ?>

<?php get_header(); ?>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
		</div>
	</div>
</div>
<div class="body-content blog-page outer-top-ts">

	<div class="container">

		<div class="page-layout-box">

			<div class="sidebar __left __sm __xs">

				<?php include THEME_CHILD_DIR . '/widgets/commercants-sidebar.php' ?>

			</div>

			<div class="main-page __sm __xs">				

				<div id="page-entry-banner">

					<div class="page-commerce-gmap">

						<div id="results"></div>

						<div id="map"></div>
					
						
					</div>

				</div>

				<div class="page-contents mtop20">

    				<div class="brands-list grid-three-columns">

    					<?php 
    						
                            $data_commercants_list = \Commercants\CommercantGetListUtils::get();
							$data_coords_list = \Commercants\CommercantGetCoordsListUtils::get(); 
							$data_categories_map_with_shop = \Commercants\CommercantGetStoreCategoriesListUtils::get_by_map_lists(); ?>

    					<script type="text/javascript">

    						var _brands_lists_info = <?php echo json_encode($data_commercants_list) ?>,
								_coords_lists_info = <?php echo json_encode($data_coords_list) ?>,
								_categories_map_list_info = <?php echo json_encode($data_categories_map_with_shop) ?>

    						//console.log(_brands_lists_info);
    						//console.log(_coords_lists_info);
    						
    					</script>
					   
					</div>

					<ul id="pagin" class="pagination"></ul>

				</div>
		
			</div>

		</div>

	</div>

</div>


<?php get_footer(); ?>