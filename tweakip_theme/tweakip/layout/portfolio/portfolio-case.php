<?php 
	$fb_case = get_post_meta( $post->ID, '_pt-field-portfolio-case-fbpost-code', true ); 

	$galleries = get_post_meta( $post->ID, '_pt-field-portfolio-case-slider', true ); 
	$galleries = ! is_array($galleries) || 
				 empty( $galleries[0] ) ? null : $galleries; 

	$thumbnail_id = get_post_thumbnail_id( $post->ID ); ?>

<!-- main -->
<section id="main">

	<!-- page-custom-fullwidth -->
	<div class="page-custom-fullwidth">

		<!-- container -->
		<div class="container">

			<!-- cleft -->
			<div class="cleft col-md-9 col-sm-9 col-xs-12">

				<!-- case-post -->
				<div class="case-post tcenter">

					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					<?php echo $fb_case; ?>

				</div>
				<!-- #case-post -->

				<!-- case-slider -->
				<div class="case-slider mtop40-ms mtop20">

					<div class="bxslider-wrapper">

						<ul id="case-bxslider" 
							class="bxslider --fademode"
							data-bxslider-pagethumb-target="#case-pagethumb-bxslider">

							<?php if ( $galleries ) :

									foreach ( $galleries as $gallery_src ) : 

										$attachment_id = pn_get_attachment_id_from_url( $gallery_src ); ?>

									    <li class="tcenter">
									    	<?php echo wp_get_attachment_image( $attachment_id, 
                                                                                'feature-image-case-slider',
                                                                                false,
                                                                                array(
                                                                                    'class' => 'fixed-vertical'
                                                                                ) 
                                                                             ); ?>
									    </li>

							<?php 	endforeach;

							      else : ?>

							      		<li>
                                           <?php echo wp_get_attachment_image( $thumbnail_id, 
                                                                               'feature-image-case-slider',
                                                                                false,
                                                                                array(
                                                                                  'class' => 'fixed-vertical'
                                                                                ) 
                                                                             );  ?>
                                        </li> 

							<?php endif; ?>

						</ul>

					</div>	

					<div class="bxslider-pagethumb-wrapper mtop20">					

						<div id="case-pagethumb-bxslider" 
							class="bx-pagethumb"
							data-bxslider-target="#case-bxslider">

							<?php 

								if ( $galleries ) :

									$count = 0;

									foreach ( $galleries as $gallery_src ) : 

										$attachment_id = pn_get_attachment_id_from_url( $gallery_src ); ?>

									    <div class="slide pageitem">

									    	<a data-slide-index="<?php echo $count; ?>"
									    		href="">

									    		<div class="image-wrap">
									    			<?php echo wp_get_attachment_image( $attachment_id, 
	                                                                                    'feature-image-case-slider',
	                                                                                    false, 
	                                                                                    array( 'class' => 'fixed-horizontal' ) 
	                                                                                  ); ?>
									    		</div>

									    	</a>

									    </div>	

							<?php 	
										$count++;

									endforeach; 

								else : ?>

									<div class="slide pageitem">

								    	<a data-slide-index="<?php echo $count; ?>"
								    		href="">

								    		<div class="image-wrap">
								    			<?php echo wp_get_attachment_image( $thumbnail_id, 
                                                                                    'feature-image-case-slider',
                                                                                    false, 
                                                                                    array( 'class' => 'fixed-horizontal' ) 
                                                                                  ); ?>
								    		</div>

								    	</a>

								    </div>	

							<?php
								endif; ?>

						</div>	

					</div>						

				</div>
				<!-- #case-slider -->

			</div>
			<!-- #cleft -->

		</div>
		<!-- #container -->

	</div>
	<!-- #page-custom-fullwidth -->

</section>
<!-- #main -->