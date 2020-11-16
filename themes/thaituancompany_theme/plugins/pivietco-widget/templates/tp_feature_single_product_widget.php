<?php echo $before_widget; 		
	$product = get_post( $product_id ); 

	$product_childs = get_post_meta( $product_id, '_pt-field-product-entries-content', true ); 

	//print_r( $product_childs ); ?>

	<!-- home-cat-products -->	
	<div class="fullwidth-section home-cat-products mtop20">

		<!-- container -->
		<div class="container">

			<!-- headingCProductTitle -->
			<h3 class="headingCProductTitle ohidden">

				<span class="inlineblock pull-left">
					<?php echo $product->post_title; ?>
				</span>

				<a class="inlineblock pull-right" 
				   href="<?php echo get_the_permalink( $product ); ?>">
				   Xem tiếp
				</a>

			</h3>
			<!-- #headingCProductTitle -->

			<div class="split-columns four-columns-layout mtop20">

				<?php foreach ($product_childs as $p_child) : ?>					

					<!-- item-layout -->
					<div class="item-layout product col-md-3 col-sm-6 col-xs-12">

						<!-- thumbnail -->
						<div class="thumbnail">

							<a href="<?php echo get_the_permalink( $product ); ?>"></a>

							<div class="thumbnail-wrap ohidden">

								<?php 
									$attachment_id = pn_get_attachment_id_from_url( $p_child['accordion-children-product-avatar'] );
									echo wp_get_attachment_image( $attachment_id, 'feature-image-product-four-columns', false, array('class' => 'fixed-vertical') );
								?>

							</div>
							
						</div>
						<!-- #thumbnail -->

						<!-- title -->
						<h4 class="title">

							<a href="<?php echo get_the_permalink( $product ); ?>">
								<?php echo $p_child['accordion-children-product-title']; ?>								
							</a>
							
						</h4>
						<!-- #title -->

					</div>
					<!-- #item-layout -->

				<?php endforeach;?>							

			</div>
			
		</div>
		<!-- #container -->
						
	</div>
	<!-- #home-cat-products -->	

<?php echo $after_widget; ?>