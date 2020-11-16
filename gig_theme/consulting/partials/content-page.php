<?php
$vc_status = get_post_meta( get_the_ID(), '_wpb_vc_js_status', true );
$is_shop   = false;
if ( ( function_exists( 'is_cart' ) && is_cart() ) || ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product' ) && is_product() ) || ( function_exists( 'is_account_page' ) && is_account_page() ) || ( function_exists( 'is_checkout' ) && is_checkout() ) ) {
	$is_shop = true;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php if ( $vc_status != 'false' && $vc_status == true || $is_shop ) { ?>
			<?php the_content(); ?>
		<?php } else { ?>
			<div class="text_block wpb_text_column clearfix">
				<?php the_content(); ?>
			</div>
		<?php } ?>
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'consulting' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'consulting' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div>
	<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	?>

</article>

<?php //if ( ! is_page() ) : ?>

	<!--<div class="related_posts widget">

		<?php	

			/*global $post;
			
			$cat_id = get_query_var('cat'); 

			$categories = get_the_category(); 
			$cat = $categories[0]; 

			$args = array(

				'post_type' => 'post',
				'category__in' => $cat->term_id,
				'post__not_in' => array( $post->ID ),						
				'posts_per_page' => 3

			);

		    query_posts( $args ); */?>

		<div class="widget_title">
			Bài viết liên quan
		</div>

		<div class="row content-area posts_list_container">

			<?php //if ( have_posts() ) : ?>
			
				<div class="posts_grid with_sidebar">

					<ul class="post_list_ul">

						<?php //while ( have_posts() ) : the_post(); ?>

							<li id="<?php //echo 'post-' . get_the_id() ?>" class="<?php //echo 'post-' . get_the_id() ?> post type-post status-publish format-standard has-post-thumbnail hentry">

								<div class="post_thumbnail">

									<a href="<?php //the_permalink(); ?>">

										<?php //the_post_thumbnail( 'consulting-image-350x250-croped' ); ?>

									</a>

								</div>

								<h5>

									<a href="<?php //the_permalink(); ?>">
										<?php //echo title(60); ?>										
									</a>

								</h5>

								<div class="post_date">

									<i class="fa fa-clock-o"></i> 

									<?php //echo get_the_date('d F, Y'); ?>

								</div>

							</li>

						<?php //endwhile; ?>
					    
					</ul>
					
				</div>

			<?php //endif; ?>	

		</div>

		<?php //wp_reset_query(); ?>
		
	</div>-->

	<!--<style required="true">
		.vc_row.wpb_row {
			margin-bottom: 0 !important;
		}

		.widget {
			margin-bottom: 0 !important;
		}

		.related_posts .widget_title {
			border-color: #fff;
		}
	</style>-->

<?php //endif; ?>