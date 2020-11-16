<?php 
	$page_heading = get_post_meta( $post->ID, '_pt-field-support-servicedesk-heading-description', true ); 
	$page_description = get_post_meta( $post->ID, '_pt-field-support-servicedesk-small-description', true ); 

	$contact_items = get_post_meta( $post->ID, '_pt-field-support-servicedesk-contact-item-content', true ); 
	$contact_items_length = sizeof( $contact_items ); ?>

<!-- page-support-servicedesk -->
<div class="page-custom-fullwidth page-support-servicedesk">

	<!-- container -->
	<div class="container">
	
		<!-- page-support-servicedesk-section -->
		<div class="fullwidth-section page-support-servicedesk-section mtop60-ms mtop20-xs">
			
			<!-- container -->
			<div class="container">

				<div class="headSectionTitle tcenter">

					<!-- mainHomeSectionTitle -->
					<h2 class="mainHomeSectionTitle">
						<?php echo $page_heading; ?>
					</h2>
					<!-- #mainHomeSectionTitle -->

					<div class="desc mtop10">
						<?php echo $page_description; ?>
					</div>

				</div>

				<!-- sectionContent -->
				<div class="sectionContent ohidden mtop60-ms mtop20-xs">

					<!-- two-columns-layout -->
					<div class="split-columns two-columns-layout diensten-layout" >

						<?php							

							for ( $i = 0; $i < $contact_items_length; $i++ ) :

								$title = $contact_items[$i]['accordion-support-servicedesk-contact-item-title'];
								$icon = $contact_items[$i]['accordion-support-servicedesk-contact-icon'];
								$bg = $contact_items[$i]['accordion-support-servicedesk-contact-background'];
								$description = $contact_items[$i]['accordion-support-servicedesk-contact-description'];

								$url = $contact_items[$i]['accordion-support-servicedesk-contact-url']; ?>

								<!-- item-diensten -->
								<div class="item-layout item-diensten item-servicedesk col-md-6 col-sm-6 col-xs-6"
									 style="background-image: url('<?php echo $bg; ?>')">

									<a class="padtb40-ms padtb20-xs" 
									   href="<?php echo $url; ?>">		

										<!-- content-box -->
										<div class="content-box">

											<div class="diensten-icon" 
												 style="background-image: url('<?php echo $icon; ?>')">
											</div>

											<div class="caption mtop20">
												<?php echo $title; ?>
											</div>

										</div>
										<!-- #content-box -->

										<!-- title-box -->
										<div class="title-box pad10 mtop10">
											<?php echo $description; ?>
										</div>
										<!-- #title-box -->
									</a>

								</div>
								<!-- #item-diensten -->	

					  <?php endfor; ?>													

					</div>					
					<!-- #two-columns-layout -->

				</div>				
				<!-- #sectionContent -->

			</div>
			<!-- #container -->

		</div>
		<!-- #page-support-servicedesk-section -->		

	</div>
	<!-- #container -->

</div>
<!-- #page-support-servicedesk -->