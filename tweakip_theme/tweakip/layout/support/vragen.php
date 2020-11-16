<?php

	$post_parent = $post;	

	$page_heading = get_post_meta( $post_parent->ID, '_pt-field-support-vragen-template-heading', true ); 
	
	while ( empty( $page_heading ) ) :				

		$post_parent = get_page( $post_parent->post_parent );

		if ( $post_parent ) :

			$page_heading = get_post_meta( $post_parent->ID, '_pt-field-support-vragen-template-heading', true ); 

		else :

			break;

		endif;

	endwhile;	

	$page_description = get_post_meta( $post_parent->ID, '_pt-field-support-vragen-template-small-description', true );

	$previous_thread_url = get_page_link( $post->post_parent );
	$overview_button_text = get_post_meta( $post_parent->ID, '_pt-field-support-vragen-template-overview-button-text', true ); 
	
	$page_layout = get_post_meta( $post->ID, '_pt-field-support-vragen-item-layout', true ); ?>

	<!-- page-support-vragen -->
	<div class="page-custom-fullwidth page-support-vragen">

		<!-- container -->
		<div class="container">
		
			<!-- page-support-vragen-section -->
			<div class="fullwidth-section page-support-vragen-section mtop60-ms mtop20-xs">
				
				<!-- container -->
				<div class="container">

					<!-- headSectionTitle -->
					<div class="headSectionTitle tcenter">

						<!-- mainHomeSectionTitle -->
						<h2 class="mainHomeSectionTitle">
							<?php echo $page_heading; ?>
						</h2>
						<!-- #mainHomeSectionTitle -->

						<!-- desc -->
						<div class="desc mtop20">
							<?php echo $page_description; ?>
						</div>
						<!-- #desc -->

					</div>
					<!-- #headSectionTitle -->

					<!-- sectionContent -->
					<div class="sectionContent ohidden mtop40-ms mtop20-xs">

						<!-- vragen-wrap -->
						<div class="vragen-wrap vcenter">

							<!-- vragen-groupbox -->
							<div class="vragen-groupbox vcenter">

								<a class="mybutton mybutton-danger padwrap  -tshadow -normal" 
								   href="<?php echo $previous_thread_url; ?>">
									<?php echo $overview_button_text; ?>
								</a>

							</div>
							<!-- #vragen-groupbox -->

							<?php switch ( $page_layout ) :

									case 'children':

										include VRAGEN_LAYOUT_DIRECTORY . '/vragen-children.php';
										
										break;
									
									default:

										include VRAGEN_LAYOUT_DIRECTORY . '/vragen-self.php';
										
										break;

								endswitch; ?>

						</div>
						<!-- #vragen-wrap -->	

					</div>
					<!-- #sectionContent -->

				</div>
				<!-- #container -->	

			</div>
			<!-- #page-support-vragen-section -->

		</div>
		<!-- #container -->

	</div>
	<!-- #page-support-vragen -->
