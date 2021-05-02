<?php 

    namespace Loader;

    class LoaderPrintProposalSetStatusUtils {

        public static function print($msg = 'Loading. please wait ...') { ?>

            <div class="set-proposal-loader">
                <span class="fa fa-circle-o-notch fa-spin"></span>
                <span class="padLeft10"><?= $msg ?></span>
            </div>

        <?php }

    }