<?php

	$thumb = get_post_meta( $post->ID, '_pt-field-san-pham-large-avatar', true );

	$thumb_id = pn_get_attachment_id_from_url( $thumb );

	$thumb_tag = wp_get_attachment_image( $thumb_id, 'theme-feature-image-product' ); 

	$bang_dssp = get_post_meta( $post->ID, '_pt-field-san-pham-bang-ds', true ); ?>
	
	<!-- container -->
	<div class="container">
		
		<!-- home-cblockquote -->
		<div class="home-cblockquote main-columns-layout padtb2per col-xs-12">

			<!-- column left -->
			<div class="column left bg_white pad5 col-md-3 col-sm-3 col-xs-12">

				<?php dynamic_sidebar('ColLeft Sidebar'); ?>

			</div>
			<!-- #colleft -->

			<!-- colright -->
			<div class="column right bg_white pad15 col-md-8 col-sm-8 col-xs-12 pull-right">	
			
				<h3 class="hg-title --double-border --double-active-border">
					<?php echo $post->post_title; ?>
				</h3>	

				<!-- sp-details -->
				<div class="sp-details mtop20">

					<!-- sp-thumb -->
					<div class="sp-thumb col-md-3 col-sm-3 col-xs-12">
						<?php echo $thumb_tag; ?>
					</div>
					<!-- #sp-thumb -->

					<!-- sp-content -->
					<div class="sp-content padleft20-ms mtop20-xs col-md-9 col-sm-9 col-xs-12">

						<h3>
							<strong><?php echo $post->post_title; ?></strong>
						</h3>

						<!-- gt -->
						<div class="gt mtop10">
							<?php echo apply_filters('the_content', $post->post_content); ?>
						</div>
						<!-- #gt -->

					</div>
					<!-- #sp-content -->
					
					<div class="clearfix"></div>

					<!-- sp-table -->
					<div class="sp-table mtop20 col-xs-12" data-navig="jtablecart">
						
						<?php echo wpautop( $bang_dssp ); ?>
					
					</div>
					<!-- #sp-table -->

				</div>			
				<!-- #sp-details -->
				
			</div>
			<!-- #colright -->
			
		</div>
		<!-- #home-cblockquote -->

	</div>
	<!-- #container -->
		
</section>
<!-- #main -->

<?php $sc_options = get_option('section-shoppingcart_option_name'); ?>
	
<!-- AddToCartSuccessModal -->
<div id="AddToCartSuccessModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">		       
        <h4 class="modal-title">Thông báo</h4>
      </div>
      <div class="modal-body">
        <p>Bạn đã thêm sản phẩm vào giỏ hàng thành công ! Bạn muốn làm gì tiếp theo ?</p>
      </div>
      <div class="modal-footer">
        <button onclick="window.location='<?php echo get_page_link( $sc_options['shoppingcart-select-id'] ); ?>'" type="button" class="btn btn-success">Vào giỏ hàng</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Ở lại trang</button>
      </div>
    </div>

  </div>
</div>
<!-- #AddToCartSuccessModal -->

<!-- UpdatingCartToServerModal -->
<div id="UpdatingCartToServerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">		       
       	<h4 class="modal-title">Đang cập nhật giỏ hàng ...</h4>
      </div>
      <div class="modal-body">
        <p class="tcenter">
        	<img class="ajax_loading" src="<?php echo get_template_directory_uri() ?>/images/ajax-shoppingcart-adding.png" alt="ajax-shoppingcart-adding" />
        </p>
      </div>
      <div class="modal-footer">        
      </div>
    </div>

  </div>
</div>
<!-- #UpdatingCartToServerModal -->

<?php get_footer() ?>