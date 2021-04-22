<?php

/**
 * woocommerce-page.php
 * @package WordPress
 * @subpackage dealsdot
 * @since dealsdot 1.0
 * 
 */

?>

<?php get_header(); ?>

<?php $breadcrumb = get_theme_mod('dealsdot_shop_breadcrumb','1'); ?>

<?php if($breadcrumb == '1'){ ?>
	<div class="page-heading">
		<?php if(is_product_category()){ ?>
			<?php woocommerce_breadcrumb(); ?>
		<?php } elseif(is_search()){ ?>
			<div class="breadcrumb product-search">
				<div class="container">
					<div class="breadcrumb-inner">
						<h2><?php printf( esc_html__( 'Search Results for: %s', 'dealsdot' ), get_search_query() ); ?></h2>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<?php woocommerce_breadcrumb(); ?>
		<?php } ?>
	</div>
<?php } else { ?>
	<div class="empty-klb"></div>
<?php } ?>

<div class="body-content outer-top-ts">
	<div class='container'>
		<div class='row'>
			<?php if( get_theme_mod( 'dealsdot_shop_layout' ) == 'full-width') { ?>
				<div class="col-sm-12">
					<?php $banner = get_theme_mod('shop_banner_image'); ?>
					<?php $bannertitle = get_theme_mod('shop_banner_title'); ?>
					<?php $bannersubtitle = get_theme_mod('shop_banner_subtitle'); ?>
					<?php $bannercontent = get_theme_mod('shop_banner_content'); ?>
					<?php $bannerbuttontext = get_theme_mod('shop_banner_button_text'); ?>
					<?php $bannerbuttonurl = get_theme_mod('shop_banner_button_url'); ?>
					<?php if($banner){ ?>
					<div id="category" class="category-carousel hidden-xs">
						<div class="item">
							<div class="image"> <img src="<?php echo esc_url(wp_get_attachment_url($banner)); ?>" alt="<?php echo esc_attr($bannertitle); ?>" class="img-responsive"> </div>
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text"> <?php echo esc_html($bannertitle); ?> </div>
									<div class="excerpt hidden-sm hidden-md"> <?php echo esc_html($bannersubtitle); ?> </div>
									<div class="excerpt-normal hidden-sm hidden-md"> <?php echo esc_html($bannercontent); ?> </div>
									<div class="buy-btn"><a href="<?php echo esc_url($bannerbuttonurl); ?>" class="lnk btn btn-primary"><?php echo esc_html($bannerbuttontext); ?></a></div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php woocommerce_content(); ?>
				</div>
			<?php } elseif( get_theme_mod( 'dealsdot_shop_layout' ) == 'right-sidebar') { ?>
				<div class="col-sm-9">
					<?php $banner = get_theme_mod('shop_banner_image'); ?>
					<?php $bannertitle = get_theme_mod('shop_banner_title'); ?>
					<?php $bannersubtitle = get_theme_mod('shop_banner_subtitle'); ?>
					<?php $bannercontent = get_theme_mod('shop_banner_content'); ?>
					<?php $bannerbuttontext = get_theme_mod('shop_banner_button_text'); ?>
					<?php $bannerbuttonurl = get_theme_mod('shop_banner_button_url'); ?>
					<?php if($banner){ ?>
					<div id="category" class="category-carousel hidden-xs">
						<div class="item">
							<div class="image"> <img src="<?php echo esc_url(wp_get_attachment_url($banner)); ?>" alt="<?php echo esc_attr($bannersubtitle); ?>" class="img-responsive"> </div>
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text"> <?php echo esc_html($bannertitle); ?> </div>
									<div class="excerpt hidden-sm hidden-md"> <?php echo esc_html($bannersubtitle); ?> </div>
									<div class="excerpt-normal hidden-sm hidden-md"> <?php echo esc_html($bannercontent); ?> </div>
									<div class="buy-btn"><a href="<?php echo esc_url($bannerbuttonurl); ?>" class="lnk btn btn-primary"><?php echo esc_html($bannerbuttontext); ?></a></div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php woocommerce_content(); ?>
				</div>
				<div class="col-sm-3 klb-sidebar sidebar">
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					<?php } ?> 
				</div>
			<?php } else { ?>
				<div class="col-sm-9 col-sm-push-3">
					<?php $categorybanner = get_theme_mod('shop_banner_each_category'); ?>
					<?php if($categorybanner && array_search(get_queried_object()->term_id, array_column($categorybanner, 'category_id')) !== false){ ?>
						<?php foreach($categorybanner as $c){ ?>

							<?php if($c['category_id'] == get_queried_object()->term_id){ ?>
								<div id="category" class="category-carousel hidden-xs">
									<div class="item">
										<div class="image"> <img src="<?php echo esc_url(wp_get_attachment_url($c['category_image'])); ?>" alt="<?php echo esc_attr($c['category_title']); ?>" class="img-responsive"> </div>
										<div class="container-fluid">
											<div class="caption vertical-top text-left">
												<div class="big-text"> <?php echo esc_html($c['category_title']); ?> </div>
												<div class="excerpt hidden-sm hidden-md"> <?php echo esc_html($c['category_subtitle']); ?> </div>
												<div class="excerpt-normal hidden-sm hidden-md"> <?php echo esc_html($c['category_content']); ?> </div>
												<?php if($c['category_button_text']){ ?>
												<div class="buy-btn"><a href="<?php echo esc_url($c['category_button_url']); ?>" class="lnk btn btn-primary"><?php echo esc_html($c['category_button_text']); ?></a></div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					<?php } else { ?>
						<?php $banner = get_theme_mod('shop_banner_image'); ?>
						<?php $bannertitle = get_theme_mod('shop_banner_title'); ?>
						<?php $bannersubtitle = get_theme_mod('shop_banner_subtitle'); ?>
						<?php $bannercontent = get_theme_mod('shop_banner_content'); ?>
						<?php $bannerbuttontext = get_theme_mod('shop_banner_button_text'); ?>
						<?php $bannerbuttonurl = get_theme_mod('shop_banner_button_url'); ?>
						<?php if($banner){ ?>
						<div id="category" class="category-carousel hidden-xs">
							<div class="item">
								<div class="image"> <img src="<?php echo esc_url(wp_get_attachment_url($banner)); ?>" alt="<?php echo esc_attr($bannertitle); ?>" class="img-responsive"> </div>
								<div class="container-fluid">
									<div class="caption vertical-top text-left">
										<div class="big-text"> <?php echo esc_html($bannertitle); ?> </div>
										<div class="excerpt hidden-sm hidden-md"> <?php echo esc_html($bannersubtitle); ?> </div>
										<div class="excerpt-normal hidden-sm hidden-md"> <?php echo esc_html($bannercontent); ?> </div>
										<?php if($bannerbuttontext){ ?>
										<div class="buy-btn"><a href="<?php echo esc_url($bannerbuttonurl); ?>" class="lnk btn btn-primary"><?php echo esc_html($bannerbuttontext); ?></a></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					<?php } ?>
					
					<?php woocommerce_content(); ?>
				</div>
				<div class="col-sm-3 col-xs-12 col-sm-pull-9 klb-sidebar sidebar">
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					<?php } ?> 
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>