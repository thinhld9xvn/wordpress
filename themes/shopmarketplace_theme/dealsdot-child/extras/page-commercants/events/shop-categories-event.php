<?php
	
	if ( isset( $_POST['btnImportCategories'] ) ) :		

		$file_url = esc_attr( $_POST['txtExcelCatFileUrl'] );

		if ( ! empty( $file_url ) ) :

			$file_contents = file_get_contents( $file_url );

			if ( $xlsx = SimpleXLSX::parseData( $file_contents ) ) :

				$rows = $xlsx->rows();

				$first_row = $rows[0];

				$idx = array_search('CATEGORIES', $first_row); // name category

				foreach ($rows as $key => $row) :

					if ( $key === 0 ) continue;

					$name = ucfirst( trim( $row[$idx] ) );

					$term = wp_create_term($name, PRODUCT_TAXONOMY);

					if ( is_wp_error($term) ) :

						echo $term->get_error_message();						

					endif;

					
				endforeach;

			else :

			    echo SimpleXLSX::parseError();			

			endif;

		endif;

	endif;