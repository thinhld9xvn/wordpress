<?php
/**
 * Single listing cover details template.
 *
 * @since 2.0
 */

 global $post;

 if (  UserMemberShip::is_not_active_user($post->post_author) ) :

    $post_data = array(

        'id' => $post->ID,
        'image' => get_the_post_thumbnail_url( $post, 'full' ),
        'title' => $post->post_title,
        'link' => get_the_permalink($post->ID),
        'author' => $post->post_author

    );

?>

    <script type="text/javascript">

        var post_data = <?= json_encode($post_data) ?>;

        jQuery(function($) {

                $('#cta-61960c > a').attr('data-post-data', JSON.stringify(post_data));

        });

    </script>

    <div class="col-md-4">
        <div class="listing-main-buttons <?php printf( 'detail-count-%d', count( (array) $layout['cover_actions'] ) + count( $details ) ) ?>">
            <ul>
                <li id="cta-61960c" class="lmb-calltoaction">
                    <a href="#" 
                        class="cts-open-chat" 
                        data-post-data="" 
                        data-user-id="<?= $post->post_author ?>">

                        <i class="icon-chat-bubble-square-add"></i>
                        <span>Direct message</span>

                    </a>
                </li>
            </ul>
        </div>
    </div>

<?php endif; ?>