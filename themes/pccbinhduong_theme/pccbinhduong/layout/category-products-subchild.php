	<!-- two-columns-mobile-layout -->
	<div class="split-columns two-columns-mobile-layout"
		data-navig="compactcontent" data-multiple="true" 
		data-object=".article" data-setcompact=".title > a, .excerpt" 
		data-numCharOnIpad="100, 100" data-numCharOnMobile="30, 50" 
		data-endShortContent="..., [...]" data-delimiter-css-property="clear" 
		data-delimiter-css-value="both">

	<?php	
		foreach ( $categories as $category ) : 

			$options = get_option( 'category_' . $category->term_id );			
			$thumb_id = pn_get_attachment_id_from_url( $options['cat-metabox-avatar-category'] ); ?>

			<!-- subcat -->
			<div class="item-layout article subcat pad20-md">

				<!-- thumb -->
				<div class="article-thumb col-md-5 col-sm-5 col-xs-12">

					<a href="<?php echo get_category_link( $category ); ?>" href="<?php echo get_category_link( $category ); ?>">
						<?php echo wp_get_attachment_image( $thumb_id, 'theme-feature-image-news' ); ?>
					</a>									

				</div>
				<!-- #thumb -->

				<!-- content -->
				<div class="article-content padleft10-ms mtop20-xs col-md-7 col-sm-7 col-xs-12">

					<!-- title -->
					<div class="title">

						<a class="block bold" data-originalContent="<?php echo short_text( $category->name, 100 ); ?>" href="<?php echo get_category_link( $category ); ?>">
							<?php echo short_text( $category->name, 100 ); ?>
						</a>

					</div>
					<!-- #title -->		

					<!-- excerpt -->
					<div class="excerpt mtop10" data-originalContent="<?php echo short_text( $category->description, 200 ); ?>">
						<?php echo short_text( $category->description, 200 ); ?>
					</div>
					<!-- #excerpt -->									

					<!-- details -->
					<div class="details mtop20 pull-right">
						<a href="<?php echo get_category_link( $category ); ?>">Xem tiếp ...</a>
					</div>
					<!-- #details -->

				</div>
				<!-- #content -->

			</div>
			<!-- #subcat -->					

	<?php 	endforeach; ?>

	</div>
	<!-- #two-columns-mobile-layout -->

</div>
<!-- #articlesFirstShow -->