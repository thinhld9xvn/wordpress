<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( "charset" ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />	
		<?php wp_head(); ?>
	</head>

    <body>

    <?php 
        $gco_primary_menu_walker = new GCO_NavMenu_Walker;
        $gco_mobile_menu_walker = new GCO_NavMenu_Mobile_Walker; ?>

    <div id="header" 
         class="header backgroundi-lazy"
         <?php renderStyleBackgroundImage() ?>>

        <div class="header-element header-top">

            <div class="container flex-layout flex-align-center flex-justify-space-between">
                
                <div class="logo logo-header">

                    <?php \Logo\LogoPrintPrimaryHtmlUtils::render(); ?>

                </div>
                
                <div class="menu main-menu header-main-menu">

                    <div class="primary-menu main-primary-menu">
                        <?php                            
                            $args = array(
                                'theme_location' => 'primary',
                                'menu_id' => '',
                                'menu_class' => 'menu-container primary-menu-container flex-layout',
                                'container' => '',
                                'walker' => $gco_primary_menu_walker
                            );							
                            wp_nav_menu( $args ); ?>	
                     
                    </div>

                    <div class="mobile-menu main-mobile-menu">

                        <button>
                            <span class="fa fa-navicon"></span>
                        </button>

                        <?php                            
                            $args = array(
                                'theme_location' => 'primary',
                                'menu_id' => 'main-mobile-menu',
                                'menu_class' => 'mobile-menu menu',
                                'container' => '',
                                'walker' => $gco_mobile_menu_walker
                            );							
                            wp_nav_menu( $args ); ?>
                      
                    </div>

                </div>
                
                <div class="search header-search">

                    <a href="#">
                        <img src="<?= THEME_IMAGES_DIR_URI . '/search.png' ?>" alt="search-icon">
                    </a>

                    <div class="header-search-box">

                        <form class="frmSearch" method="get" action="<?php bloginfo('url') ?>">

                            <input type="search" name="s" placeholder="Tìm kiếm ...">

                        </form>

                    </div>

                </div>

                <div class="search header-social flex-layout flex-align-center">

                    <?php \Social_Network\SocialNetworkPrintFbHtmlUtils::render(); ?>

                    <?php \Social_Network\SocialNetworkPrintInstagramHtmlUtils::render(); ?>

                    <?php \Social_Network\SocialNetworkPrintYoutubeHtmlUtils::render(); ?>

                </div>
            </div>
        </div>
           