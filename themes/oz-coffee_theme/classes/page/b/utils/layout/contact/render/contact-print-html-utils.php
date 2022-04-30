<?php 

    namespace Page\Contact;

    class ContactPrintHtmlUtils  {

        public static function render($post) {  ?>

            <div id="page-main-elements">
                  
                <div class="page-contents">

                    <div class="container">

                       <?php ContactPrintGooglemapHtmlUtils::render($post) ?>

                        <div class="googlemapGridLayoutElem grid-two-columns">

                            <?php ContactPrintFormBannerHtmlUtils::render($post) ?>            

                            <?php ContactPrintFormCF7HtmlUtils::render($post) ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php }

    }