<?php

	function astra_custom_gifts_box_on_mobile() { 
      
        if ( is_single() ) : ?>

        	<div class="widget widget-gifts-box-mobile">

        		<h2 class="widget-title">Quà tặng</h2>

        		<?php include( locate_template('page-options/gifts_box/widget/templates/tp_gifts_box_widget.php') ); ?>

        	</div>

        <?php endif;

    }

	add_action( 'astra_entry_content_after', 'astra_custom_gifts_box_on_mobile', 9 );