<?php 
	$global_options = get_option('section-global_option_name'); ?>

<!DOCTYPE html>

<html style="display: none" lang="vi">

<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title><?= $global_options['global-site-title-id'] ? $global_options['global-site-title-id'] : ''  ?></title>

    <meta name="description" content="<?= $global_options['global-site-description-id'] ? strip_tags( $global_options['global-site-description-id'] ) : ''  ?>">
    <meta name="keywords" content="<?= $global_options['global-site-keywords-id'] ? strip_tags( $global_options['global-site-keywords-id'] ) : ''  ?>">
    <meta name="robots" content="<?= $global_options['global-site-robots-id'] ? strip_tags( $global_options['global-site-robots-id'] ) : 'noodp,index,follow'  ?>" />

    <meta name='revisit-after' content='<?= $global_options['global-site-revisit-after-id'] ? strip_tags( $global_options['global-site-revisit-after-id'] ) : '1 days'  ?>' />

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <?= $global_options['global-site-google-analytics-id'] ? $global_options['global-site-google-analytics-id'] : '' ?>

    <script type="text/javascript">

        var jspath = "<?php echo get_template_directory_uri() ?>/js",
        	jshoppingcart = []; // đối tượng này lưu trữ thông tin tất cả 
								// sản phẩm mà khách hàng đã thêm vào 
								// trong giỏ hàng hiện tại

    </script>

	<?php wp_head(); ?> 


</head>

<body>

    <?php 
    	  $header_options = get_option('section-header_option_name');
    	  $sc_options = get_option('section-shoppingcart_option_name');

	      $shoppingcart = new ShoppingCart;
	      $carts = $shoppingcart->get_carts(); ?>
    	
    <script>
    	<?php if ( sizeof( $carts ) > 0 ) : ?>
	    	jshoppingcart = <?php echo json_encode( $carts, JSON_UNESCAPED_UNICODE ); ?>;
	    <?php endif; ?>
    </script>
    
    <!-- wrapper -->
    <div id="wrapper">

      	<!-- header -->
		<header id="header">			

			<!-- hgtop -->
			<div class="hgtop bg-head padtb10-ms padtb5-xs">

				<!-- container -->
				<div class="container">

					<!-- logo -->
					<div class="logo pull-left">

						<a href="<?php echo bloginfo('url') ?>">
							<img src="<?php echo $header_options['logo-image-id'] ?>" alt="logo" />
						</a>

					</div>
					<!-- #logo -->
					
					<?php dynamic_sidebar('Header Slogun Sidebar'); ?>

					<!-- shoppingcart -->
					<div class="shoppingcart p_relative mtop20-md mtop20-sm pull-right">						

						<a class="caption" href="<?php echo get_page_link( $sc_options['shoppingcart-select-id'] ); ?>">
							<img src="<?php echo $sc_options['shoppingcart-icon-id'] ?>" alt="shoppingcart" />
							<span class="cushidden-xs">Gioû haøng</span> (<span class="numcart"><?php echo sizeof( $carts ) ?></span>)
						</a>
						
						<!-- jshopcartlist -->
						<div class="jshopcartlist">

							<table 
								<?php if ( sizeof( $carts ) > 0 ) : ?>
									class="--hasCart"
								<?php endif; ?>>
								
								<thead>
									<tr>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
									</tr>
								</thead>
								<tbody>
									<tr class="empty">
										<td colspan="2">
											<div class="tcenter">Chưa có sản phẩm nào trong giỏ hàng.</div>
										</td>
									</tr>
									
									<?php
										foreach ( $carts as $cart1 ) : ?>
										
											<tr class="p<?php echo $cart1->index ?>">
												<td>
													<?php echo $cart1->name; ?>
												</td>
												<td class="quantity">
													<?php echo $cart1->quantity; ?>
												</td>
											</tr>
									
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>
						<!-- #jshopcartlist -->

					</div>
					<!-- #shoppingcart -->
					
					<?php dynamic_sidebar('Header Contact Sidebar'); ?>
				
					<!-- m-menu -->
					<div class="menu m-menu hidden-lg hidden-md hidden-sm">										

						<div class="m-menuicon tcenter">
							<span class="fa fa-navicon"></span>
						</div>
						
						<?php 
							$args = array(
								'theme_location' => 'primary',
								'menu_class' => 'm-mainmenu'
							);
						
							wp_nav_menu( $args );
						?>

					</div>
					<!-- #m-menu -->		

				</div>
				<!-- #container -->

			</div>
			<!-- #hgtop -->	

			<!-- hgsecond -->
			<div class="hgsecond hidden-xs">				

				<!-- menu -->
				<div id="menu" class="menu shown-lap">

					<!-- container -->
					<div class="container">

						<?php 
							$args = array(
								'theme_location' => 'primary'
							);
						
							wp_nav_menu( $args );
						?>

					</div>
					<!-- #container -->

				</div>
				<!-- #menu -->		

				<!-- m-menu -->
				<div class="menu m-menu shown-mb">										

					<div class="m-menuicon tcenter">
						<span class="fa fa-navicon"></span>
						Main Menu
					</div>

					<?php 
						$args = array(
							'theme_location' => 'primary',
							'menu_class' => 'm-mainmenu'
						);
					
						wp_nav_menu( $args );
					?>						

				</div>
				<!-- #m-menu -->			

			</div>
			<!-- #hgsecond -->

			<!-- hgthird -->
			<div class="hgthird">

				<div class="slider">

					<?php 
						dynamic_sidebar( 'Slider Sidebar' );
					?>
					
				</div>

			</div>
			<!-- #hgthird -->

		</header>
		<!-- #header -->