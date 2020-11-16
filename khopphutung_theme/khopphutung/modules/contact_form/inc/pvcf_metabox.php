<?php 
	class MyThemeContactFormMetaBoxes {

        /**
         Khai báo meta box
        **/
        function theme_cf_meta_boxes_init() {

            add_meta_box( 'pv-contact-form-metaboxes', 'Thông tin contact form', array( &$this, 'theme_cf_metabox_callback' ), 'pv-contact-form', 'advanced', 'high');
            add_meta_box( 'pv-contact-form-body-metaboxes', 'Thiết lập gửi thư', array( &$this, 'theme_cf_body_metabox_callback' ), 'pv-contact-form', 'advanced', 'high');
           
        }
         
        /**
         Khai báo callback
         @param $post là đối tượng WP_Post để nhận thông tin của post
        **/
        function theme_cf_metabox_callback( $post ) {            
         
            wp_nonce_field( basename( __FILE__ ), 'pv-contact-form-field-nonce' );
            wp_nonce_field( basename( __FILE__ ), 'pv-contact-form-settings-nonce' );

            $pvcf_settings = get_post_meta( $post->ID, '_pv-contact-form-settings', true );
            $pvcf_fields = get_post_meta( $post->ID, '_pv-contact-form-field', true );

            ob_start(); ?>

            	<script>
            		var pvcf_index = <?php echo sizeof( $pvcf_fields ) - 1; ?>
            	</script>

            	<!-- pv-contact-form-group-fields -->
            	<div class="pv-contact-form-group-fields mtop20">

            		<button type="button" id="pvcf-button-add-fields" class="button button-default pvcf-admin-button pvcf-button-add-fields">

            			<img class="vmiddle" src="<?php echo PVCF_DIRECTORY_IMG . '/pvcf_add.png' ?>" alt="pvcf_add_field" /> 
            			<span>Thêm trường</span>

            		</button>

            		<a type="button" 
        				id="pvcf-button-settings" 
        				class="button button-default pvcf-admin-button pvcf-button-settings tcenter">

            			<img class="vmiddle" src="<?php echo PVCF_DIRECTORY_IMG . '/pvcf_settings.png' ?>" alt="pvcf_settings" /> 
            			<span>Cài đặt</span>

            		</a>

            		<input type="hidden" 
            				id="pvcf-settings-hidden-class"
						   class="pvcf-settings-hidden-class" 
						   name="pv-contact-form-settings[pvcf-class]" 
						   value="<?= isset( $pvcf_settings['pvcf-class'] ) ? $pvcf_settings['pvcf-class'] : '' ?>" />

            		<!-- pvcf-settings-modal -->
            		<div id="pvcf-settings-modal" class="pvcf-modal" style="display:none">

            			<h3 class="modalTitle">Cài đặt contact form</h3>

            			<div class="pvcf-modal-body">

            				<div class="pvcf-settings-field">

            					<div class="pvcf-settings-label">
            						<strong>Class của form</strong>
            					</div>

            					<div class="pvcf-settings-input mtop10">

            						<input type="text" 
            							   class="pvcf-settings-class w100p"             							   
            							   value="<?= isset( $pvcf_settings['pvcf-class'] ) ? $pvcf_settings['pvcf-class'] : '' ?>" />

            					</div>

            				</div>

            				<div class="pvcf-settings-field mtop20">            				

            					<div class="pvcf-settings-input">

            						<a id="pvcf-settings-save" href="#close-modal" class="button button-primary" rel="modal:close">
            							Đồng ý
            						</a>            							   

            					</div>

            				</div>

            			</div>

            		</div>
            		<!-- #pvcf-settings-modal -->

            		<div class="pvcf-shortcode"> 

            			<strong>[pvcf_contactform id="<?php the_ID() ?>"]</strong>

            		</div>

            		<!-- pvcf-group-fields -->
            		<div class="pvcf-group-fields pvcf-sortable-fields mtop20">

            			<?php

            				include ( locate_template(  PVCF_DIRECTORY_TEMPLATE . '/inc/pvcf_field_template.php' ) );

            				if ( is_array( $pvcf_fields ) & sizeof( $pvcf_fields ) > 0 ) :

            					while ( $c_field = current( $pvcf_fields ) ) :            					

	            					$key = is_numeric( key( $pvcf_fields ) ) ? intval( key( $pvcf_fields ) ) : -1;

	            					if (  $key >= 0 ) : //print_r( $c_field ); ?>

		            					<!-- pvcf-field -->
				            			<div class="pvcf-field pvcf-field-box postbox closed mtop20">

				            				<button type="button" class="button-link pvcf-collapse-button pvcf-collapse-box">
				            					<span class="screen-reader-text">Toggle panel: Thông tin trường</span>
				            					<span class="toggle-indicator"></span>
				            				</button>

				            				<!-- pvcf-field-section-title -->
				            				<h2 class="pvcf-field-section-title pvcf-handle pvcf-handle-title pvcf-collapse-box">
				            					<strong>
				        							Thông tin trường 
				        							<span class="title"><?php echo ': ' . $c_field['pvcf-field-title']; ?></span>
				        							<span class="require"><?= isset( $c_field['pvcf-field-require'] ) && $c_field['pvcf-field-require'] === 'true' ? '(*)' : '' ?></span>
				        							<span class="type"><?= isset( $c_field['pvcf-field-type'] ) && $c_field['pvcf-field-type']['value'] !== 'null' ? '[' . $c_field['pvcf-field-type']['text'] . ']' : '' ?></span>
				            					</strong>
				            				</h2>

				            				<!-- pvcf-field-section -->
				            				<div class="pvcf-field-section-body inside mtop20">

					            				<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">
						            					Tiêu đề hiển thị
						            				</div>
						            				<!-- #pvcf-field-label -->

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">
						            					<input type="text" class="pvcf-field-title" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-title]" value="<?= isset( $c_field['pvcf-field-title'] ) ? $c_field['pvcf-field-title'] : '' ?>" />
						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg mtop10">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">
						            					Tên trường
						            				</div>
						            				<!-- #pvcf-field-label -->

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">
						            					<input type="text" class="pvcf-field-name" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-name]" value="<?= isset( $c_field['pvcf-field-name'] ) ? $c_field['pvcf-field-name'] : '' ?>" />
						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg mtop10">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">
						            					Class của trường
						            				</div>
						            				<!-- #pvcf-field-label -->

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">
						            					<input type="text" class="pvcf-field-class" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-class]" value="<?= isset( $c_field['pvcf-field-class'] ) ? $c_field['pvcf-field-class'] : '' ?>" />
						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg mtop10">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">
						            					Class của đối tượng cha bao quanh trường
						            				</div>
						            				<!-- #pvcf-field-label -->

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">
						            					<input type="text" class="pvcf-field-parent-class" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-parent-class]" value="<?= isset( $c_field['pvcf-field-parent-class'] ) ? $c_field['pvcf-field-parent-class'] : '' ?>" />
						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg mtop10">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">
						            					Kiểu dữ liệu
						            				</div>
						            				<!-- #pvcf-field-label -->

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">

						            					<select class="sl-pvcf-field-type">
						            						<option value="null" <?php selected( $c_field['pvcf-field-type']['value'], 'null' ) ?>>Trống</option>
						            						<option value="select" <?php selected( $c_field['pvcf-field-type']['value'], 'select' ) ?>>Hộp lựa chọn</option>
						            						<option value="textbox" <?php selected( $c_field['pvcf-field-type']['value'], 'textbox' ) ?>>Hộp văn bản một dòng</option>
						            						<option value="textarea" <?php selected( $c_field['pvcf-field-type']['value'], 'textarea' ) ?>>Hộp văn bản nhiều dòng</option>			            						
						            						<option value="email" <?php selected( $c_field['pvcf-field-type']['value'], 'email' ) ?>>Hộp nhập email</option>
						            						<option value="tel" <?php selected( $c_field['pvcf-field-type']['value'], 'tel' ) ?>>Hộp nhập số điện thoại</option>
						            						<option value="number" <?php selected( $c_field['pvcf-field-type']['value'], 'number' ) ?>>Hộp nhập số</option>
						            						<option value="hiddenfield" <?php selected( $c_field['pvcf-field-type']['value'], 'hiddenfield' ) ?>>Hộp văn bản ẩn</option>
						            						<option value="submit" <?php selected( $c_field['pvcf-field-type']['value'], 'submit' ) ?>>Nút submit</option>
						            					</select>

						            					<input type="hidden" class="pvcf-field-type-value-hidden" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-type][value]" value="<?= isset( $c_field['pvcf-field-type']['value'] ) ? $c_field['pvcf-field-type']['value'] : '' ?>">
						            					<input type="hidden" class="pvcf-field-type-text-hidden" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-type][text]" value="<?= isset( $c_field['pvcf-field-type']['text'] ) ? $c_field['pvcf-field-type']['text'] : '' ?>">

						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg pvcf-field-cg-hidden select pvcf-field-select-cg mtop10 <?= $c_field['pvcf-field-type']['value'] !== 'select' ? 'hidden' : '' ?>">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">

						            					<p>Dữ liệu hộp chọn</p>

						            					<p>

														  Cú pháp: [value] : [text] <br/>
						            					  Ví dụ: </p>

						            					<p style="padding: 0 0 0 10px">
						            					  red : Màu đỏ <br/>
						            					  green : Màu xanh

						            					</p>
						            				</div>
						            				<!-- #pvcf-field-label -->		            			

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">

						            					<textarea class="txt-pvcf-select-options" rows="10"><?php echo trim( $c_field['pvcf-field-select-options'] ); ?></textarea>
						            					<input type="hidden" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-select-options]" value="<?= isset( $c_field['pvcf-field-select-options'] ) ? $c_field['pvcf-field-select-options'] : '' ?>">

						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg pvcf-field-cg-hidden textarea pvcf-field-textarea-cg mtop10 <?= $c_field['pvcf-field-type']['value'] !== 'textarea' ? 'hidden' : '' ?>">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">

						            					<p>Số dòng</p>
						            					
						            				</div>
						            				<!-- #pvcf-field-label -->		            			

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">
						            					
						            					<input type="text" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-textarea-rows]" value="<?= isset( $c_field['pvcf-field-textarea-rows'] ) ? $c_field['pvcf-field-textarea-rows'] : '' ?>">

						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->					            			

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg pvcf-field-cg-hidden select textarea textbox email tel number pvcf-field-require-cg mtop10 
					            							<?= in_array( $c_field['pvcf-field-type']['value'], array( 'submit', 'hiddenfield' ) ) ? 'hidden' : '' ?>">

						            				<!-- pvcf-field-label -->
						            				<div class="pvcf-field-label">
						            					Tùy chọn nâng cao
						            				</div>		            					
						            				<!-- #pvcf-field-label -->		            			

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">

						            					<label>
						            						<input type="checkbox" 
						            							  class="pvcf-field-required-checkbox vmiddle" 
						            							  <?= isset( $c_field['pvcf-field-require'] ) && $c_field['pvcf-field-require'] ? 'checked' : '' ?> />
						            						<span class="vmiddle">Trường bắt buộc phải nhập</span>
						            					</label>

						            					<input type="hidden" name="pv-contact-form-field[<?php echo $key; ?>][pvcf-field-require]" value="<?= isset( $c_field['pvcf-field-require'] ) ? $c_field['pvcf-field-require'] : '' ?>">

						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg --> 

						            			<!-- pvcf-field-cg -->
					            				<div class="pvcf-field-cg mtop20">		            				

						            				<!-- pvcf-field-input -->
						            				<div class="pvcf-field-input">

						            					<button type="button" class="button button-default pvcf-button pvcf-button-remove-field">
						            						<img class="vmiddle" src="<?php echo PVCF_DIRECTORY_IMG . '/pvcf_remove.png' ?>" alt="pvcf-remove-field" />
						            						<span class="vmiddle">Xóa trường</span>
						            					</button>

						            				</div>
						            				<!-- #pvcf-field-input -->

						            			</div>
						            			<!-- #pvcf-field-cg -->

						            		</div>
						            		<!-- pvcf-field-section -->

				            			</div>
				            			<!-- #pvcf-field -->            					
            		<?php
            						endif;

            						next( $pvcf_fields );

            					endwhile; 

            				endif; ?>

            		</div>
            		<!-- #pvcf-group-fields -->

            	</div>
            	<!-- #pv-contact-form-group-fields -->           	


<?php   
			$contents = ob_get_contents(); 
			ob_end_clean();

			echo $contents;

		}

		/**
         Khai báo callback
         @param $post là đối tượng WP_Post để nhận thông tin của post
        **/
        function theme_cf_body_metabox_callback( $post ) {

        	wp_nonce_field( basename( __FILE__ ), 'pv-contact-form-body-nonce' );

            $pvcf_body = get_post_meta( $post->ID, '_pv-contact-form-body', true );
            $pvcf_fields = get_post_meta( $post->ID, '_pv-contact-form-field', true );  

            if ( is_array( $pvcf_fields ) && sizeof( $pvcf_fields ) > 0 ) :

            	$fields = '[ ';

	            foreach ( $pvcf_fields as $c_field ) :

	            	if ( $c_field['pvcf-field-name']  ) :

	            		if ( $c_field['pvcf-field-type']['value'] !== 'submit' ) :

			            	$fields .= $c_field['pvcf-field-name'];

			            	if (  $c_field !== end( $pvcf_fields ) ) :		            		

			            		$fields .= ', ';

			            	endif;

			            else :

			            	$fields = substr( $fields, 0, strlen( $fields ) - 2 );

			            endif;

		            endif;

	            endforeach;

	            $fields .=' ]';

	        endif;            

            ob_start(); ?>

            	<!-- pv-contact-form-body -->
            	<div class="pv-contact-form-body">

            		<!-- pvcf-body-field -->
            		<div class="pvcf-body-field mtop20">

            			<div class="pvcf-field-label">
            				Tiêu đề thư
            			</div>

            			<div class="pvcf-field-input mtop10">

            				<input type="text" id="txt-pvcf-body-title" name="pv-contact-form-body[pvcf-title]" value="<?= isset( $pvcf_body['pvcf-title'] ) ? $pvcf_body['pvcf-title'] : '' ?>" />

            			</div>

            		</div>
            		<!-- #pvcf-body-field -->            		

            		<!-- pvcf-body-field -->
            		<div class="pvcf-body-field mtop20">

            			<div class="pvcf-field-label">
            				Nội dung thư
            			</div>

            			<div class="pvcf-field-input mtop10">

		            		<p>
		            			<strong>
		            				Trong nội dung thư có thể chèn các biến đã tạo ở trên vào những vị trí thích hợp. <br/>
		            				Các biến trong thư được định nghĩa dưới dạng tên trường ở từng trường đã tạo ở trên. <br/><br/>
		            				Cú pháp: [%variable] - %variable sẽ được thay thế bằng những biến tồn tại. <br/><br/>

		            				<?php if ( isset( $fields ) && $fields ) : ?>

		            					Các biến có thể sử dụng được ở đây là : <br/> <br/> <?php echo $fields; ?>
		            					
		            				<?php endif; ?>

		            			</strong>
		            		</p>

		            		<p class="mtop10">
		            			<textarea class="w100p" rows="20"><?= isset( $pvcf_body['pvcf-content'] ) ? $pvcf_body['pvcf-content'] : '' ?></textarea>
		            			<input class="pv-contact-form-body-field" 
		            				   type="hidden" 
		            				   name="pv-contact-form-body[pvcf-content]" 
		            				   value="<?= isset( $pvcf_body['pvcf-content'] ) ? $pvcf_body['pvcf-content'] : '' ?>" />
		            		</p>

		            	</div>

	            	</div>
	            	<!-- #pvcf-body-field -->

            	</div>
            	<!-- #pv-contact-form-body -->


    <?php   $contents = ob_get_contents();
    		ob_end_clean();

    		echo $contents;

        }
         
        /**
         Lưu dữ liệu meta box khi nhập vào
         @param post_id là ID của post hiện tại
        **/
        function theme_cf_meta_boxes_save( $post_id ) {        	
                    
            $metakey_pvcf_field_nonce = $_POST[ 'pv-contact-form-field-nonce' ];
            $metakey_pvcf_settings_nonce = $_POST[ 'pv-contact-form-settings-nonce' ];
            $metakey_pvcf_body_nonce = $_POST[ 'pv-contact-form-body-nonce' ];            
            
             // Kiểm tra nếu nonce chưa được gán giá trị hoặc không trùng khớp
             if( ! isset( $metakey_pvcf_field_nonce ) || ! wp_verify_nonce( $metakey_pvcf_field_nonce, basename(__FILE__) ) ) :
                return;
             endif;     

              if( ! isset( $metakey_pvcf_settings_nonce ) || ! wp_verify_nonce( $metakey_pvcf_settings_nonce, basename(__FILE__) ) ) :
                return;
             endif;     

             if( ! isset( $metakey_pvcf_body_nonce ) || ! wp_verify_nonce( $metakey_pvcf_body_nonce, basename(__FILE__) ) ) :
                return;
             endif;          

            $pvcf_fields = $_POST[ 'pv-contact-form-field' ];
            $pvcf_settings = $_POST[ 'pv-contact-form-settings' ];
            $pvcf_body = $_POST[ 'pv-contact-form-body' ];

            //print_r( $_POST ); die();
            
            update_post_meta( $post_id, '_pv-contact-form-field', $pvcf_fields );
            update_post_meta( $post_id, '_pv-contact-form-settings', $pvcf_settings );
            update_post_meta( $post_id, '_pv-contact-form-body', $pvcf_body );

        }
        
    }
        
    $theme_cotact_form_meta_boxes = new MyThemeContactFormMetaBoxes();
    
    add_action( 'add_meta_boxes', array( $theme_cotact_form_meta_boxes, 'theme_cf_meta_boxes_init' ) );
    add_action( 'save_post', array( $theme_cotact_form_meta_boxes, 'theme_cf_meta_boxes_save') );
?>