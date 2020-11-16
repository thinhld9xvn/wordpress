<?php get_header(); 
	  $header_options = get_option('section-header_option_name');  ?>

	<!-- hsecond -->
	<div class="hsecond">

		<?php dynamic_sidebar( 'Slider Sidebar' ); ?>

	</div>
	<!-- #hsecond -->

</header>
<!-- #header -->

<!-- main -->
<section id="main">

	<?php dynamic_sidebar( 'Home Sidebar' ); ?>	
	
</section>
<!-- #main -->

<style>

	<?php 
		$feedback_bg_id = pn_get_attachment_id_from_url( $header_options["feedback-bg-image-id"] );		
		$feedback_bg_src = wp_get_attachment_image_src( $feedback_bg_id, 'feature-image-feedback-background' ); 

		$onze_cases_bg_id = pn_get_attachment_id_from_url( $header_options["onze-cases-bg-image-id"] );
		$onze_cases_bg_src = wp_get_attachment_image_src( $onze_cases_bg_id, 'feature-image-onze-cases-background' );

		$ons_team_bg_id = pn_get_attachment_id_from_url( $header_options["ons-team-bg-image-id"] );
		$ons_team_bg_src = wp_get_attachment_image_src( $ons_team_bg_id, 'feature-image-ons-team-background' ); ?>

    .fixed-bg-section.feedback-section {
        background-image: url('<?php echo $feedback_bg_src[0] ?>');
    }  

    .fixed-bg-section.onze-cases-section {
        background-image: url('<?php echo $onze_cases_bg_src[0] ?>');
    }

    .ons-team-section {
        background-image: url('<?php echo $ons_team_bg_src[0] ?>');
    }
  
</style>

<?php get_footer(); ?>