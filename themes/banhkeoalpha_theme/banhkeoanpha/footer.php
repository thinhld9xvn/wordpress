<?php $contactform_options = get_option( 'section-contact-form_option_name' ); ?>

	<!-- footer -->
	<footer id="footer" class="bg_primary padtb20">

		<!-- container -->
		<div class="container">

			<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
			
		</div>
		<!-- #container -->
		
	</footer>
	<!-- #footer -->

	<!-- modalOrderForm -->
	<div id="modalOrderForm" style="display:none;">

		<h3 class="modal-header">Đặt hàng sản phẩm</h3>

		<div class="modal-body">
	    	
	    </div>

	</div>
	<!-- #modalOrderForm -->

	<a class="scrollToTop" href="#"></a>

</div>
<!-- #wrapper -->

<?php wp_footer() ?>

</body>
</html>