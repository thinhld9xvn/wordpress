<?php $contactform_options = get_option( 'section-contact-form_option_name' ); ?>

	<!-- footer -->
	<footer id="footer">		

		<?php 
			dynamic_sidebar( 'Partner Logo Column Sidebar' ); ?>

		<!-- footer-columns-sidebar -->
		<div class="footer-columns-sidebar bg_primary padtb20">

			<!-- container -->
			<div class="container">
				
				<?php 
					  dynamic_sidebar( 'Footer Column One Sidebar' );
					  dynamic_sidebar( 'Footer Column Two Sidebar' ); ?>

			</div>
			<!-- #container -->

		</div>
		<!-- #footer-columns-sidebar -->
		
	</footer>
	<!-- #footer -->

	<!-- orderFormModal -->
	<div id="orderFormModal" style="display:none;">

		<h3 class="modal-header">
			Đặt hàng sản phẩm: <span></span>
		</h3>

		<div class="modal-body">
	    	<?php echo do_shortcode( '[pvcf_contactform id="119"]' ); ?>
	    </div>

	</div>
	<!-- #orderFormModal -->	
		
</div>
<!-- #wrapper -->

<?php wp_footer(); ?>

</body>

</html>