<?php 
	/* Template Name: Bảng giá */

	global $post;	

	$banggia_attachments = get_post_meta( $post->ID, '_pt-field-bang-gia-attachment', true );

	get_header(); ?>
	
	<!-- main -->
	<section id="main">

		<!-- spboxlist -->
		<div class="spboxlist">

			<!-- container -->
			<div class="container">
				
				<!-- home-cblockquote -->
				<div class="home-cblockquote main-columns-layout padtb2per col-xs-12">

				<!-- colleft -->
				<div class="column left bg_white pad5 col-md-3 col-sm-3 col-xs-12">

					<?php dynamic_sidebar('ColLeft Sidebar'); ?>

				</div>
				<!-- #colleft -->

				<!-- colright -->
				<div class="column right bg_white pad15 col-md-8 col-sm-8 col-xs-12 pull-right">
				
					<!-- aticlepagebox -->
					<div class="aticlepagebox">

						<h3 class="hg-title --double-border --double-active-border">
							<?php echo $post->post_title; ?>
						</h3>			

						<!-- articleboxcontent -->
						<div class="articleboxcontent fixed-object mtop20">

							<div class="attachmentLists ohidden">

								<?php 								

									foreach ($banggia_attachments as $attachment_url ) : 

										$attachment_id = pn_get_attachment_id_from_url( $attachment_url ); 
										$attachment_title = get_the_title( $attachment_id ); ?>

										<div class="attachmentColumn col-md-6 col-sm-6 col-xs-12">

											<a class="downloadButton pull-left" href="<?php echo $attachment_url ?>">
												<span class="fa fa-download"></span>
												<?php echo $attachment_title; ?>
											</a>

										</div>
										
							<?php	endforeach;
								?>

							</div>

						</div>
						<!-- #articleboxcontent -->

					</div>
					<!-- #aticlepagebox -->		
					
				</div>
				<!-- #colright -->

			</div>
			<!-- #container -->

		</div>
		<!-- #home-cblockquote -->
		
	</section>
	<!-- #main -->

<?php get_footer() ?>