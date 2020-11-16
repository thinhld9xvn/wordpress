<?php	

	class PVCF_ShortCodes {

		private $pvcf_helper;

		public function __construct() {

			require_once 'pvcf_helper.php';

			$this->pvcf_helper = new PVCF_Helper();

		}

		public function pvcf_show_contactform( $pvcf_args, $content ) {

			global $wp;
			$current_url = home_url( add_query_arg( array(), $wp->request ) );

			$pvcf_helper = $this->pvcf_helper;

			ob_start();

			$cf_id = $pvcf_args['id']; ?>

			<form method="post" 
				  action="<?php echo $current_url ?>" 
				  id="frm_pvcf_contact_form_<?php echo $cf_id ?>" 
				  class="frm_pvcf_contact_form"
				  data-form-id="<?php echo $cf_id ?>">

				<div id="pvcf_contact_form_<?php echo $cf_id ?>" 
					 class="pvcf_contact_form ohidden">				

	<?php

					$args = array(

						'post_type' => 'pv-contact-form',
						'p'	=> $cf_id

					);

					query_posts( $args );

					while ( have_posts() ) : the_post();

						$pvcf_settings = get_post_meta( get_the_id(), '_pv-contact-form-settings', true);

						$pvcf_fields = get_post_meta( get_the_id(), '_pv-contact-form-field', true); ?>

						<div class="<?php echo $pvcf_settings['pvcf-class'] ?>">

				<?php		foreach ( $pvcf_fields as $field ) : 

								if ( $field['pvcf-field-type']['value'] ) : ?>

									<div class="pvcf_field_row <?php echo $field['pvcf-field-parent-class'] ?>" 
										 arial-groupbox="true">

										<?php $pvcf_helper->print_field_input_type( $field ); ?>

									</div>						

					<?php   	endif;

							endforeach; ?>

						</div>

			<?php	endwhile; ?>

				</div>

			</form>

			<?php $content = ob_get_contents();

				  ob_end_clean();

				  return $content;
		}

	}

	$pvcf_shortcodes = new PVCF_ShortCodes();
	add_shortcode( 'pvcf_contactform', array( $pvcf_shortcodes, 'pvcf_show_contactform') );
?>