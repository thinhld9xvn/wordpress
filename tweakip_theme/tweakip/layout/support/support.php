<?php 
	$page_heading = get_post_meta( $post->ID, '_pt-field-support-heading-description', true ); 
	$page_description = get_post_meta( $post->ID, '_pt-field-support-small-description', true ); ?>
	
<!-- page-support -->
<div class="page-custom-fullwidth page-support">

	<!-- container -->
	<div class="container">

		<!-- headSectionTitle -->
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
		<!-- #headSectionTitle -->

		<!-- sectionContent -->
		<div class="sectionContent ohidden mtop60-ms mtop20-xs">

			<!-- three-columns-layout -->
			<div class="split-columns three-columns-layout diensten-layout" >

				<?php 

					$args = array(
							'post_type' => 'page',
							'child_of' => $post->ID,
							'hierarchical' => 0,
							'parent' => $post->ID,
							'sort_order' => 'asc',
							'sort_column' => 'post_date',
						);

					$child_pages = get_pages( $args );

					foreach ( $child_pages as $c_page ) : 

						$icon = get_post_meta( $c_page->ID, '_pt-field-support-child-icon', true ); 
					    $bg = get_post_meta( $c_page->ID, '_pt-field-support-child-background', true );
					    $description = get_post_meta( $c_page->ID, '_pt-field-support-child-description', true ); 

					    $c_page_layout = get_post_meta( $c_page->ID, '_pt-field-support-item-layout', true ); 

					    if ( 'hulp-op-afstand' === $c_page_layout ) : 

					    	$c_page_url = get_post_meta( $c_page->ID, '_pt-field-support-hulp-op-afstand-url', true );

					   	else :

							$c_page_url = get_page_link( $c_page );	   		

					    endif; ?>

						<!-- item-diensten -->
						<div class="item-layout item-diensten col-md-4 col-sm-6 col-xs-6"
							 style="background-image: url('<?php echo $bg; ?>')">

							<a class="padtb40-ms padtb20-xs" 
								href="<?php echo $c_page_url; ?>">		

								<!-- content-box -->
								<div class="content-box">

									<div class="diensten-icon" 
										 style="background-image: url('<?php echo $icon; ?>')">
									</div>

									<div class="caption mtop20">
										<strong><?php echo $c_page->post_title; ?></strong>
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

				<?php endforeach; ?>									

			</div>					
			<!-- #three-columns-layout -->

		</div>
		<!-- #sectionContent -->

	</div>
	<!-- #container -->

</div>
<!-- #page-support -->