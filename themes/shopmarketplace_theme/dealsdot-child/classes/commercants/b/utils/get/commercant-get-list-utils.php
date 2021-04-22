<?php 

    namespace Commercants;

    class CommercantGetListUtils {

        public static function get() {

            //$data_commercants_list = array();

            $data_commercants_list = array();

            $commercants_list = CommercantGetListsOptionUtils::get();	
            
            //echo $commercants_list; die();

            $data = explode(\Stores\STORE_DATA::STORE_DELIMITER, $commercants_list);       					

            foreach ( $data as $i => $row ) : 

                $pieces = preg_split("/\R/", $row);			

                $txtAddr = '';

                $enseigne = '';
                $numero = '';
                $address = '';
                $ville = '';    
                $phone = '';
                $secteur = '';	
                $code_postal = '';					
                $email_commerce = '';
                $portable_responsable = '';
                $email_responsable = '';
                $site_internet = '';
                $page_facebook = '';
                $jours_ouverture_hiver = '';
                $horaires_hiver = '';
                $jours_fermeture_hiver = '';
                $jours_ouverture_ete = '';
                $horaires_ete = '';
                $jours_fermeture_ete = '';
                $particularites_horaires = '';
                $annuaire = '';
                $masques_recus = '';
                $bail_saisonnier = '';

                foreach ( $pieces as $piece ) :

                    if ( ! empty( $piece ) ) :

                        $info = explode(': ', $piece);  

                        $info[0] = mb_strtolower( trim( $info[0] ), 'UTF-8' );

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO ) :

                            $numero = $info[1];

                        endif;  

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE ) :

                            $address = $info[1];

                        endif;  			

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE ) :

                            $enseigne = $info[1];

                        endif;  

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::VILLE ) :

                            $ville = $info[1];

                        endif;  	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE ) :

                            $phone = $info[1];

                        endif;  

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY ) :

                            $secteur = $info[1];

                        endif;

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL ) :

                            $code_postal = $info[1];

                        endif;  									

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE ) :

                            $email_commerce = $info[1];

                        endif; 

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE ) :

                            $portable_responsable = $info[1];

                        endif;  	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE ) :

                            $email_responsable = $info[1];

                        endif;  

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET ) :

                            $site_internet = $info[1]; 

                        endif;  

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK ) :

                            $page_fb = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER ) :

                            $jours_ouverture_hiver = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER ) :

                            $horaires_hiver = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER ) :

                            $jours_fermeture_hiver = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE ) :

                            $jours_ouverture_ete = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE ) :

                            $horaires_ete = $info[1]; 

                        endif;

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE ) :

                            $jours_fermeture_ete = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES ) :

                            $particularites_horaires = $info[1]; 

                        endif;

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE ) :

                            $annuaire = $info[1]; 

                        endif;	

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS ) :

                            $masques_recus = $info[1]; 

                        endif;

                        if ( $info[0] === \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER ) :

                            $bail_saisonnier = $info[1]; 

                        endif;							

                    endif;

                endforeach;

                if ( $numero ) :
                    $txtAddr .= $numero . ' ';
                endif;

                if ( $address ) :
                    $txtAddr .= $address . ' ';
                endif;

                if ( $ville ) :
                    $txtAddr .= $ville;
                endif;

                if ( $txtAddr ) :

                    $txtAddr .= ', france';

                    $data_commercants_list[] = array(

                        \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO => $numero,
                        \DataTables\DT_COMMERCANTS_COLUMNS::VILLE => $ville,
                        \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESS => $txtAddr,
                        \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE => $address,
                        \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE => $phone,
                        \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY => $secteur,
                        \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE => $enseigne,
                        \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL => $code_postal,
                        \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE => $email_commerce,
                        \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE => $portable_responsable,
                        \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE => $email_responsable,
                        \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET => $site_internet,
                        \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK => $page_fb,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER => $jours_ouverture_hiver,
                        \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER => $horaires_hiver,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER => $jours_fermeture_hiver,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE => $jours_ouverture_ete,
                        \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE => $horaires_ete,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE => $jours_fermeture_ete,
                        \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES => $particularites_horaires,
                        \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE => $annuaire,
                        \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS => $masques_recus,
                        \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER => $bail_saisonnier
                        
                    );

                endif;

            endforeach;

            /*$data_stores_list = UserMemberShip::get_data_stores_list();	
            
            $data_commercants_list = array_merge($data_commercants_list, $data_stores_list);

            //echo "<pre>"; print_r($data_commercants_list); die();*/

            return $data_commercants_list;

        }

    }