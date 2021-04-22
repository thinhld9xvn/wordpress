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
		</footer>
	</div>

	<?php wp_footer(); ?>
	</body>
</html>