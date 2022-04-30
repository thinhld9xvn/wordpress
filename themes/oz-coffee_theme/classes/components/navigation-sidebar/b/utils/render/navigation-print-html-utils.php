<?php 

    namespace Navigation_Sidebar;

    class NavSidebarPrintHtmlUtils {

        public static function render() {

            ob_start();             
            
            $fb_messenger_icon = NavSidebarGetFbMessengerIconUtils::get();
            $fb_messenger_url = NavSidebarGetFbMessengerUrlUtils::get();

            $order_party_icon = NavSidebarGetOrderPartyIconUtils::get();

            $phone_supporter_icon = NavSidebarGetPhoneSupporterIconUtils::get();
            $phone_supporter_url = NavSidebarGetPhoneSupporterUrlUtils::get(); 
            
            $fb_messenger_attachment_id = pn_get_attachment_id_from_url($fb_messenger_icon);            
            $fb_messenger_attachment = wp_get_attachment_image($fb_messenger_attachment_id, 
                                                                'thumbnail', 
                                                                false, 
                                                                array('class' => 'image-rotate'));
                                                                
            $order_party_attachment_id = pn_get_attachment_id_from_url($order_party_icon);
            $order_party_attachment = wp_get_attachment_image($order_party_attachment_id, 
                                                                'thumbnail', 
                                                                false, 
                                                                array('class' => 'image-rotate'));
                                                                
            $phone_supporter_attachment_id = pn_get_attachment_id_from_url($phone_supporter_icon);
            $phone_supporter_attachment = wp_get_attachment_image($phone_supporter_attachment_id, 
                                                                'thumbnail', 
                                                                false, 
                                                                array('class' => 'image-rotate'));?>

            <div class="navigation-contact fixed-sidebar support-sidebar shortcut-sidebar">
                <div class="wrapper flex-layout flex-direction-column">
                    <div class="navig-item item-rotate-icon-animation">
                        <a href="#"  modal-type="master-modal" modal-target="#modalOrderParty">
                            <?php echo $order_party_attachment ?>
                        </a>
                    </div>
                    <div class="navig-item item-rotate-icon-animation">
                        <a href="<?= $phone_supporter_url ?>">
                            <?php echo $phone_supporter_attachment ?>
                        </a>
                    </div>
                    <div class="navig-item item-rotate-icon-animation">
                        <a href="<?= $fb_messenger_url ?>">
                            <?php echo $fb_messenger_attachment ?>
                        </a>
                    </div>
                </div>
            </div>

            <div id="modalOrderParty" style="display:none;">

                <h3 class="modal-header">Tư vấn đặt tiệc</h3>
        
                <div class="modal-body">

                    <div class="contactFormItemElem contactFormOrderModal">

                        <?php
                            $cf7_id = \Page\Contact\ContactGetMetaFormCF7IdFieldUtils::get(PAGE_CONTACT_ID);

                            echo do_shortcode("[contact-form-7 id='{$cf7_id}']"); ?>
                        
                    </div>
                    
                </div>
        
            </div>

        <?php 

            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;


        }

    }