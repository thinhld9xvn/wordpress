<?php 
	/* Template Name: Commerce Edit Account Layout Page */  ?>

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

					<?php if ( ! is_user_logged_in() ) :

						do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_ACCOUNT_PUBLISH_PRODUCTS_MUST_BE_LOG_IN_CONTENTS_ACTION);
					
					else:

						do_action(\Actions\ACTIONS::UNICORN_WOOCOMMERCE_CUSTOMIZE_EDIT_ACCOUNT_CONTENTS_ACTION);

					endif; ?>

				</div>
				
			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>