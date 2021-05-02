<?php

    namespace Users;

    class UserSampleDemoUtils {

        public static function create() {

            $user_listing = array(
        
                array(
                    'username' => 'caesar_vance',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'caesar_vance@gmail.com'
                ),
                array(
                    'username' => 'cara_stevens',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'cara_stevens@gmail.com'
                ),
                array(
                    'username' => 'cedric_kelly',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'cedric_kelly@gmail.com'
                ),
                array(
                    'username' => 'charde_marshall',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'charde_marshall@gmail.com'
                ),
                array(
                    'username' => 'colleen_hurst',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'colleen_hurst@gmail.com'
                ),
                array(
                    'username' => 'dai_rios',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'dai_rios@gmail.com'
                ),
                array(
                    'username' => 'donna_snider',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'donna_snider@gmail.com'
                ),
                array(
                    'username' => 'doris_wilder',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'doris_wilder@gmail.com'
                ),
                array(
                    'username' => 'finn_camacho',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'finn_camacho@gmail.com'
                ),
                array(
                    'username' => 'fiona_green',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'fiona_green@gmail.com'
                ),
                array(
                    'username' => 'garrett_winters',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'garrett_winters@gmail.com'
                ),
                array(
                    'username' => 'gavin_cortez',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'gavin_cortez@gmail.com'
                ),
                array(
                    'username' => 'gavin_joyce',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'gavin_joyce@gmail.com'
                ),
                array(
                    'username' => 'gloria_little',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'gloria_little@gmail.com'
                ),
                array(
                    'username' => 'haley_kennedy',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'haley_kennedy@gmail.com'
                ),
                array(
                    'username' => 'hermione_butler',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'hermione_butler@gmail.com'
                ),
                array(
                    'username' => 'herrod_chandler',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'herrod_chandler@gmail.com'
                ),
                array(
                    'username' => 'hope_fuentes',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'hope_fuentes@gmail.com'
                ),
                array(
                    'username' => 'howard_hatfield',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'howard_hatfield@gmail.com'
                ),
                array(
                    'username' => 'jackson_bradshaw',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'jackson_bradshaw@gmail.com'
                ),
                array(
                    'username' => 'jena_gaines',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'jena_gaines@gmail.com'
                ),
                array(
                    'username' => 'jenette_caldwell',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'jenette_caldwell@gmail.com'
                ),
                array(
                    'username' => 'jennifer_acosta',
                    'password' => 'PowerDattu1991@#',
                    'email' => 'jennifer_acosta@gmail.com'
                )      
        
            );
        
            foreach ( $user_listing as $key => $user ) :
        
                sleep(1);
        
                extract($user);
        
                if ( ! UserMemberShip::is_user_exists($username) ) :
        
                    wp_create_user($username, $password, $email);
        
                else :
        
                    $current_user = UserMemberShip::get_user($username);
        
                    //echo var_dump($current_user); die();
        
                    $pieces = explode('_', $username);
                    $first_name = ucfirst( $pieces[0] );
                    $last_name = ucfirst( $pieces[1] );
                    $display_name = $first_name . ' '. $last_name;
        
                    UserMemberShip::update_user(
        
                        array(
                            'ID' => $current_user->ID,
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'display_name' => $display_name,
                            'user_url' => 'http://artist-corner-demo.io'
                        )
        
                    );
        
                endif;
        
            endforeach;
        
        }
        
    }