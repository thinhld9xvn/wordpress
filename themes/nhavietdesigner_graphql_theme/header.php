<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="google-site-verification" content="frRteak9fFTX1tTukTGMhAzAKOPVBUU8z8wk_LatNH0" />
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/fonts/transfonter/stylesheet.css"
              rel="stylesheet"/>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/fonts/font-awesome/css/font-awesome.min.css"
              rel="stylesheet"/>
    <?php wp_head(); ?>

    <noscript id="deferred-styles">
        
       
        <link href="<?php echo get_template_directory_uri(); ?>/assets/fonts/themify-icons/themify-icons.css"
              rel="stylesheet"/>
    </noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144624905-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-144624905-1');
    </script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MF6FMWC"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script id='autoAdsMaxLead-widget-script' src='https://cdn.autoads.asia/scripts/autoads-maxlead-widget.js?business_id=457F8C8AB926477BAE1B9C379A268441' type='text/javascript' charset='UTF-8' async></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MF6FMWC');</script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PNH2BWW"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--animsition-->
<div class="main-wrapper">


    <header class="vk-header ">


        <div class="vk-header__mid">
            <div class="vk-container">
                <div class="vk-header__mid-content">

                    <a href="<?php echo get_home_url(); ?>" class="vk-header__logo">
                        <img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]; ?>"
                             alt="LOGO">
                    </a>
                    <nav class="vk-header__menu">
                        <?php
                        $locations = get_nav_menu_locations();
                        $flatMainNav = wp_get_nav_menu_items($locations['header-menu']);
                        $mainNav = buildTree($flatMainNav);
                        ?>
                        <ul class="vk-menu__main">
                            <?php foreach ($mainNav as $key => $menu_main) : ?>
                                <li>
                                    <a href="<?php echo $menu_main->url; ?>"><?php echo $menu_main->title; ?></a>
                                    <?php if (!empty($menu_main->children)) : ?>
                                        <ul class="vk-menu__child">
                                            <?php foreach ($menu_main->children as $value) : ?>
                                                <li><a href="<?php echo $value->url; ?>"
                                                       data-scroll-to="<?php echo $value->url; ?>"
                                                       data-scroll-offset="0"><?php echo $value->title; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </nav>


                    <a href="#menu" data-menu="#menu" class="vk-header__btn--menu d-lg-none"><i class="ti-menu"></i></a>


                </div>
            </div>
            <!--./container-->
        </div>
        <!--./mid-->

    </header>
    <!--./vk-header-->
    <section class="vk-content">