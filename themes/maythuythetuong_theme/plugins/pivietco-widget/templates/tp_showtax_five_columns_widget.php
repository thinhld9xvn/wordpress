<!-- home-catlog -->
<div class="home-catlog zoom-box home-catproduct padtb40-ms padtb20-xs bg_cyan">

	<!-- container -->
	<div class="container">

		<h1 class="uppercase">
			<span class="vmiddle"><?php echo $title; ?></span>
			<span class="fa fa-play -cwhite padleft10 head-icon vmiddle"></span>
		</h1>

		<!-- catproduct-wrap -->
		<div class="catproduct-wrap mtop40-ms mtop20-xs">

			<!-- catproduct-columns -->
			<div class="catproduct-columns split-columns five-columns-layout"
				 data-navig="compactcontent" data-multiple="false" data-object=".item-layout" data-setcompact=".title > a" data-numcharonipad="40" data-numcharonmobile="30" data-endshortcontent="..." data-delimiter-css-property="clear" data-delimiter-css-value="both">

				 <?php 
				 	$terms = get_terms(

				 		array(

					    	'taxonomy' => $taxonomy,
					    	'hide_empty' => false,
					    	'orderby' => 'id',
					    	'order' => 'asc',
					    	'parent' => 0,
					    	'number' => $terms_number
						) 

					); 			

					foreach ( $terms as $term ) : 

						$term_meta = get_option( "term_{$term->term_id}");
						$term_showhomepage = $term_meta['term-field-term-product-showhomepage'];

						if ( 'true' === $term_showhomepage ) : 

							$term_avatar_url = $term_meta['term-field-term-product-avatar'];						
							$attachment_id = pn_get_attachment_id_from_url( $term_avatar_url ); ?>

							<!-- item-layout -->
							<div class="zoom-item item-layout col-md-2 col-sm-6 col-xs-6">

								<a href="<?php echo get_term_link( $term ); ?>" 
								   class="thumb -responsive block tcenter">

								   <span class="h100p ohidden flex">									

										<?php 										
											echo wp_get_attachment_image( $attachment_id,																		 
																		  'feature-image-product-five-columns'												
															  		); ?>	

									</span>						

								</a>

								<div class="title tcenter padbot10">

									<a class="default block" 
									   href="<?php echo get_term_link( $term ); ?>" 
									   data-originalcontent="<?php echo short_text( $term->name, 45 ); ?>">
										<?php echo short_text( $term->name, 45 ); ?>
									</a>

								</div>

							</div>
							<!-- #item-layout -->

			  <?php 
			  			endif; 

			  		endforeach; ?>

			</div>
			<!-- #home-catlog-columns -->

		</div>
		<!-- #catproduct-wrap -->

	</div>
	<!-- #container -->

</div>
<!-- #home-catlog -->