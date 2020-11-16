<?php 	
    function shoppingcart_sc($args, $content) {
    	global $tp_options;
        ob_start(); ?> 
        
            <table class="shoppingcart display responsive nowrap" data-navig="jmyscart">								
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Thông số</th>
						<th>Đơn giá (VAT)</th>
						<th>Số lượng</th>
						<th>Thành tiền (VNĐ)</th>
						<th>Chức năng</th>
					</tr>
				</thead>								
				
				<tbody>
					
					<?php 
						$count = 1;
						
				    	$shoppingcart = new ShoppingCart;
				    	$carts = $shoppingcart->get_carts();
				    	
						foreach ( $carts as $cart1 ) : ?>
						
							<tr>
								<td>
									<?php echo $count; ?>	
								</td>
								<td>
									<?php echo $cart1->name; ?>
								</td>
								<td>
									<?php echo $cart1->spec; ?>
								</td>
								<td>
									<?php echo number_format( $cart1->price, 0, ',', '.' ); ?>
								</td>
								<td>
									<input style="width: 60px" class="form-control quantity" data-index="0" type="number" min="1" name="quantity" value="<?php echo $cart1->quantity; ?>" />
								</td>
								<td>
									<?php echo number_format( $shoppingcart->getTotalCart( $cart1 ), 0, ',', '.' ); ?>
								</td>
								<td>
									<input type="button" data-index="0" class="btn btn-success btnUpdateCart" value="Cập nhật" />											
									<input type="button" data-index="0" class="btn btn-danger btnRemoveCart" value="Xóa" />
								</td>
							</tr>
							
							<?php $count++; ?>
							
					<?php endforeach; ?>
					
					
				</tbody>
				
			</table>
			
			<?php if ( sizeof ( $carts ) > 0 ) : ?>

				<div class="shoppingcart-customdisplay">
			
					<div class="mtop20">
						
						<strong>Tổng tiền (đã bao gồm VAT): </strong>
						<strong class="red">
							<span class="totalPriceCarts"><?php echo number_format( $shoppingcart->getTotalCarts( $carts ), 0, ',', '.');  ?></span> VNĐ
						</strong>
						
					</div>		

					<p class="mtop20">					
						<?php echo $tp_options['shoppingcart-message']; ?>
					</p>		

					<div class="cform-dathang mtop20">
						<?php echo do_shortcode('[pvcf_contactform id="2144"]'); ?>
					</div>

				</div>
				
			<?php endif; ?>			
			
		<?php 
		    $content = ob_get_contents();
		    ob_end_clean();
		    return $content; ?>
        
    
<?php }
    add_shortcode('shopping_cart','shoppingcart_sc');  
?>