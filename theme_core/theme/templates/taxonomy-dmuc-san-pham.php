<?php 
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	$taxonomy_slug = get_query_var('taxonomy');
    $taxonomy = get_taxonomy( $taxonomy_slug );

    $term = get_term_by( 'slug', get_query_var('term'), $taxonomy_slug );

    $post_type = $taxonomy->object_type[0];    
    $post_type_obj = get_post_type_object( $post_type ); 

    $args = array(

        'post_type' => $post_type,
        'order' => 'desc',
        'orderby' => 'date',
        'tax_query' => array(

         	array(
         		'taxonomy' => $taxonomy_slug,
         		'field' => 'id',
         		'terms' => array( $term->term_id )
         	)

        ),         
        'paged' => $paged

    ); 

    query_posts( $args ); ?>

<!-- main -->
<section id="main">	

	<!-- breadcumbs -->
	<div id="breadcumbs">

		<!-- container -->
		<div class="container">

			<?php
				the_breadcrumbs('_breadcumbs', '_breadcumbs', 'Trang chủ', '<span class="divide"></span>'); ?>	

		</div>
		<!-- #container -->

	</div>
	<!-- #breadcumbs -->

	<!-- categorySPSection -->
	<div class="pageSection categorySPSection">

		<!-- container -->
		<div class="container">

			<!-- spHeadingTitle -->
			<h2 class="spHeadingTitle">

				<span><?php echo $term->name; ?></span>

			</h2>
			<!-- #spHeadingTitle -->

			<?php if ( have_posts() ) : ?>

				<!-- sectionMainContent -->
				<div class="sectionMainContent sp-hfeatured-box ohidden mtop20"
					 data-navig="compactcontent" 
					 data-multiple="false"
					 data-object=".product" 
					 data-setcompact=".title > a" 
					 data-numCharOnIpad="40" 
					 data-numCharOnMobile="30" 
					 data-endShortContent="..." 
					 data-delimiter-css-property="clear" 
					 data-delimiter-css-value="both">

					<?php while ( have_posts() ) : the_post();

							$opcode = get_post_meta( get_the_id(), '_pt-field-sp-opcode', true );
							$tskt = get_post_meta( get_the_id(), '_pt-field-sp-tskt', true );
							$price = get_post_meta( get_the_id(), '_pt-field-sp-price', true );

							$price = ! empty( $price ) && $price !== '0' ? number_format( $price, 0, ',', '.' ) . ' đ' : 'Liên hệ'; ?>

							<!-- product -->
							<div class="product">

								<!-- thumbnail -->
								<div class="thumbnail">

									<!-- thumbnail-wrap -->
									<div class="thumbnail-wrap ohidden">

										<a href="<?php the_permalink(); ?>">

											<?php 
												the_post_thumbnail('full'); ?>

										</a>

									</div>
									<!-- #thumbnail-wrap -->			

								</div>
								<!-- #thumbnail -->

								<!-- title -->
								<h4 class="title tcenter">

									<a class="block" 
									   href="<?php the_permalink(); ?>"
									   data-originalContent="<?php echo title(100) ?>">
										<?php echo title(100) ?>
									</a>

								</h4>
								<!-- #title -->

								<!-- opcode -->
								<div class="opcode tcenter mtop5">

									Mã sản phẩm: <strong><?php echo $opcode; ?></strong>
									
								</div>
								<!-- #opcode -->

								<!-- price -->
								<div class="price tcenter mtop5">

									Giá tiền: <strong><?php echo $price; ?></strong>
									
								</div>
								<!-- #price -->

								<!-- inside -->
								<div class="inside">

									<?php echo $tskt ?>														

									<p class="mtop20">

										<a class="details" 
										   href="<?php the_permalink(); ?>">

											<span class="fa fa-plus"></span>
											<span class="padleft10">Chi tiết</span>

										</a>

									</p>
									
								</div>
								<!-- #inside -->
								
							</div>
							<!-- #product -->

					<?php endwhile; ?>
					
				</div>
				<!-- #sectionMainContent -->

			<?php endif; 
				wp_reset_query(); ?>
			
		</div>
		<!-- #container -->
		
	</div>
	<!-- #categorySPSection -->

</section>
<!-- #main -->