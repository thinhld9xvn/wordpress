<?php $current_lang = qt_get_current_lang(); 	 
	  $contactform_options = get_option( 'section-contact-form_option_name' ); ?>

	<!-- footer -->
	<footer id="footer">

		<!-- container -->
		<div class="container">

			<!-- footMainBlock -->
			<div class="footMainBlock ohidden">

				<!-- footSectBlock -->
				<div class="footSectBlock col-md-7 col-sm-7 col-xs-12">

					<?php dynamic_sidebar( 'Footer Column One Sidebar' ); ?>

				</div>		
				<!-- footSectBlock -->

				<!-- footSectBlock -->
				<div class="footSectBlock col-md-5 col-sm-5 col-xs-12 padleft40-ms mtop20-xs">

					<?php dynamic_sidebar( 'Footer Column Two Sidebar' ); ?>

				</div>		
				<!-- footSectBlock -->

			</div>
			<!-- #footMainBlock -->
			
		</div>
		<!-- #container -->
		
	</footer>
	<!-- #footer -->

	<!-- orderFormModal -->
	<div id="orderFormModal" class="modal fade" role="dialog">

	  <!-- modal-dialog -->
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">

	    	<!-- modal-header -->
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Đặt hàng: <span></span></h4>
	      </div>
	      <!-- #modal-header -->

	      <!-- modal-body -->
	      <div class="modal-body">

	      	  <?php 	      	  
	      	  	$form_id = $contactform_options["contactform-order-{$current_lang}-id"];	      	  
	      	  	echo do_shortcode("[pvcf_contactform id='$form_id']"); ?>

	      </div>	      
	      <!-- #modal-body -->

	    </div>
	    <!-- #Modal content-->

	  </div>
	  <!-- #modal-dialog -->

	</div>
	<!-- #orderFormModal -->

</div>
<!-- #wrapper -->

<?php wp_footer() ?>

</body>
</html>