	<!-- four-columns-layout -->
	<div class="split-columns four-columns-layout" data-navig="compactcontent" data-multiple="false" data-object=".product" data-setcompact=".title > a" data-numCharOnIpad="100" data-numCharOnMobile="30" data-endShortContent="..." data-delimiter-css-property="clear" data-delimiter-css-value="both">

		<?php 
			$args = array(

				'post_type' => 'post',
				'category__in' => get_query_var('cat'),
				'order' => 'desc',
				'orderby' => 'date',
				'posts_per_page' => 20,
				'paged' => $paged

			);
			query_posts( $args );

			if ( have_posts() ) :

				while ( have_posts() ) : the_post(); ?>

				<!-- product -->
				<div class="item-layout product col-md-3 col-sm-6 col-xs-6">

					<!-- thumb -->
					<div class="p_relative thumb">

						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'theme-feature-image-carousel-news' ) ?>
						</a>

						<div class="sale">
							Sale
						</div>

					</div>
					<!-- #thumb -->

					<!-- content -->
					<div class="article-content mtop10">

						<!-- title -->
						<div class="title">

							<a class="block bold" data-originalContent="<?php echo title(100); ?>" href="<?php the_permalink(); ?>">
								<?php echo title(100); ?>
							</a>

						</div>
						<!-- #title -->											

						<div class="details mtop20 pull-right">
							<a href="<?php the_permalink(); ?>">Xem tiếp ...</a>
						</div>

					</div>
					<!-- #content -->

				</div>
				<!-- #product -->					

		<?php 	endwhile; 

			else : ?>

				<div class="article-empty tcenter">
					<strong>Không có sản phẩm nào trong mục này.</strong>
				</div>

	  <?php endif; ?>

	</div>
	<!-- #two-columns-mobile-layout -->

</div>
<!-- articlesFirstShow -->

<div class="clearfix"></div>

<?php wp_page_navigation();
	  wp_reset_query(); ?>