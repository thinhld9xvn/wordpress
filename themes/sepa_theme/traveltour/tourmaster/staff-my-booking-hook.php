<?php 

    function get_staff_users($manager_uid) {

        $args = array(
            
            'meta_query' => array(

                'relation' => 'AND',

                array(
                    'key'     => USER_ROLE_FIELD,
                    'value'   => USER_ROLE_STAFF,
                    'compare' => '='
                ),

                array(
                    'key'     => USER_PARENT_FIELD,
                    'value'   => $manager_uid,
                    'type'    => 'numeric',
                    'compare' => '='
                )

            )

        );
         
        // Custom query.
        $my_user_query = new WP_User_Query( $args );

        return $my_user_query->get_results();

    }

    function print_dashboard_toute_section_table() {

        global $current_user;
        
        $statuses = array(
            'all' => esc_html__('Toute', 'tourmaster'),
            'pending' => esc_html__('En attente', 'tourmaster'),
            'approved' => esc_html__('Approuvée', 'tourmaster'),
            'receipt-submitted' => esc_html__('Reçu envoyé', 'tourmaster'),
            'online-paid' => esc_html__('Payé en ligne', 'tourmaster'),
            'deposit-paid' => esc_html__('Dépôt payé', 'tourmaster'),
            'departed' => esc_html__('Défunte', 'tourmaster'),
            'rejected' => esc_html__('Rejetée', 'tourmaster'),
            'wait-for-approval' => esc_html__('Attendre l approbation', 'tourmaster'),
        );       

        echo "
            <tbody>
                <tr>                    
                    <th>Nom du tour</th>
                    <th>Date de voyage</th>
                    <th>Totale</th>
                    <th>Statut de paiement</th>
                    <th>" . DASHBOARD_STAFF_USER_MAIL_COLUMN . "</th>
                    <th>" . DASHBOARD_STAFF_USER_DATETIME_CREATE_OFFER_COLUMN . "</th>
                </tr>
            </tbody>
        ";

        $staff_users = get_staff_users($current_user->ID);
        $staff_uids = array();

        //print_r($staff_users);

        foreach ( $staff_users as $key => $user ) :

            array_push($staff_uids, $user->ID);

        endforeach;

        $conditions = array(
			'user_id' => $staff_uids,
		);
		if( !empty($_GET['status']) && $_GET['status'] != 'all' && !empty($statuses[$_GET['status']]) ){
			$conditions['order_status'] = $_GET['status'];
		}else{
			$conditions['order_status'] = array(
				'condition' => '!=',
				'value' => 'cancel'
			);
		}
   
		$results = tourmaster_get_booking_data($conditions);

        foreach ($results as $key => $result) :         

            $travel_date = tourmaster_date_format($result->travel_date);
            $booking_date = tourmaster_date_format($result->booking_date);

            $total_price = tourmaster_money_format($result->total_price);

            $contact_info = json_decode($result->contact_info, true);

            $single_booking_url = add_query_arg(array(
				'page_type' => 'my-booking',
				'sub_page' => 'single',
				'id' => $result->id,
				'tour_id' => $result->tour_id
			));

			$title = '<a class="tourmaster-my-booking-title" href="' . esc_url($single_booking_url) . '" >' . get_the_title($result->tour_id) . '</a>';

			$status  = '<span class="tourmaster-my-booking-status tourmaster-booking-status tourmaster-status-' . esc_attr($result->order_status) . '" >';
			if( $result->order_status == 'approved' ){
				$status .= '<i class="fa fa-check"></i>';
			}else if( $result->order_status == 'departed' ){
				$status .= '<i class="fa fa-check-circle-o" ></i>';
			}else if( $result->order_status == 'rejected' ){
				$status .= '<i class="fa fa-remove" ></i>';
			}		 
			$status .= $statuses[$result->order_status];
			$status .= '</span>';
			if( in_array($result->order_status, array('pending', 'receipt-submitted', 'rejected')) ){
				$status .= '<a class="tourmaster-my-booking-action fa fa-dollar" title="' . esc_html__('Effectuer le paiement', 'tourmaster') . '" href="' . esc_url($single_booking_url) . '" ></a>';
			}
			if( in_array($result->order_status, array('pending', 'receipt-submitted', 'rejected')) ){
				$status .= '<a class="tourmaster-my-booking-action fa fa-remove" title="' . esc_html__('Annuler', 'tourmaster') . '" href="' . add_query_arg(array('action'=>'remove', 'id'=>$result->id)) . '" ';
				$status .= ' data-confirm="' . esc_html__('Juste pour confirmer', 'tourmaster') . '" ';
				$status .= ' data-confirm-yes="' . esc_html__('Oui', 'tourmaster') . '" ';
				$status .= ' data-confirm-no="' . esc_html__('Non', 'tourmaster') . '" ';
				$status .= ' data-confirm-text="' . esc_html__('Es-tu sûr de vouloir faire ça ?', 'tourmaster') . '" ';
				$status .= ' data-confirm-sub="' . esc_html__('La transaction que vous avez sélectionnée sera définitivement supprimée du système.', 'tourmaster') . '" ';
				$status .= ' ></a>';
			}

            echo "          
                <tr>                    
                    <th>{$title}</th>
                    <th>{$travel_date}</th>
                    <th><span class='tourmaster-my-booking-price'>{$total_price}</span></th>
                    <th>{$status}</th>
                    <th>{$contact_info['email']}</th>
                    <th>{$booking_date}</th>
                </tr>           
            ";

        endforeach;

        /*echo "<pre>";
        print_r($results);*/

    }