
<?php 
	/* Template Name: Admin Store Reset Password Layout Page */  ?>

<?php get_header(); ?>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>
		</div>
	</div>
</div>

<div class="body-content" 
	id="top-banner-and-menu">

	<div class="outer-top-ts">

		<div class="container">

			<div class="row">

				<div class="woocommerce">					

					<?php do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_RESET_PASSWORD_CONTENTS_ACTION); ?>						
					
				</div>
				
			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>