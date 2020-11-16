<?php global $post; 

	$cat = get_the_category();
	$cat = $cat[0];

	while ( $cat->parent > 0 ) :
		$cat = get_category( $cat->parent );
	endwhile; ?>

<!-- articlesBoxLayout -->
<div class="articlesBoxLayout boxCatNews ohidden mtop20">

	<!-- two-columns-layout -->
	<div class="split-columns two-columns-layout">

		<div class="item-layout col-md-3 col-sm-3 col-xs-12">

			<?php dynamic_sidebar( 'ColLeft News Sidebar' ); ?>

		</div>

		<div class="col-right item-layout boxColumnHBorder --left --top pad20-ms col-md-9 col-sm-9 col-xs-12 pull-right">

			<!-- boxNewsDetails -->
			<div class="boxNewsDetails col-xs-12">

				<h3 class="uppercase">
					<strong><?php the_title(); ?></strong>
				</h3>

				<!-- boxNewsDtContents -->
				<div class="boxNewsDtContents mtop20">
					<?php echo apply_filters( 'the_content', $post->post_content ); ?>
				</div>
				<!-- #boxNewsDtContents -->
				
			</div>
			<!-- #boxNewsDetails -->

		</div>

	</div>
	<!-- #two-columns-layout -->

</div>
<!-- #articlesBoxLayout -->