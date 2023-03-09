<?php
/* Template Name: Home page */ 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Des solutions adaptées à tous types de commerces. Life In est La solution pour passer au e-commerce. Commerçants, inscrivez-vous maintenant sur Life In">
    <meta name="author" content="Life In">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Life in - Digitalisez votre commerce - Dès 20€ par mois</title>
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/html/favicon-32x32.png">
    <!-- Bootstrap core CSS -->
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  	<!-- Custom styles for this template -->
  	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,500;0,600;0,700;0,800;0,900;1,300;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	  <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/popup.css" rel="stylesheet">
    <script>
          const IMG_DIR = "<?php echo get_stylesheet_directory_uri(); ?>/";
    </script>
  </head>        
  <body>
    <div id="wrapper">
	  <header class="header">
		<div class="header-wrapper container container-custom">
			<div class="header-main navbar-expand-xl">
				<div class="row flex-row flex-nowrap justify-content-between align-items-center">
					<div class="col-4 d-xl-none d-flex justify-content-start">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMobile" aria-controls="navbarsMobile" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					  <div class="col-6 d-none d-xl-block text-left">
						<ul class="header-main smooth-scroll navbar-nav bd-navbar-nav flex-row justify-content-lg-start">
							<li class="nav-item">
					  <a class="nav-link js-scroll-trigger" href="https://lifein.click/mairie/" data-mode="popup" data-size="100" target="_blank">Vous êtes une mairie ?</a>
				  </li>	
					
						</ul>
					  </div>
					<div id="logo" class="col-8 col-lg-3 text-right">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/html/logo.svg" width="218" alt="LifeIn"/>
					</div>

				</div>	
			</div>	
		</div>
		  <div class="collapse navbar-collapse" id="navbarsMobile">
			  <button class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#navbarsMobile" aria-controls="navbarsMobile" aria-expanded="true">
				  <div class="close-icon"></div>
			  </button>
			  <ul class="navbar-nav">
				  <li class="nav-item">
					  <a class="nav-link js-scroll-trigger" href="https://lifein.click/mairie/" data-mode="popup" data-size="100" target="_blank">Vous êtes une mairie ?</a>
				  </li>		
			  </ul>
		  </div>
	  </header>
	<main id="main">
		<div id="content" role="main">		

			<?php dynamic_sidebar('Home Sidebar') ?>
			
			
		</div>
	</main><!-- /.container -->
	  <footer id="footer" class="footer-wrapper">
        
		  <?php dynamic_sidebar('Home Footer Sidebar') ?>
        
	  </footer>
	</div>  
        
         <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/jquery.min.js"></script>
	  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
	  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/jquery-easing/jquery.easing.min.js"></script>
	  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/scrolling-nav.js"></script>
	  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/qa.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/homepage-init.js"></script>
        <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-190010265-1');
</script>
	
</body>
</html>