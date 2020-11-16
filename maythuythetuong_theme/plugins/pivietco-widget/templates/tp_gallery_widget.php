<?php echo $before_widget;
		echo $before_title . $title . $after_title; ?>	

		<!-- footerSidebarContent -->
		<div class="footerSidebarContent mtop20">

			<div class="footerGalleries">

				<div class="lightGallery">

					<?php 
						$args = array(
							'post_type' => $post_type,
							'posts_per_page' => 1,
							'nopaging' => true
						);

						query_posts( $args ); 

						if ( have_posts() ) :

							while ( have_posts() ) : the_post(); 

								$galleries = get_post_meta( get_the_id(), '_pt-field-gallery-images', true ); 

								foreach ( $galleries as $gallery ) : 

									$attachment_id = pn_get_attachment_id_from_url( $gallery ); ?>

									<a href="<?php echo $gallery; ?>">

										<span>
											<?php
												echo wp_get_attachment_image( $attachment_id,
																			  'feature-image-footer-galleries',
																			  false,
																			  array(
																			  	'class' => 'fixed-vertical'
																			  ) 
																			); ?>		
										</span>
										
									</a>	
					<?php   
								endforeach;

							endwhile;

							wp_reset_query();

						endif; ?>

				</div>

			</div>

		</div>
		<!-- #footerSidebarContent -->

<?php echo $after_widget; ?>