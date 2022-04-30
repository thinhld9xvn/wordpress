<?php 

    namespace Slider;

    class SliderPrintItemHtmlUtils {

       public static function render($post) { 

            ob_start(); 

            $breadcrumbs_label = SliderGetBreadcrumbsLabelUtils::get($post->ID);
            $heading = implode('<br/>', explode(' ', $post->post_title));
            $button_text = SliderGetButtonTextUtils::get($post->ID);
            $button_url = SliderGetButtonUrlUtils::get($post->ID);
            $description = SliderGetDescriptionUtils::get($post->ID);
            
            ?>

                <div class="item main-slider-item">
                                    
                    <div class="wrapper">
                        <div class="breadelem">
                           <?= $breadcrumbs_label ?>
                        </div>
                        <h1>
                            <?= $heading ?>
                        </h1>
                        <p>
                            <?= $description ?>
                        </p>
                        <p>
                            <a class="btnPrimaryLayout" href="<?= $button_url ?>">
                                <?= $button_text ?>
                                <span class="fa fa-long-arrow-right padLeft10"></span>
                            </a>
                        </p>
                    </div>
                </div>

        <?php 
            $contents = ob_get_contents();

            ob_end_clean();

            echo $contents;           
        
           
       }

    }