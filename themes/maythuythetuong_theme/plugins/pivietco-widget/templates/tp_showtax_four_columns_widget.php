<!-- home-catlog -->
<div class="home-catlog zoom-box padtb40-ms padtb20-xs">

	<!-- container -->
	<div class="container">

		<!-- home-catlog-columns -->
		<div class="home-catlog-columns split-columns four-columns-layout"
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
					$term_showhomepage = $term_meta['term-field-cat-service-showhomepage'];

					if ( 'true' === $term_showhomepage ) : 

						$term_avatar_url = $term_meta['term-field-cat-service-avatar'];						
						$attachment_id = pn_get_attachment_id_from_url( $term_avatar_url ); ?>

						<!-- item-layout -->
						<div class="zoom-item item-layout col-md-3 col-sm-6 col-xs-6">

							<div class="thumb -responsive flex tcenter ohidden">

								<a href="<?php echo get_term_link( $term ); ?>">

									<?php 										
										echo wp_get_attachment_image( $attachment_id,
																	'feature-image-service',
																	false,
																	array(
																		'class' => 'fixed-vertical'
																	) 
														  		); ?>

								</a>

							</div>

							<div class="title mtop10">

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
	<!-- #container -->

</div>
<!-- #home-catlog -->