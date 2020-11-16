<?php $langcode = qt_get_current_lang(); ?>

<?php if (!is_404()): ?>
    </div> <!--.container-->
    </div> <!--#main-->
    </div> <!--.content_wrapper-->
    <?php
    $consulting_config = consulting_config();
    $logo_tmp = '';
    if (!empty($consulting_config['layout']) && $consulting_config['layout'] != 'layout_1' && $consulting_config['layout'] != 'layout_12') {
        $logo_tmp = $consulting_config['layout'] . '_';
    }
    $footer_style = get_theme_mod('footer_style', 'style_1');
    $socials = consulting_get_socials('footer_socials');
    $page_ID = consulting_page_id();
    $copyright_class = '';
    $copyright_border_top = get_post_meta($page_ID, 'separator_footer_copyright_border_t', true);

    if ($copyright_border_top) {
        $copyright_class .= ' border-top-hide';
    }

    $copyright = get_theme_mod('footer_copyright', wp_kses(__("Copyright &copy; 2012-2018 Consulting Theme by <a href='https://themeforest.net/item/consulting-business-finance-wordpress-theme/14740561' target='_blank'>Stylemix Themes</a>. All rights reserved", 'consulting'), array('a' => array('href' => array(), 'target' => array()))));
    $footer_class = '';
    $footer_class = ' ' . $footer_style;

    if (empty($copyright) || empty($socials) && $footer_style != 'style_1') {
        $footer_class .= ' no-copyright';
    }

    if (stm_check_layout('layout_14') and get_theme_mod('enable_page_switcher', true) and is_front_page()) {
        get_template_part('partials/page-scroll');
    }
    ?>
    <?php if (!get_theme_mod('footer_show_hide', false)): ?>

        <footer id="footer" class="footer<?php echo esc_attr($footer_class); ?>">   

            <div class="widgets_row">

                <div class="container">

                    <div class="footer_widgets">

                        <div class="row"> 

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">                                        
                                    <?php if ($footer_logo = get_theme_mod('footer_logo', '')): ?>

                                        <div class="footer_logo text-center">
                                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                                <img src="<?php echo esc_url($footer_logo); ?>"
                                                     alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
                                            </a>
                                        </div>

                                    <?php endif; ?>

                                    <?php dynamic_sidebar("consulting-footer-1-qtranslate-{$langcode}"); ?>                                                                         
                                    
                                </div>

                                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">                                        
                                   <?php dynamic_sidebar("consulting-footer-2-qtranslate-{$langcode}"); ?>
                                </div>

                                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">                                        
                                   <?php dynamic_sidebar("consulting-footer-3-qtranslate-{$langcode}"); ?>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>              
           

            <?php if (!empty($copyright) || !empty($socials) && $footer_style == 'style_1') : ?>
                <div class="copyright_row<?php echo esc_attr($copyright_class); ?><?php echo (get_theme_mod('footer_sidebar_count', 4) == 'disable') ? ' widgets_disabled' : ''; ?>">
                    <div class="container">
                        <div class="copyright_row_wr">
                            <?php if (!get_theme_mod('footer_show_hide_socials', false)): ?>
                                <?php if (!empty($socials) && $footer_style == 'style_1'): ?>
                                    <div class="socials">
                                        <ul>
                                            <?php foreach ($socials as $key => $val): ?>
                                                <li>
                                                    <a href="<?php echo esc_url($val); ?>" target="_blank"
                                                       class="social-<?php echo esc_attr($key); ?>">
                                                        <i class="fa fa-<?php echo esc_attr($key); ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (!empty($copyright)): ?>
                                <div class="copyright">
                                    <?php if (!get_theme_mod('footer_current_year', false)): ?>
                                        <?php printf(_x('%s', 'Copyright', 'consulting'), $copyright); ?>
                                    <?php else: ?>
                                        <?php printf(_x('© %s %s', '© year copyright', 'consulting'), date('Y'), $copyright); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
    <?php endif; ?>
    </div> <!--#wrapper-->
<?php endif; ?>
<?php do_action('frontend_customizer'); ?>
<?php wp_footer(); ?>
<?php get_template_part('partials/custom_footer'); ?>

<div class="sidebar-contact-us">

    <div class="channel-contact-whatsapp">
        <span>Kết nối với chúng tôi qua Zalo</span>
    </div>

    <div class="channel-contact-form" data-toggle="modal" data-target="#request-messenger-dialog">
        <span>Để lại cho GIG một tin nhắn</span>
    </div>

    <div class="channel-click-to-call" data-toggle="modal" data-target="#request-call-gig-dialog">
        <span>Yêu cầu một cuộc gọi từ GIG</span>
    </div>

    <div class="channel-download-catalogue" data-toggle="modal" data-target="#request-download-catalogue-dialog">
        <span>Tải cẩm nang định cư Châu Âu từ GIG</span>
        <div class="bg"></div>
    </div>

    <div class="channel-facebook-messenger" onclick="window.open('https://m.me/goinvestglobal', '_blank')">
        <span>Kết nối với GIG qua Facebook</span>
    </div>

    <div class="channel-scrollToTop" onclick="scrollToTop()">       
    </div>

</div>
 
<div class="modal" id="google-cse" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tìm kiếm trên Google</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <script async data-src="https://cse.google.com/cse.js?cx=015552850500402914639:fz7dzv1sxsd"></script>
        <div class="gcse-search"></div>        

      </div>
   
    </div>
  </div>
</div>

<div class="modal" id="catalogue-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: transparent;">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <?php if ( ! wp_is_mobile() ) : ?>

                <div class="catalogue-bg text-center">
                    <img style="width: 90px; height: 90px;" src="<?= loadingIcon ?>" data-src="https://123sendmail.blob.core.windows.net/images/1284720191125113331.png" alt="catalogue-bg">
                </div>   

            <?php endif; ?>       

           <script class="script-webform-toomarketer" id="script-webform-toomarketer" src="https://forms.toomarketer.com/scripts/toomarketer-web-form-nonejs.v2.js?fId=MzMxNDk="></script>

      </div>
   
    </div>
  </div>
</div>

<div class="modal" id="request-call-gig-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: transparent;">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

            <script class="script-webform-toomarketer" id="script-webform-toomarketer" src="https://forms.toomarketer.com/scripts/toomarketer-web-form-nonejs.v2.js?fId=MzMxNTE="></script>

            <div class="myform-title text-center">
                <strong>GIG sẽ liên hệ cho quý vị sớm nhất có thể.</strong>
            </div>

            <div class="myform-notice">

              <small>
                <span>Hoặc là</span>
              </small>

              <div class="myform-contact">

                <div><strong>Liên hệ chúng tôi</strong></div>

                <div><strong>(+84) 0981 557 998</strong></div>

              </div>

          </div>
            
      </div>
   
    </div>
  </div>
</div>

<div class="modal" id="request-messenger-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: transparent;">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

           <script class="script-webform-toomarketer" id="script-webform-toomarketer" src="https://forms.toomarketer.com/scripts/toomarketer-web-form-nonejs.v2.js?fId=MzMxNTI="></script>
            
      </div>
   
    </div>
  </div>
</div>

<div class="modal" id="request-download-catalogue-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-color: transparent;">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

           <script class="script-webform-toomarketer" id="script-webform-toomarketer" src="https://forms.toomarketer.com/scripts/toomarketer-web-form-nonejs.v2.js?fId=MzI5NjE="></script>

      </div>
   
    </div>
  </div>
</div>

<style required="true">
    @media (min-width: 992px) {
        #catalogue-dialog .modal-body {
            display: table; 
            width: 100%
        }
        #catalogue-dialog .catalogue-bg {
             float: left;
            width: 40%;
        }
        #catalogue-dialog .control-web-form {
            width: 60% !important;
            max-width: 60% !important;
        }
    }
</style>

</body>
</html>