<?php 

    namespace Commercants;

    class CommercantPrintShopContactButtonsUtils {

        public static function print($commercants_list, $id) {            

            $shop_item = \Commercants\CommercantGetShopUtils::get_by_id($commercants_list, $id);      
            
            if ( $shop_item ) :

                $phone = $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] ? 
                                trim( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] ) : 
                                '';

                if ( $phone ) :

                    $phone = preg_replace("/\s|&nbsp;/",'',$phone);
                    $phone = implode('', explode(' ', $phone ) );

                endif; ?>
    
                <div class="col-wrap shop-contacts flex flex-wrap flex-col-direction">
        
                    <?php if ( ! empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] ) && 
                                trim( mb_strtolower( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE], 'UTF-8' ) ) !== 'non' ) : ?> 
        
                        <a href="tel:<?php echo $phone ?>" 
                            class="btn btn-primary btnShopPhone">Appeler <span class="fa fa-chevron-right"></span></a>
        
                    <?php endif; ?>
        
                    <?php if ( ! empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE] ) && 
                                trim( mb_strtolower( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE], 'UTF-8' ) ) !== 'non' ) : ?> 
        
                        <a href="<?php echo 'mailto:' . $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE] ?>" 
                            class="btn btn-primary btnShopEmail">E-Mail<span class="fa fa-chevron-right"></span></a>
        
                    <?php endif; ?>
        
                    <?php if ( ! empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET] ) && 
                                trim( mb_strtolower( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET], 'UTF-8' ) ) !== 'non' ) : ?> 
        
                        <a href="<?php echo \Urls\UrlAddProtocolUtils::add($shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET]) ?>" 
                            class="btn btn-primary btnShopSite">Site Web<span class="fa fa-chevron-right"></span></a>
        
                    <?php endif; ?>
        
                </div>

     <?php endif; 
        
        }

    }