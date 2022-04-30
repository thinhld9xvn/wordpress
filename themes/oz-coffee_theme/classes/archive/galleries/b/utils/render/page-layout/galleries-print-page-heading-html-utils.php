<?php 

    namespace Archive\Galleries\PageLayout;

    use \Archive\Galleries\GALLERIES_FIELDS;

    class GalleriesPrintPageHeadingHtmlUtils {

        public static function render($data) { 
            
            $title = $data[GALLERIES_FIELDS::GALLERY_ITEM_TITLE];
            $description = $data[GALLERIES_FIELDS::GALLERY_ITEM_DESCRIPTION]; ?>
        
            <h2 class="sectionTitleHeading text-center">
                <?= $title ?>
            </h2>

            <div class="metadata metadata-datetime metadata-address-element flex-layout flex-justify-center">

               <?= $description ?>

            </div>
           
         

        <?php }
        

    }