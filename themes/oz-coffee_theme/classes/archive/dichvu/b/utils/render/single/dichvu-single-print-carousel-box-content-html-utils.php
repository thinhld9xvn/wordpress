<?php 

    namespace Archive\Services;

    class SVSinglePrintCarouselBoxContentHtmlUtils  {

        public static function render($post, $side = 0, $id = 0) {
            
            $title = strip_tags( $side === 0 ? SVGetMetaCarouselAboveTitleFieldUtils::get($post->ID, $id) : 
                                               SVGetMetaCarouselBelowTitleFieldUtils::get($post->ID, $id) );

            $description = strip_tags( $side === 0 ? SVGetMetaCarouselAboveDescriptionFieldUtils::get($post->ID, $id) : 
                                                     SVGetMetaCarouselBelowDescriptionFieldUtils::get($post->ID, $id));

            $button_text = strip_tags( $side === 0 ? SVGetMetaCarouselAboveButtonTextFieldUtils::get($post->ID, $id) :
                                                     SVGetMetaCarouselBelowButtonTextFieldUtils::get($post->ID, $id) );

            $button_url = strip_tags( $side === 0 ? SVGetMetaCarouselAboveButtonUrlFieldUtils::get($post->ID, $id) : 
                                                    SVGetMetaCarouselBelowButtonUrlFieldUtils::get($post->ID, $id) ); ?>
           
            <div class="elem-jcarousel-hambird article-box-animation">

                <h2><?= $title ?></h2>

                <figcaption>
                    <?= $description ?>
                </figcaption>

                <a class="btnPrimaryLayout __dark mtop20" 
                    href="<?= $button_url ?>">

                    <span><?= $button_text ?></span>
                    <span class="fa fa-long-arrow-right padLeft10"></span>

                </a>

            </div>

        <?php }

    }