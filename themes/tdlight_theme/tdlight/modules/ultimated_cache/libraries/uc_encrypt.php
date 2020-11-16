<?php 
	class UC_Encrypt {

		public function __construct() {
		}

		public function decode_obj( $n ) {

			return json_decode( base64_decode( $n ), ARRAY_A );

		}

		public function encode_obj( $n ) {

			return base64_encode( json_encode( $n ) );

		}

		// tạo uri dựa trên $uri và langcode
		// và được mã hóa bằng base64
		public function generate_uri_base64( $uri ) {
			
			$active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

			$uc_info = array(
				"url" => $uri
			);

			if ( isset( $active_langcode ) ) :

				$uc_info["langcode"] = $active_langcode;

			endif;

			$uri_base64 = $this->encode_obj( $uc_info );

			return $uri_base64;

		}

		// tạo chuỗi template dựa trên chuỗi $key và langcode
		// và được mã hóa bằng base64
		public function generate_template_base64() {
			
			$active_langcode = $_SESSION['qtranslate_mainsite_langcode'];

			$uc_info = array(
				"template" => ULTIMATED_CACHE_TEMPLATE_KEY
			);

			if ( isset( $active_langcode ) ) :

				$uc_info["langcode"] = $active_langcode;

			endif;

			$uri_base64 = $this->encode_obj( $uc_info );

			return $uri_base64;

		}

	} ?>