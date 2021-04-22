<?php 

    namespace Commercants;

    class CommercantParseListsToOptionsUtils {

        public static function parse($list, $parse_by_idx = false) {

            $commercants_list = '';

            if ( sizeof( $list ) > 0 ) :
    
                foreach( $list as $key => $row ) :
    
                    $commercants_list .= sprintf("%s: %s" . PHP_EOL . // ENSEIGNE
                                                "%s: %s" . PHP_EOL . // NUMERO
                                                "%s: %s" . PHP_EOL . // ADDRESSE
                                                "%s: %s" . PHP_EOL . // VILLE
                                                "%s: %s" . PHP_EOL . // TELEPHONE_COMMERCE
                                                "%s: %s" . PHP_EOL . // SECTEUR_ACTIVITY
                                                "%s: %s" . PHP_EOL . // CODE_POSTAL
                                                "%s: %s" . PHP_EOL . // EMAIL_COMMERCE
                                                "%s: %s" . PHP_EOL . // PORTABLE_RESPONSABLE
                                                "%s: %s" . PHP_EOL . // EMAIL_RESPONSABLE
                                                "%s: %s" . PHP_EOL . // SITE_INTERNET
                                                "%s: %s" . PHP_EOL . // PAGE_FACEBOOK
                                                "%s: %s" . PHP_EOL . // JOURS_OUVERTURE_HIVER
                                                "%s: %s" . PHP_EOL . // HORAIRES_HIVER
                                                "%s: %s" . PHP_EOL . // JOURS_FERMETURE_HIVER
                                                "%s: %s" . PHP_EOL . // JOURS_OUVERTURE_ETE
                                                "%s: %s" . PHP_EOL . // HORAIRES_ETE
                                                "%s: %s" . PHP_EOL . /// JOURS_FERMETURE_ETE
                                                "%s: %s" . PHP_EOL . // PARTICULARITES_HORAIRES
                                                "%s: %s" . PHP_EOL . // ANNUAIRE
                                                "%s: %s" . PHP_EOL . // MASQUES_RESCUS
                                                "%s: %s" . PHP_EOL, // BAIL_SAISONNIER
                                                \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::VILLE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY,
                                                ! $parse_by_idx ?$row[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE, 
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS_IDX],
                                                \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER,
                                                ! $parse_by_idx ? $row[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER] : $row[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER_IDX]);
    
                    $commercants_list .= \Stores\STORE_DATA::STORE_DELIMITER . PHP_EOL;
    
                endforeach;     

                //\Commercants\CommercantUpdateListsOptionUtils::update($commercants_list); 
                
                //\Commercants\CommercantSetMapCategoriesUtils::map();
    
            endif;      
            
            return $commercants_list;

        }    

    }