		<!-- footer -->
		<footer id="footer">

			<!-- footer-row -->
			<div class="footer-row">

				<!-- container -->
				<div class="container">

					<!-- four-columns-layout -->
					<div class="split-columns four-columns-layout">

						<?php 
							dynamic_sidebar( 'Footer Column One Sidebar' );
							dynamic_sidebar( 'Footer Column Two Sidebar' );
							dynamic_sidebar( 'Footer Column Three Sidebar' );
							dynamic_sidebar( 'Footer Column Four Sidebar' ); ?>

					</div>
					<!-- #four-columns-layout -->
					
				</div>
				<!-- #container -->

			</div>
			<!-- #footer-row -->

			<!-- footer-row -->
			<div class="footer-row">

				<!-- container -->
				<div class="container">

					<?php dynamic_sidebar('Footer Copyright Sidebar'); ?>
					
				</div>
				<!-- #container -->
				
			</div>
			<!-- #footer-row -->
			
		</footer>
		<!-- #footer -->	
		
	</div>
	<!-- #wrapper -->	
	
	<?php wp_footer(); ?>

	<!-- modalOrderForm -->
	<div id="modalOrderForm" style="display:none;">

		<h3 class="modal-header">Đặt hàng sản phẩm</h3>

		<div class="modal-body">

			<?php echo do_shortcode('[pvcf_contactform id="67"]'); ?>
	    	
	    </div>

	</div>
	<!-- #modalOrderForm -->

</body>

</html>