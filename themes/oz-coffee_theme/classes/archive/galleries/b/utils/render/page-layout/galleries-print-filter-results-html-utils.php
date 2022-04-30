<?php 

    namespace Archive\Galleries\PageLayout;     
  
    use \Archive\Galleries\GALLERIES_FIELDS;

    class GalleriesPrintFilterResultsHtmlUtils {

        public static function render($data) {

            $author = $data['author_name'];
            
            $results = GalleriesGetStyleListsQueryUtils::get($data);
            
            if ( $results ) : ?>            
           
                <div class="galleriesMajFilterResultsBoxElem">

                    <div class="majFilterGridLayoutElem grid-fours-columns">

                        <?php foreach ( $results as $key => $image ) :
                            
                            extract($image);
                            
                            $attachment_id = pn_get_attachment_id_from_url($thumbnail);
                            $attachment_src = wp_get_attachment_image_src($attachment_id, 'feature-image-galleries-large-image')[0];
                            $attachment_full_src = wp_get_attachment_image_src($attachment_id, 'full')[0]; ?>

                            <div class="item item-thumbnail-animation article-box-animation">

                                <a class="thumbnai bg-thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                                    href="#"
                                    data-bg-src="<?= $attachment_full_src ?>" 
                                    data-src="<?=  $attachment_src ?>"></a>

                                <h4>
                                    <a href="#"><?= $title ?></a>
                                </h4>

                                <figcaption>
                                    <?= $author ?>
                                </figcaption>

                            </div>
                        
                        <?php endforeach; ?>

                    </div>

                </div>

        <?php endif; ?>

       

        <?php }
        

    }