<?php
/**
 * The template for displaying the footer
 */
	
	$post_option = traveltour_get_post_option(get_the_ID());
	if( empty($post_option['enable-footer']) || $post_option['enable-footer'] == 'default' ){
		$enable_footer = traveltour_get_option('general', 'enable-footer', 'enable');
	}else{
		$enable_footer = $post_option['enable-footer'];
	}	
	if( empty($post_option['enable-copyright']) || $post_option['enable-copyright'] == 'default' ){
		$enable_copyright = traveltour_get_option('general', 'enable-copyright', 'enable');
	}else{
		$enable_copyright = $post_option['enable-footer'];
	}
	$copyright_style = traveltour_get_option('general', 'copyright-style', 'center');
	if( in_array($copyright_style, array('center-tb', 'left-right-tb')) ){
		$copyright_bg = false;
		$copyright_style = str_replace('-tb', '', $copyright_style);
	}else{
		$copyright_bg = true;
	}
	

	$fixed_footer = traveltour_get_option('general', 'fixed-footer', 'disable');
	echo '</div>'; // traveltour-page-wrapper

	if( $enable_footer == 'enable' || $enable_copyright == 'enable' ){

		if( $fixed_footer == 'enable' ){
			echo '</div>'; // traveltour-body-wrapper

			echo '<footer class="traveltour-fixed-footer" id="traveltour-fixed-footer" >';
		}else{
			echo '<footer>';
		}

		if( $enable_footer == 'enable' ){

			$footer_column_divider = traveltour_get_option('general', 'enable-footer-column-divider', 'enable');
			$extra_class  = ($footer_column_divider == 'enable')? ' traveltour-with-column-divider': '';

			echo '<div class="traveltour-footer-wrapper ' . esc_attr($extra_class) . '" >';
			echo '<div class="traveltour-footer-container traveltour-container clearfix" >';
			
			$traveltour_footer_layout = array(
				'footer-1'=>array('traveltour-column-60'),
				'footer-2'=>array('traveltour-column-15', 'traveltour-column-15', 'traveltour-column-15', 'traveltour-column-15'),
				'footer-3'=>array('traveltour-column-15', 'traveltour-column-15', 'traveltour-column-30',),
				'footer-4'=>array('traveltour-column-20', 'traveltour-column-20', 'traveltour-column-20'),
				'footer-5'=>array('traveltour-column-20', 'traveltour-column-40'),
				'footer-6'=>array('traveltour-column-40', 'traveltour-column-20'),
			);
			
			$count = 0;
			$footer_style = traveltour_get_option('general', 'footer-style');
			$footer_style = empty($footer_style)? 'footer-2': $footer_style;
			foreach( $traveltour_footer_layout[$footer_style] as $layout ){ $count++;
				echo '<div class="traveltour-footer-column traveltour-item-pdlr ' . esc_attr($layout) . '" >';
				if( is_active_sidebar('footer-' . $count) ){
					dynamic_sidebar('footer-' . $count); 
				}
				echo '</div>';
			}
			
			echo '</div>'; // traveltour-footer-container
			if( $copyright_bg ){
				echo '</div>'; // traveltour-footer-wrapper 
			}
		} // enable footer

		if( $enable_copyright == 'enable' ){
			if( !$copyright_bg ){
				echo '<div class="traveltour-copyright-divider-container traveltour-container">';
				echo '<div class="traveltour-copyright-divider traveltour-item-mglr" ></div>';
				echo '</div>';
			}

			if( $copyright_style == 'center' ){
				$copyright_text = traveltour_get_option('general', 'copyright-text');

				if( !empty($copyright_text) ){
					echo '<div class="traveltour-copyright-wrapper" >';
					echo '<div class="traveltour-copyright-container traveltour-container">';
					echo '<div class="traveltour-copyright-text traveltour-item-pdlr">';
					echo gdlr_core_text_filter($copyright_text);
					echo '</div>';
					echo '</div>';
					echo '</div>'; // traveltour-copyright-wrapper
				}
			}else{
				$copyright_left = traveltour_get_option('general', 'copyright-left');
				$copyright_right = traveltour_get_option('general', 'copyright-right');

				if( !empty($copyright_left) || !empty($copyright_right) ){
					echo '<div class="traveltour-copyright-wrapper ' . ($copyright_bg? '': 'traveltour-transparent') . '" >';
					echo '<div class="traveltour-copyright-container traveltour-container clearfix">';
					if( !empty($copyright_left) ){
						echo '<div class="traveltour-copyright-left traveltour-item-pdlr">';
						echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_left));
						echo '</div>';
					}

					if( !empty($copyright_right) ){
						echo '<div class="traveltour-copyright-right traveltour-item-pdlr">';
						echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_right));
						echo '</div>';
					}
					echo '</div>';
					echo '</div>'; // traveltour-copyright-wrapper
				}
			}
		}

		if( !$copyright_bg ){
			echo '</div>'; // traveltour-footer-wrapper 
		}

		echo '</footer>';

		if( $fixed_footer == 'disable' ){
			echo '</div>'; // traveltour-body-wrapper
		}
		echo '</div>'; // traveltour-body-outer-wrapper

	// disable footer	
	}else{
		echo '</div>'; // traveltour-body-wrapper
		echo '</div>'; // traveltour-body-outer-wrapper
	}

	$header_style = traveltour_get_option('general', 'header-style', 'plain');
	
	if( $header_style == 'side' || $header_style == 'side-toggle' ){
		echo '</div>'; // traveltour-header-side-nav-content
	}

	$back_to_top = traveltour_get_option('general', 'enable-back-to-top', 'disable');
	if( $back_to_top == 'enable' ){
		echo '<a href="#traveltour-top-anchor" class="traveltour-footer-back-to-top-button" id="traveltour-footer-back-to-top-button"><i class="fa fa-angle-up" ></i></a>';
	}
?>

<?php wp_footer(); ?>
<link rel='stylesheet' id='admin-bar-css'  href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css' type='text/css' media='all' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
	jQuery(document).ready(function($){
		$('#carousel').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  slidesToShow: 3,
autoplay: false,
			responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
	});
</script>
<script>
	jQuery( ".slick-prev" ).append( '<i class="arrow_carrot-left"></i>');
</script>
<!-- <script >jQuery( ".tourmaster-user-navigation-item-reviews a:not(i)" ).html( "Avis" );
</script> -->

<script>
	jQuery(document).ready(function($){


$(".Click-here").on('click', function() {
  $(".custom-model-main").addClass('model-open');
}); 
$(".close-btn, .bg-overlay").click(function(){
  $(".custom-model-main").removeClass('model-open');
});
});
</script>
</body>
</html>