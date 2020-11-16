<!-- vragen-cloud-wrap -->
<div class="vragen-cloud-wrap mtop20">

	<?php 

		$entries = get_post_meta( $post->ID, '_pt-field-support-vragen-children-entries-content', true ); 
		$entries_length = sizeof( $entries );	

		$t_id = $_GET['t_id'];

		if ( ! isset( $t_id ) ) : ?>

			<h2 class="tcenter">
				Onderwerp: <?php echo $post->post_title; ?>
			</h2>

			<!-- vg-wrapper -->
			<div class="vg-wrapper mtop20">
	<?php
				for ( $i = 0; $i < $entries_length; $i++ ) : 

					$title = $entries[$i]['accordion-vragen-children-entry-title']; 
					$url = get_page_link( $post ) . "?t_id=" . ($i+1); ?>

					<!-- vg-cloud-item -->
					<div class="vg-cloud-item
								vg-childbox-item
								hBorder -fullborder pad20
								vcenter mtop10">

						<a href="<?php echo $url; ?>">
							<?php echo $title; ?>
						</a>

					</div>
					<!-- #vg-cloud-item -->	

	<?php 		endfor; ?>

			</div>
			<!-- #vg-wrapper -->

	<?php else :
			
			include 'vragen-subchildren.php';

		endif; ?>
</div>	
<!-- #vragen-cloud-wrap -->	