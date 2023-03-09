<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <meta name="facebook-domain-verification" content="mjx1yum5o9y3xzb325e8enun5s2oux" />

	<?php wp_head(); ?>
        
     <script>
         const IMG_DIR = "<?php echo get_stylesheet_directory_uri(); ?>/";
    </script>

</head>

<body <?php body_class(); ?>>
    
    <div id="popup_1" class="popup">	
	  <div class="popup-content">
		  <a href="javascript:;" class="close-popup" data-id="popup_1" data-animation="scale">&times;</a>
		  <div class="popup-content-top">
			  <img class="img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/images/html/img-popup-1.png" width="110" height="89" alt="" />
			  <h3 class="title-popup">Vous Êtes-vous eligible ?</h3>
			  <p>Le paiement ne sera pas débité de votre compte bancaire tant que l'état ne vous aura pas versé les 500€ de remboursement. Enregistrer la caution et activer mon compte</p>
		  </div>
		  <div class="popup-content-bottom">
			  <ul>
				  <li>Remplir la demande de remboursement de l'état pour un montant de 500€, Lifeln se chargera de l'envoyer correctement remplie à l'état.
				  </li>
				  <li><a href="https://lifein.click/valider/">Valider les conditions générales</a></li>
			  </ul>
			  <div class="box-btn"><a href="#" class="btn">Profitez de l'offre</a></div>
		  </div>
	  </div>
  </div>

<?php do_action( 'flatsome_after_body_open' ); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

	<?php do_action( 'flatsome_before_header' ); ?>

	<header id="header" class="header <?php flatsome_header_classes(); ?>">
		<div class="header-wrapper">
			<?php get_template_part( 'template-parts/header/header', 'wrapper' ); ?>
		</div>
	</header>

	<?php do_action( 'flatsome_after_header' ); ?>

	<main id="main" class="<?php flatsome_main_classes(); ?>">