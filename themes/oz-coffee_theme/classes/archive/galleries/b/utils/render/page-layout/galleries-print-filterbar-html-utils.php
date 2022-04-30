<?php 

    namespace Archive\Galleries\PageLayout;  
    
    use \Archive\Galleries\GalleriesGetStylesListUtils;
    use \Archive\Galleries\GalleriesGetTermStyleUtils;
    
    class GalleriesPrintFilterBarHtmlUtils {

        public static function render() {            

            $term = GalleriesGetTermStyleUtils::get($_GET['style']);
            
            $results = GalleriesGetStylesListUtils::get();
            
            if ( $results ) : ?>
            
             <form id="frmFilterGalleriesStyle" method="GET"> 
            
                <div class="galleriesMajFilterBar flex-layout flex-justify-end">

                    <div class="majFilterContainerElem">

                        <span class="mjFilterValSelected" 
                                data-value="<?= $term->slug ?>"><?= $term->name ?></span>

                        <ul>
                            <?php foreach( $results as $key => $item ) : ?>
                                <li class="<?= $item->slug === $term->slug ? 'hidden' : '' ?>">
                                    <a data-value=" <?= $item->slug ?>" href="#">
                                        <?= $item->name ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        
                        </ul>

                    </div>                            
                            
                </div>

                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                <input type="hidden" name="pid" value="<?= $_GET['pid'] ?>" />
                <input type="hidden" name="slug" value="<?= $_GET['slug'] ?>" />
                <input type="hidden" name="style" value="<?= $_GET['style'] ?>" />

            </form>

        <?php endif; ?>           
           

        <?php }
        

    }