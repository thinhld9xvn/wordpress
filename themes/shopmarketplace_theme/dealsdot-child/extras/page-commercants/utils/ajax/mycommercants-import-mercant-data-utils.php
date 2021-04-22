<?php 

    namespace MyCommercantsPage;

    class MyCommercantsImportMercantDataUtils {

        public static function import() {

            require_once PAGE_COMMERCANTS_DIR . '/simplexlsx/SimpleXLSX.php';

            $file_url = $_POST['file_excel_url'];

            $commercants_list = array();

            if ( ! empty( $file_url ) ) :

                //echo $file_url;

                $file_contents = file_get_contents( $file_url );

                if ( $xlsx = \SimpleXLSX::parseData( $file_contents ) ) :

                    $rows = $xlsx->rows();

                    $first_row = $rows[0];

                    $first_row = array_map('trim', $first_row);
                    $first_row = array_map('strtoupper', $first_row);

                    //print_r($first_row); die();

                    $enseigne_idx = array_search('ENSEIGNE', $first_row); // name shop

                    $numero_idx = array_search('NUMERO', $first_row); // no.
                    $adresse_idx = array_search('ADRESSE', $first_row); // address
                    $ville_idx = array_search('VILLE', $first_row); // city
                    $phone_idx = array_search('TELEPHONE COMMERCE', $first_row); // phone
                    $secteur_idx = array_search('SECTEUR ACTIVITE', $first_row); // brand
                    $code_postal_idx = array_search('CODE POSTAL', $first_row); // code postal
                    $email_commerce_idx = array_search('EMAIL COMMERCE', $first_row); // email commerce
                    $portable_resp_idx = array_search('PORTABLE RESPONSABLE', $first_row); // portable_responsable
                    $email_resp_idx = array_search('EMAIL RESPONSABLE', $first_row); // EMAIL RESPONSABLE
                    $site_internet_idx = array_search('SITE INTERNET', $first_row); // SITE INTERNET
                    $page_fb_idx = array_search('PAGE FACEBOOK', $first_row); 
                    $jours_ouverture_hiver_idx = array_search('JOURS OUVERTURE HIVER', $first_row);
                    $horaires_hiver_idx = array_search('HORAIRES HIVER', $first_row); 
                    $horaires_ete_idx = array_search('HORAIRES ÉTÉ', $first_row); 
                    $jours_fermeture_hiver_idx = array_search('JOURS FERMETURE HIVER', $first_row); 
                    $jours_ouverture_ete_idx = array_search('JOURS OUVERTURE ÉTÉ', $first_row); 
                    $jours_fermeture_hiver_ete_idx = array_search('JOURS FERMETURE ETE', $first_row); 
                    $particularites_horaires_idx = array_search('PARTICULARITES HORAIRES', $first_row); 
                    $annuaire_idx = array_search('ANNUAIRE', $first_row); 
                    $masques_recus_idx = array_search('MASQUES RECUS', $first_row); 
                    $bail_saisonnier_idx = array_search('BAIL SAISONNIER ', $first_row); 

                    //echo var_dump($jours_ouverture_hiver_idx); die();

                    if ( $enseigne_idx !== false ) :

                        foreach ( $rows as $i => $row ) :

                            if ( $i === 0 ) continue;

                            $enseigne = stripslashes( $row[$enseigne_idx] );
                            $numero = $numero_idx !== false ? (string) $row[$numero_idx]:'';
                            $adresse = $adresse_idx !== false ? $row[$adresse_idx]:'';
                            $ville = $ville_idx !== false ? $row[$ville_idx]:'';
                            $phone = $phone_idx !== false ? (string) $row[$phone_idx]:'';
                            $secteur = $secteur_idx !== false ? $row[$secteur_idx]:'';
                            $code_postal = $code_postal_idx !== false ? (string) $row[$code_postal_idx]:'';
                            $email_commerce = $email_commerce_idx !== false ? $row[$email_commerce_idx]:'';
                            $portable_resp = $portable_resp_idx !== false ? $row[$portable_resp_idx]:'';
                            $email_resp = $email_resp_idx !== false ? $row[$email_resp_idx]:'';
                            $site_internet = $site_internet_idx !== false ? $row[$site_internet_idx]:'';
                            $page_fb = $page_fb_idx !== false ? $row[$page_fb_idx]:'';
                            $jours_ouverture_hiver = $jours_ouverture_hiver_idx !== false ? $row[$jours_ouverture_hiver_idx]:'';
                            $horaires_hiver = $horaires_hiver_idx !== false ? $row[$horaires_hiver_idx]:'';
                            $horaires_ete = $horaires_ete_idx !== false ? $row[$horaires_ete_idx]:'';
                            $jours_fermeture_hiver = $jours_fermeture_hiver_idx !== false ? $row[$jours_fermeture_hiver_idx]:'';
                            $jours_ouverture_ete = $jours_ouverture_ete_idx !== false ? $row[$jours_ouverture_ete_idx]:'';
                            $jours_fermeture_hiver_ete = $jours_fermeture_hiver_ete_idx !== false ? $row[$jours_fermeture_hiver_ete_idx]:'';
                            $particularites_horaires = $particularites_horaires_idx !== false ? $row[$particularites_horaires_idx]:'';
                            $annuaire = $annuaire_idx !== false ? $row[$annuaire_idx]:'';
                            $masques_recus = $masques_recus_idx !== false ? $row[$masques_recus_idx]:'';
                            $bail_saisonnier = $bail_saisonnier_idx !== false ? $row[$bail_saisonnier_idx]:'';
                            
                            $code_postal = strlen($code_postal) === 4 ? '0' . $code_postal:$code_postal;

                            $commercants_list[] = [    
                                "", 
                                "",                        
                                (string) $i,
                                $enseigne,
                                $secteur,
                                $numero,
                                $adresse,
                                $code_postal,
                                $ville,
                                $phone,
                                $email_commerce,
                                $portable_resp,
                                $email_resp,
                                $site_internet,
                                $page_fb,
                                $jours_ouverture_hiver,
                                $horaires_hiver,
                                $jours_fermeture_hiver,
                                $jours_ouverture_ete,
                                $horaires_ete,
                                $jours_fermeture_hiver_ete,
                                $particularites_horaires,
                                $annuaire,
                                $masques_recus,
                                $bail_saisonnier
                            ];

                        endforeach;

                    else :

                        echo 'error';

                        die();

                    endif;

                else :

                    echo 'error';

                    die();

                endif;

            endif;

            header("Content-Type: json/application; charset: utf-8");

            echo json_encode($commercants_list);

            die();

           
        }

    }