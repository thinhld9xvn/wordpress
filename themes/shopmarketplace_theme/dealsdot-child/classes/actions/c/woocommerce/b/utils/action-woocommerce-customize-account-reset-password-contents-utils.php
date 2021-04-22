<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeAccountResetPasswordContentsUtils {

        public static function init() {

            $uid = $_GET['uid']; ?>

            <div class="outer-top-ts">
        
                <div class="container">
        
                    <div class="row">
        
                        <div class="col-md-12"> 
        
                            <div class="sign-in-page">
        
                                <?php 
                                    if ( $_POST['submit'] ) :         
        
                                        \Stores\StorePrintAfterSubmitResetPasswordUtils::print();
        
                                    else:  
        
                                        \Stores\StorePrintResetPasswordFormUtils::print();
                                    
                                    endif; ?>
        
                            </div>
        
                        </div>
        
                    </div>
        
                </div>
        
            </div>


        <?php }

    }


