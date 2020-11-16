<?php 
    $post_type = get_query_var('post_type');    
    $post_type_obj = get_post_type_object( $post_type ); 

    $args = array(

        'post_type' => $post_type,
        'posts_per_page' => 1        

    ); 

    query_posts( $args ); ?>

<!-- main -->
<section id="main">	

	<!-- breadcumbs -->
	<div id="breadcumbs">

		<!-- container -->
		<div class="container">

			<?php
				the_breadcrumbs('_breadcumbs', 
								'_breadcumbs', 
								'Trang chủ', 
								'<span class="divide"></span>'); ?>	

		</div>
		<!-- #container -->

	</div>
	<!-- #breadcumbs -->

	<!-- pageSection -->
	<div class="pageSection">

		<!-- container -->
		<div class="container">

			<!-- headingPgTitle -->
			<h2 class="headingPgTitle">

				<?php echo $post_type_obj->label; ?>
				
			</h2>
			<!-- #headingPgTitle -->

			<!-- pageContent -->
			<div class="pageContent defFormat fixed-object mtop20">

				<?php

					if ( have_posts() ) :

						while ( have_posts() ) : the_post();

							$catalogues = get_post_meta( get_the_id(), '_pt-field-catalogue-catalogues', true ); ?> 

							<table>

								<tbody>

									<?php foreach ( $catalogues as $catalogue ) : ?>

										<tr>

											<td>
												<?php echo $catalogue['title']  ?>
											</td>

											<td>
												<a target="_blank"
												   href="<?php echo $catalogue['thumbnail']  ?>">
												   Xem
												</a>

												<a target="_blank"
												   class="padleft10"
												   href="<?php echo $catalogue['thumbnail']  ?>"
												   download>
												   <span class="fa fa-download"></span>
												</a>
											</td>

										</tr>

									<?php endforeach; ?>

								</tbody>

							</table>

				<?php
						endwhile;

					endif; 

					wp_reset_query(); ?>
				

			</div>
			<!-- #pageContent -->			
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #pageSection -->

</section>
<!-- #main -->

<style type="text/css">

	table, 
	tr, 
	td, 
	th {
		border-color: #ccc !important;
	}

</style>