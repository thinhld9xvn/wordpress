<?php 

    namespace Stores;

    class StorePrintLocationUtils {

        public static function print() { ?>     

            <script type="text/javascript">
                var shop_coords = null;
            </script>

            <?php 

                $messages = \MessageNotification\MessageGetUtils::get_all();    

                $commercants_lists = \Commercants\CommercantGetListUtils::get();
                $commercants_coords_list = \Commercants\CommercantGetCoordsListUtils::get();

                $id = \Strings\StringGetQueryUtils::get('shop_id');
                
                //$id = \Commercants\CommercantSearchShopUtils::search_id($commercants_lists, $shop_id);

                //echo var_dump($id);

                $shop_coords = $commercants_coords_list[$id];
                //$shop_data = $commercants_lists[$id];  

                //$shop_name = $commercants_lists[$id][\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE];

                if ( ! is_null( $shop_coords ) ) : ?>     

                    <script type="text/javascript">
                        shop_coords = <?php echo json_encode($shop_coords) ?>;
                    </script>

            <?php endif; ?>

            <div id="page-entry-location">
                <div class="entry-wrapper">

                    <div class="entry-column flex flex-wrap <?= is_null( $shop_coords ) ? "flex-just-center" : ""  ?>">

                        <?php  
                            if ( ! is_null( $shop_coords ) ) :  

                                \Commercants\CommercantPrintShopInformationUtils::print($commercants_lists, $id); 
                                \Commercants\CommercantPrintShopContactButtonsUtils::print($commercants_lists, $id); ?>

                                <div class="col-wrap shop-gmap no-padleft-sm no-padleft-xs">
                                    <div id="map"></div>
                                </div>
                                
                    <?php   else : ?>

                                <div class="empty-lists-box"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::NOT_FOUND_STORE_INFORMATION_LABEL_ID] ?></div>      
                                
                        <?php 
                            endif; ?>

                        
                    </div>

                    <div class="entry-column flex flex-wrap">

                        <?php \Commercants\CommercantPrintShopInformationUtils::print_extra($commercants_lists, $id) ?>

                    </div>

                </div>

            </div>
            
            
        <?php }

    }