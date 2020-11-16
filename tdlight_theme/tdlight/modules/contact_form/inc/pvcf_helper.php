<?php
	class PVCF_Helper {
		private $pvcf_themehelper;
		public function __construct() {	
			require_once PVCF_DIRECTORY_HELPER . '/theme_helper.php';		
			$this->pvcf_themehelper = new PVCF_ThemeHelper();
		}
		public function print_htmltag_require( $require ) {
			return $require === 'true' ? '<span class="pvcf_require">(*)</span>' : '';
		}
		public function print_field_select_type( $field ) {
			$pvcf_themehelper = $this->pvcf_themehelper;
			ob_start(); ?>
				<p>
					<strong>
						<?php 
							echo $field['pvcf-field-title'] . $this->print_htmltag_require( $field['pvcf-field-require']  );
						?>
					</strong>
				</p>
				<p>				
					<select 
							class="pvcf_field_input <?php echo $field['pvcf-field-class'] ?>" 
							name="<?php echo $field['pvcf-field-name'] ?>" 
							<?php if ( $field['pvcf-field-require'] === 'true' ) : ?>
								arial-required="true" 
								arial-required-err="<?php echo $pvcf_themehelper->translate("Trường này là bắt buộc"); ?>">
							<?php endif; ?>
						<?php 						
							$select_options = explode( PHP_EOL, trim( $field['pvcf-field-select-options'] ) );
							foreach ( $select_options as $option ) : 							
								$option = explode( ':', $option ); ?>
								<option value="<?php echo trim( $option[0] ); ?>"><?php echo trim( $option[1] ); ?></option>
											
					<?php	endforeach; ?>
					</select>
				</p>
	<?php
			$contents = ob_get_contents();
			ob_end_clean();
			echo $contents;
		}
		public function print_field_textbox_type( $field ) {
			$pvcf_themehelper = $this->pvcf_themehelper;
			ob_start(); ?>
				<p>
					<strong>
						<?php 
							echo $field['pvcf-field-title'] . $this->print_htmltag_require( $field['pvcf-field-require']  );
						?>
					</strong>
				</p>
				<p>
					<input  type="text"
						class="pvcf_field_input <?php echo $field['pvcf-field-class'] ?>" 
						name="<?php echo $field['pvcf-field-name'] ?>" 
						<?php if ( $field['pvcf-field-require'] === 'true' ) : ?>
								  arial-required="true" 
								  arial-required-err="<?php echo $pvcf_themehelper->translate("Trường này là bắt buộc"); ?>"
						<?php 	
								  if ( $field['pvcf-field-type']['value'] === 'tel' ) : ?>
								  	  arial-numberonly="true"
								  	  arial-numberonly-err="<?php echo $pvcf_themehelper->translate("Trường này chỉ được phép nhập ký tự số"); ?>"
						<?php 
							  	  else :
							  	 	  if ( $field['pvcf-field-type']['value'] === 'email' ) : ?>
							  	 		  arial-email="true"
							  			  arial-email-err="<?php echo $pvcf_themehelper->translate("Định dạng email không đúng, xin mời nhập lại"); ?>"
						<?php 	 	  endif;
							  	  endif; 
							  endif; ?> />
					</p>			
	<?php
			$contents = ob_get_contents();
			ob_end_clean();
			echo $contents;
		}
		public function print_field_textarea_type( $field ) {
			$pvcf_themehelper = $this->pvcf_themehelper;
			ob_start(); ?>
				<p>
					<strong>
						<?php 
							echo $field['pvcf-field-title'] . $this->print_htmltag_require( $field['pvcf-field-require']  );
						?>
					</strong>
				</p>
				<p>
					<textarea   rows="<?php echo $field['pvcf-field-textarea-rows'] ?>"
							    class="pvcf_field_input <?php echo $field['pvcf-field-class'] ?>" 
								name="<?php echo $field['pvcf-field-name'] ?>" 
							<?php if ( $field['pvcf-field-require'] === 'true' ) : ?>
								arial-required="true" 
								arial-required-err="<?php echo $pvcf_themehelper->translate("Trường này là bắt buộc"); ?>"
							<?php endif; ?>></textarea>
				</p>
	<?php
			$contents = ob_get_contents();
			ob_end_clean();
			echo $contents;
		}
		public function print_field_number_type( $field ) {
			$pvcf_themehelper = $this->pvcf_themehelper;
			ob_start(); ?>
				<p>
					<strong>
						<?php 
							echo $field['pvcf-field-title'] . $this->print_htmltag_require( $field['pvcf-field-require']  );
						?>
					</strong>
				</p>
				<p>
					<input style="width: 100px"  type="number"
						class="pvcf_field_input <?php echo $field['pvcf-field-class'] ?>" 
						name="<?php echo $field['pvcf-field-name'] ?>"
						min="1" step="1" value="1"
						<?php if ( $field['pvcf-field-require'] === 'true' ) : ?>
							  arial-required="true"
						<?php  endif; ?> />
					</p>			
	<?php
			$contents = ob_get_contents();
			ob_end_clean();
			echo $contents;
		}
		public function print_hiddenfield_type( $field ) {
			ob_start(); ?>
				<p>
					<input  type="hidden"
							class="pvcf_field_input <?php echo $field['pvcf-field-class'] ?>" 
							name="<?php echo $field['pvcf-field-name'] ?>" />
				</p>			
			
	<?php
			$contents = ob_get_contents();
			ob_end_clean();
			echo $contents;
		}
		public function print_submit_button( $field ) {
			ob_start(); ?>	
				<p>		
					<input type="submit" 
						    class="pvcf_submit_button <?php echo $field['pvcf-field-class'] ?>" 
							name="<?php echo $field['pvcf-field-name'] ?>" 
							value="<?php echo $field['pvcf-field-title'] ?>"
					/>	
					<img src="<?php echo PVCF_DIRECTORY_IMG . '/pvcf-ajax-submit.png' ?>" class="pvcf_ajax_submit" />
				</p>
	<?php
			$contents = ob_get_contents();
			ob_end_clean();
			echo $contents;
		}
		public function print_field_input_type( $field ) {			
			switch ( $field['pvcf-field-type']['value'] ) :
				case 'select':
					$this->print_field_select_type( $field );				
					break;
				case 'textbox':
				case 'tel':
				case 'email':
					$this->print_field_textbox_type( $field );
					break;
				case 'textarea':
					$this->print_field_textarea_type( $field );
					break;
				case 'number':
					$this->print_field_number_type( $field );
					break;
				case 'hiddenfield':
					$this->print_hiddenfield_type( $field );
					break;				
				
				case 'submit':
					$this->print_submit_button( $field );				
					break;
				default:
					break;
			endswitch;	
		}
	}
?>