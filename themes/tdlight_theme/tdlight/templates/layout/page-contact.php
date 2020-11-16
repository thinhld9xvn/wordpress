<?php global $post; 
	
	$company_name = get_post_meta( $post->ID, '_pt-field-page-lh-company-name', true );
	$company_address = get_post_meta( $post->ID, '_pt-field-page-lh-company-address', true );
	$hotline = get_post_meta( $post->ID, '_pt-field-page-lh-hotline', true );
	$working_time = get_post_meta( $post->ID, '_pt-field-page-lh-working-time', true );
	$email = get_post_meta( $post->ID, '_pt-field-page-lh-email', true );
	$cform_id = strip_tags( get_post_meta( $post->ID, '_pt-field-page-lh-cform-id', true ) ); ?>

<!-- main -->
<section id="main">

	<!-- page-contact -->
	<div class="page-custom-fullwidth page-contact ohidden mtop20">

		<!-- container -->
		<div class="container">
			
			<!-- page-columns -->
			<div class="page-columns padbot20 ohidden">

				<p>
					<?php echo get_the_post_thumbnail( $post->ID, 'full', array('class' => 'fixed-horizontal') ); ?>
				</p>

				<!-- page-cblockquote -->
				<div class="page-cblockquote padtb2per main-columns-layout ohidden" 
					 style="padding: 0 5px;">

					<!-- column-left -->
					<div class="column-left col-md-4 col-sm-12 col-xs-12">

						<!-- address -->
						<div class="address col-xs-12">

							<div class="content col-md-11 col-sm-11 col-xs-11">
								<h3 class="uppercase">
									<?php echo $company_name; ?>
								</h3>
								<h3 class="mtop10">
									<?php echo $company_address; ?>
								</h3>
							</div>

						</div>
						<!-- #address -->

						<!-- address -->
						<div class="address contact mtop20 col-xs-12">

							<div class="icon icon-fa-phone col-md-1 col-sm-1 col-xs-1"></div>
							
							<div class="content col-md-11 col-sm-11 col-xs-11">

								<h3><?php echo $hotline; ?></h3>

								<h3 class="mtop10">
									<?php echo $working_time; ?>
					 			</h3>

							</div>

						</div>
						<!-- #address -->

						<!-- address -->
						<div class="address email mtop10 col-xs-12">

							<div class="icon icon-fa-envelope col-md-1 col-sm-1 col-xs-1"></div>

							<div class="content col-md-11 col-sm-11 col-xs-11">

								<h3><a href="mailto:info@vietgo.com.vn"><?php echo $email; ?></a></h3>
							
							</div>

						</div>
						<!-- #address -->

					</div>
					<!-- #column-left -->

					<!-- column-right -->
					<div class="column-right padleft40-ms mtop20-xs col-md-8 col-sm-12 col-xs-12 pull-right">
					
						<h3 class="uppercase bold">Liên hệ</h3>

						<div class="contact-form mtop20">

							<?php 
								if ( $cform_id && is_numeric( $cform_id ) ) :

									echo do_shortcode("[pvcf_contactform id='{$cform_id}']"); 

								endif; ?>

						</div>

					</div>
					<!-- #column-right -->

				</div>
				<!-- #page-cblockquote -->

				<style type="text/css">

					h3, h3 p {
						font-size: 16px;
					}
					.column-left .content { padding-top: 2px;}

				</style>				

			</div>
			<!-- #page-columns -->

		</div>
		<!-- #container -->

	</div>
	<!-- #page-contact -->
	
</section>
<!-- #main -->