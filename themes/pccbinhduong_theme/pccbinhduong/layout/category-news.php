<!-- articlesBoxLayout -->
<div class="articlesBoxLayout boxCatNews ohidden mtop20">

	<!-- two-columns-layout -->
	<div class="split-columns two-columns-layout">

		<div class="item-layout col-md-3 col-sm-3 col-xs-12">

			<?php dynamic_sidebar('ColLeft News Sidebar') ?>
			
		</div>

		<div class="col-right item-layout boxColumnHBorder --left --top pad20-ms col-md-9 col-sm-9 col-xs-12 pull-right">

			<!-- articlesFirstShow -->
			<div class="articlesFirstShow col-xs-12">

				<!-- four-columns-layout -->
				<div class="split-columns two-columns-mobile-layout" 
					data-navig="compactcontent" data-multiple="true" 
					data-object=".article" data-setcompact=".title > a, .excerpt" 
					data-numCharOnIpad="100, 100" data-numCharOnMobile="30, 50" 
					data-endShortContent="..., [...]" data-delimiter-css-property="clear" 
					data-delimiter-css-value="both">

					<?php 
						$args = array(

							'post_type' => 'post',
							'category__in' => get_query_var('cat'),
							'order' => 'desc',
							'orderby' => 'date',
							'posts_per_page' => 5,
							'paged' => $paged

						);
						query_posts( $args );

						if ( have_posts() ) :

							while ( have_posts() ) : the_post(); ?>

							<!-- product -->
							<div class="item-layout article pad20-md">

								<!-- thumb -->
								<div class="article-thumb col-md-5 col-sm-5 col-xs-12">

									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'theme-feature-image-news' ) ?>
									</a>									

								</div>
								<!-- #thumb -->

								<!-- content -->
								<div class="article-content padleft10-ms mtop20-xs col-md-7 col-sm-7 col-xs-12">

									<!-- title -->
									<div class="title">

										<a class="block bold" data-originalContent="<?php echo title(100); ?>" href="<?php the_permalink(); ?>">
											<?php echo title(100); ?>
										</a>

									</div>
									<!-- #title -->		

									<!-- excerpt -->
									<div class="excerpt mtop10" data-originalContent="<?php echo excerpt(200); ?>">
										<?php echo excerpt(200); ?>
									</div>
									<!-- #excerpt -->									

									<!-- details -->
									<div class="details mtop20 pull-right">
										<a href="<?php the_permalink(); ?>">Xem tiếp ...</a>
									</div>
									<!-- #details -->

								</div>
								<!-- #content -->

							</div>
							<!-- #product -->					

					<?php 	endwhile; 

						else : ?>

							<div class="article-empty tcenter">
								<strong>Không có dữ liệu gì trong mục này.</strong>
							</div>

				  <?php endif; ?>

				</div>
				<!-- #two-columns-mobile-layout -->

			</div>
			<!-- articlesFirstShow -->

			<div class="clearfix"></div>

			<?php wp_page_navigation();
				  wp_reset_query(); ?>

		</div>

	</div>
	<!-- #two-columns-layout -->

</div>
<!-- #articlesBoxLayout -->