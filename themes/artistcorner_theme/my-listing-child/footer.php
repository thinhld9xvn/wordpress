<footer id="colony" class="colony">
    <div class="container">
        <?php dynamic_sidebar('footer') ?>
    </div>
</footer>

<?php 
    // MyListing footer hooks.
    do_action( 'case27_footer' );
    do_action( 'mylisting/get-footer' );

    wp_footer(); ?>

    <!-- Modal -->
    <div class="modal fade" id="modalVideoCallOneByOne" tabindex="-1" role="dialog" aria-labelledby="modalVideoCallOneByOne" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Video call</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="fa fa-close"></span>
                </button>
            </div>
            <div class="modal-body">

                <div id="agoraVideoCallOneByOne" data-url="<?= get_agora_video_call_url() ?>"></div>
                
            </div>
          
            </div>
        </div>
    </div>

</body>
</html>
