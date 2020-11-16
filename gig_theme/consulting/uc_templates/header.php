<?php $langcode = qt_get_current_lang();       
      $theme_main_walker = new GIG_Main_NavMenu_Walker(); 
      $theme_mobile_walker = new GIG_Mobile_NavMenu_Walker(); ?>

<!DOCTYPE html>

<html lang="<?= $langcode ?>" prefix="og: http://ogp.me/ns#">

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

    <!-- Hotjar Tracking Code for https://gig.com.vn/ -->
    <script type="text/javascript" required="true">        

        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1989787,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');

    </script>
    

</head>

<body <?php body_class(); ?>>

<?php do_action('consulting_before_header'); ?>

<div id="wrapper">

    <div id="fullpage" class="content_wrapper">

        <?php if (!is_404()): ?>

        <?php

        $consulting_config = consulting_config();

        $logo_tmp_src = '';

        if (!empty($consulting_config['layout']) && $consulting_config['layout'] != 'layout_1' && $consulting_config['layout'] != 'layout_12') {

            $logo_tmp_src = $consulting_config['layout'] . '/';

        }
        ?>

        <header id="header">

            <?php if (defined('STM_HB_VER')): ?>

                <?php do_action('stm_hb', array('header' => 'stm_hb_settings')); ?>

            <?php else: ?>

                <div class="header_top clearfix">                       

                    <div class="top">   

                        <div class="container">            

                            <div class="logo media-left media-middle">

                                <?php if ($logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/images/tmp/' . $logo_tmp_src . 'logo_default.svg')): ?>

                                    <a href="<?php echo esc_url(home_url('/')); ?>">                                    
                                        <img src="<?php echo esc_url($logo); ?>"
                                             style="width: <?php echo esc_attr(get_theme_mod('logo_width')) ?>px; height: <?php echo esc_attr(get_theme_mod('logo_height')) ?>px;"

                                             alt="<?php bloginfo('name'); ?>"/>

                                    </a>

                                <?php else: ?>

                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>

                                <?php endif; ?>

                            </div>

                            <div class="slogun">
                                An cư - lạc nghiệp - toàn cầu                                
                            </div>

                            <a href="tel:+84981557998" class="phone">

                                <span class="fa fa-phone"></span>
                                <span>0981 557 998</span>

                            </a>

                            <a href="#" data-toggle="modal" data-target="#google-cse" class="search-button">

                                <span class="fa fa-search"></span>
                                
                            </a>

                            <a href="#" data-toggle="modal" data-target="#catalogue-dialog" class="button-solugn">

                                Đăng ký cẩm nang định cư
                                
                            </a>

                            <ul class="l-bar lang-bar">
                                
                                <?php qt_the_laptop_languages(); ?>                   
                                      
                            </ul>     

                        </div>

                    </div>                        

                    <div class="top_nav media-body media-middle affix-top">

                        <div class="container">

                            <div class="top_nav_wrapper clearfix">

                                <?php

                                    wp_nav_menu(array(

                                            'theme_location' => "consulting-primary_menu-{$langcode}",

                                            'container' => false,

                                            'depth' => 4,

                                            'menu_class' => 'main_menu_nav',
                                            'walker' => $theme_main_walker

                                        )

                                    ); ?>

                            </div>

                        </div>
                        

                    </div>                              

                </div>               

                <div class="mobile_header">

                    <div class="logo_wrapper clearfix">

                        <div class="logo">

                            <?php if ($logo = get_theme_mod('dark_logo', get_template_directory_uri() . '/assets/images/tmp/' . $logo_tmp_src . 'logo_dark.svg')): ?>

                                <a href="<?php echo esc_url(home_url('/')); ?>"><img

                                            src="<?php echo esc_url($logo); ?>"

                                            style="width: 120px; height: 120px"

                                            alt="<?php bloginfo('name'); ?>"/></a>

                            <?php else: ?>

                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>

                            <?php endif; ?>

                        </div>

                        <div id="menu_toggle">

                            <button></button>

                        </div>

                    </div>

                    <div class="header_info">

                        <div class="top_nav_mobile">

                            <?php

                            wp_nav_menu(array(

                                    'theme_location' => "consulting-primary_menu-{$langcode}",

                                    'container' => false,

                                    'depth' => 4,

                                    'menu_class' => 'main_menu_nav',

                                    'walker' => $theme_mobile_walker

                                )

                            );

                            ?>

                        </div>

                    </div>

                    <ul class="l-bar lang-bar-mobile">

                        <?php qt_the_mobile_languages(); ?>
                        
                    </ul>

                    <a href="#" data-toggle="modal" data-target="#google-cse" class="search">
                        <span class="fa fa-search"></span>
                    </a>

                    <div class="contact">

                        <a href="tel:+84981557998" class="phone">
                            <span class="fa fa-phone"></span>
                        </a>

                        <a href="#" data-toggle="modal" data-target="#catalogue-dialog" class="catalogue">
                            <span class="fa fa-edit"></span>
                        </a>
                        
                    </div>

                    <ul class="l-bar lang-bar">
                                
                        <?php qt_the_laptop_languages(); ?>                   
                              
                    </ul>     


                    <a href="#" data-toggle="modal" data-target="#catalogue-dialog" class="button-solugn">

                        Đăng ký cẩm nang định cư
                        
                    </a>

                    <a href="tel:+84981557998" class="phone">

                        <span class="fa fa-phone"></span>
                        <span>0981 557 998</span>

                    </a>

                </div>                

            <?php endif; ?>

        </header>

        <div id="main" <?php if (get_theme_mod('footer_show_hide', false)): ?>class="footer_hide"<?php endif; ?>>            

            <div class="container">

                <?php get_template_part('partials/title_box'); ?>

<?php endif; ?>