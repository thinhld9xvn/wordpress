<?php 

    namespace Commercants;

    class CommercantEditInfoOptionUtils {

        public static function edit($data) {

            /*echo "<pre>";
            print_r($data); die();*/

            $commercantsList = \Commercants\CommercantGetListUtils::get();

            $shop_name = \Strings\StringFormatUtils::format(trim($data[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE]), 
                                                                'lowercase');           

           $shop_idx = \Commercants\CommercantSearchShopUtils::search_id($commercantsList, $shop_name);         

            if ( $shop_idx === -1 ) :
                
                return false;

            endif;

            $shop_item = &$commercantsList[$shop_idx];

            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS];
            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER] = $data[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER];          

            $options = \Commercants\CommercantParseListsToOptionsUtils::parse($commercantsList);

            \Commercants\CommercantUpdateListsOptionUtils::update($options);

            return true;
            
        
        }

    }