<?php 

    namespace Profiles;

    class ProfilePrintListingMenuTabsUtils {

        public static function print() {

            global $post;
        
            $tabs_info = _get_single_profile_listing_tabs_info(); ?>
    
            <ul class="cts-carousel" style="position: relative;">
    
                <?php foreach ( $tabs_info as $key => $tab ) : 
                    
                    $id = mb_strtolower( $tab['id'], 'UTF-8' );
                    
                    if ( ! UserMemberShip::is_not_active_user($post->post_author) && 
                         $id === 'proposal' ) continue; ?>
    
                    <li class="<?= $key === 0 ? 'active' : '' ?>">
    
                        <a id="listing_tab_<?php echo $id ?>_toggle" 
                            data-section-id="<?php echo $id ?>" 
                            class="listing-tab-toggle toggle-tab-type-main" 
                            data-options="{}">
                            <?php echo ucfirst($tab['label']) ?>
                        </a>
    
                    </li>
    
                <?php endforeach; ?>
              
                <li class="cts-prev">prev</li>
                <li class="cts-next">next</li>  
    
            </ul>

        <?php }

    }

    