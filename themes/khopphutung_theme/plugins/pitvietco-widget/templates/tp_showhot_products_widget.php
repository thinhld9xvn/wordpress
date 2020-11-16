<?php 
    echo $before_widget;
        echo $before_title . $title . $after_title;

		$args = array(

			'post_type' => $custom_post_type,                
            'order' => 'desc',
            'orderby' => 'id',
            'posts_per_page' => $posts_per_page,
            'meta_key' => '_pt-field-san-pham-checkbox-hot',
            'meta_value' => 'true'          

		); 

		query_posts( $args ); ?>

		<!-- widgFeaturedProdBox -->
		<div class="widgFeaturedProdBox widgContentBox padlr20">			

			<?php 
				if ( have_posts() ) : ?>

					<ul class="pboxlist --normalbox --padtb10 bxslider" 
						data-direction="vertical"						
       					data-minSlides="<?php echo $show_posts ?>">

						<?php while ( have_posts() ) : the_post(); 

								$masp = get_post_meta( get_the_id(), '_pt-field-san-pham-opcode', true ); ?>

						    <li>

						    	<!-- pthumb -->
						    	<div class="pthumb tcenter">

						    		<a href="<?php the_permalink(); ?>">
						    			<?php 
						    				echo get_the_post_thumbnail( get_the_id(), 
						    											 'feature-image-product-thumbnail-detail',
						    											 array(
						    											 	'class' => 'scaleToWidth'
						    											 ) 
						    										   ); 
						    			?>
						    		</a>

						    	</div>
						    	<!-- #pthumb -->

						    	<!-- ptitle -->
						    	<div class="ptitle mtop10">

						    		<a href="<?php the_permalink(); ?>">
						    			<?php echo title(100); ?>
						    		</a>

						    	</div>
						    	<!-- #ptitle -->

						    	<!-- pspcode -->
						    	<div class="pspcode mtop10">

						    		Mã sản phẩm: 
						    		<strong class="cprimary">
						    			<?= isset( $masp ) && ! empty( $masp )
                                            ?
                                            $masp
                                            :
                                            'Đang cập nhật' ?>
						    		</strong>

						    	</div>
						    	<!-- #pspcode -->

						    </li>		  

						<?php endwhile; 
							  wp_reset_query(); ?> 

					</ul>

		  <?php endif; ?>

		</div>			
		<!-- #widgFeaturedProdBox -->

<?php echo $after_widget; ?>