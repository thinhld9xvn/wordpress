<?php 
	
	require_once 'pvcf_helper.php';

	function pvcf_show_contactform( $pvcf_args, $content ) {

		ob_start();

		$cf_id = $pvcf_args['id']; ?>

		<form method="post" id="frm_pvcf_contact_form_<?php echo $cf_id ?>" data-form-id="<?php echo $cf_id ?>" class="frm_pvcf_contact_form">

			<div id="pvcf_contact_form_<?php echo $cf_id ?>" class="pvcf_contact_form ohidden">				

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

								<div class="pvcf_field_row <?php echo $field['pvcf-field-parent-class'] ?>" arial-groupbox="true">

									<?php print_field_input_type( $field ); ?>

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
	add_shortcode( 'pvcf_contactform', 'pvcf_show_contactform' );
?>