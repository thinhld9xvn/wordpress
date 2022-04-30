<?php 

    namespace Archive\Galleries\Single;

    use \Archive\Galleries\GALLERIES_FIELDS;
    use \Archive\Galleries\GalleriesGetMetaLinkTaxFieldUtils;

    class GalleriesPrintItemHtmlUtils {

        public static function render($data) {
            
            global $post;

            $id = $data['id'];          

            $title = $data[GALLERIES_FIELDS::GALLERY_ITEM_TITLE];

            $icon_url = $data[GALLERIES_FIELDS::GALLERY_ITEM_ICON];
            $icon_attachment_id = pn_get_attachment_id_from_url($icon_url);
            $icon_attachment_image = wp_get_attachment_image($icon_attachment_id);

            $thumbnail_url = $data[GALLERIES_FIELDS::GALLERY_ITEM_THUMBNAIL];
            $thumbnal_attachment_id = pn_get_attachment_id_from_url($thumbnail_url);
            $thumbnail_attachment_src = wp_get_attachment_image_src($thumbnal_attachment_id, 'thumbnail_attachment_src')[0]; 
            
            $style_default = GALLERIES_FIELDS::GALLERIES_STYLE_DEFAULT; 
            
            $link_tax_slug = GalleriesGetMetaLinkTaxFieldUtils::get($data); ?>

            <div class="item item-thumbnail-animation item-rotate-icon-animation">

                <div class="wrapper">
                    <div class="thumbnail bg-default-settings bg-fullheight backgroundi-lazy" 
                        data-src="<?= $thumbnail_attachment_src ?>"></div>
                    <figure class="flex-layout flex-justify-center flex-align-center flex-direction-column">
                        <?php echo $icon_attachment_image ?>
                        <label><?= $title ?></label>
                    </figure>
                    <a class="catalog-link" 
                        href="<?= PAGE_GALLERY_URL . "?id={$id}&pid={$post->ID}&slug={$link_tax_slug}&style={$style_default}" ?>"></a>
                </div>

            </div>

        <?php }
        

    }