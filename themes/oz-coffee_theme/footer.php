<?php
    $background_url = \Footer\FooterGetBackgroundUtils::get(); ?>

    <footer id="colon" class="backgroundi-lazy" data-src="<?= $background_url ?>">
        <div class="footer-row">
            <div class="container">

                <div class="footer-grid-layout grid-fours-columns grid-no-pad">

                    <?php dynamic_sidebar('Footer Sidebar'); ?>

                </div>
                
            </div>
        </div>
    </footer>

    <?php \Navigation_Sidebar\NavSidebarPrintHtmlUtils::render(); ?>    
   
    <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="xcVairEs"></script>

    <?php wp_footer(); ?>

</body>