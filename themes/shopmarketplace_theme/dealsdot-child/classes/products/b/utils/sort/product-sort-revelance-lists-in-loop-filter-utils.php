<?php 

    namespace Products;

    class ProductSortRevelanceListsInLoopFilterUtils {

        public static function sort($product_lists, $keyword) {
			
			$arr_equal_keyword = array();
			
			$arr_plural_keyword = array();

            $arr_startwith_keyword = array();
			
			$arr_contain_keyword = array();
			
			$arr_content_has_keyword = array();
			
            $arr_unrevelances = array();

            $_keyword = mb_strtolower($keyword, "UTF-8");
			
			
			foreach ($product_lists as $key => $product)  {

				$id = $product->get_id();

				$post = get_post($id);

				$product_content = $post->post_content;
				
				$product_name = $product->get_name();
				
				$product_name_final = mb_strtolower($product_name, "UTF-8");
				
				if($product_name_final == $_keyword) {
				// kiem tra dung tu khoa
					array_push($arr_equal_keyword, $product);
					
				} else {
					$plural_keyword = $_keyword.'s';
					
					if (strpos($product_name_final,$plural_keyword ) === 0) {
					// kiem tra tu khoa co them s dang sau	
					array_push($arr_plural_keyword, $product);
						
						
					} else {
						if (strpos($product_name_final,$_keyword ) === 0) {
						// kiem tra chuoi bat dau bang tu khoa
							array_push($$arr_startwith_keyword, $product);
						
						} else {
							
							
							if (strpos($product_name_final, $_keyword) !== false) {
								// chuoi chua tu khoa
								
								array_push($arr_contain_keyword, $product);
							//	echo 'true';
							} else {
								
								$product_content_final = mb_strtolower($product_content, "UTF-8");
								
								if(strpos($product_content_final, $_keyword) !== false) {
									array_push($arr_content_has_keyword, $product);
									
								} else {
									// chuoi ko lien quan
									array_push($arr_unrevelances, $product);	
								}
								
								
								 
							}
							
						}
						
					}
				}
				
			}
			
			
			return array_merge($arr_equal_keyword,$arr_plural_keyword, $arr_startwith_keyword,$arr_contain_keyword, $arr_content_has_keyword, $arr_unrevelances);
			


			/*
            foreach ($product_lists as $key => $product) :

                $name = mb_strtolower($product['name'], "UTF-8");                

                if ( FALSE !== mb_strpos( $name, $_keyword, 0, 'UTF-8' ) ) :

                    array_push($arr_revelances, $product);

                else :

                    array_push($arr_unrevelances, $product);

                endif;
                
            endforeach;
			*/

            
           

        }     

    }