<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.0
 * 
 */
 ?>
		<footer id="footer" class="footer color-bg">
			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) { ?>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<?php $footertext = get_theme_mod('dealsdot_footer_text'); ?>
			<?php $paymentimage = get_theme_mod('dealsdot_footer_payment'); ?>
			<?php if($footertext || $paymentimage){ ?>
			<div class="copyright-bar white-bg">
				<div class="container">

					<?php if($footertext){ ?>
					  <div class="col-xs-12 col-sm-7 col-md-12 col-lg-7 del-info">
						<?php echo dealsdot_sanitize_data($footertext); ?>
					  </div>
					<?php } ?>
				  
					<div class="col-xs-12 col-sm-5 col-md-12 col-lg-5 no-padding">
						<?php if($paymentimage){ ?> 
							<div class="clearfix payment-methods">
								<ul>
									<?php foreach($paymentimage as $p){ ?> 
										<li><img src="<?php echo esc_url( wp_get_attachment_url($p['payment_image']) ); ?>" alt="<?php esc_attr_e('payment-image','dealsdot'); ?>"></li>
									<?php } ?>
					   
								</ul>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="copyright-bar">
				<div class="container">
					<?php $footersocial = get_theme_mod('dealsdot_footer_social'); ?>
					<?php if(!empty($footersocial)){ ?>
						<div class="col-xs-12 col-sm-12 no-padding social">
							<ul class="link">
								<?php foreach($footersocial as $f){ ?>
									<li class="<?php echo esc_attr($f['social_icon']); ?>"><a href="<?php echo esc_url($f['social_url']); ?>" target="_blank"> <i class="fa fa-<?php echo esc_attr($f['social_icon']); ?>"></i></a></li>
								<?php } ?>

							</ul>
						</div>
					<?php } ?>
					<div class="col-xs-12 col-sm-12 no-padding copyright"> 
						<?php if(get_theme_mod( 'dealsdot_copyright' )){ ?>
							<?php echo dealsdot_sanitize_data(get_theme_mod( 'dealsdot_copyright' )); ?>
						<?php } else { ?>
							<?php esc_html_e('Copyright 2020.KlbTheme . All rights reserved','dealsdot'); ?>
						<?php } ?>  
					</div>
				</div>
			</div>
		</footer>
	</div>

	<?php wp_footer(); ?>
	</body>
</html>