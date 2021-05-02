<?php 

    namespace Loaders;

    class LoaderPrintAddListingAjaxUtils {

        public static function print($classname = '', 
                                        $msg = 'Please wait while the request is being processed.') { ?>

            <div class="loader-bg main-loader add-listing-loader <?= $classname ?> loader-hidden" style="background-color: rgb(255, 255, 255); display: none;">
                <div class="paper-spinner" style="width: 28px; height: 28px;">
                    <div class="spinner-container active">
                        <div class="spinner-layer layer-1" style="border-color: #000;">
                            <div class="circle-clipper left">
                                <div class="circle" style="border-width: 3px;"></div>
                            </div>
                            <div class="gap-patch">
                                <div class="circle" style="border-width: 3px;"></div>
                            </div>
                            <div class="circle-clipper right">
                                <div class="circle" style="border-width: 3px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="add-listing-loading-message"><?= $msg ?></p>
            </div>

        <?php }

    }