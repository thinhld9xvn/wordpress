<?php 

    namespace Products;

    class ProductSortRevelanceListsInLoopFilterUtils {

        public static function sort($product_lists, $keyword) {
			
			
			$arr_equal_keyword = array();
			
			$arr_plural_keyword = array();

            $arr_startwith_keyword = array();
			
			$arr_contain_keyword = array();
			$arr_keyword_between_space_around = array();
			
			$arr_end_by_space_and_keyword = array();
			$arr_end_by_keyword = array();
			
			$arr_startwith_plural_keyword = array();
			$arr_contain_plural_keyword = array();
			$arr_end_by_plural_keyword = array();
			
			
			$arr_content_has_keyword = array();
			
            $arr_unrevelances = array();
		//	$keyword = 'thé';
            $_keyword = mb_strtolower($keyword, "UTF-8");
			
			$_keyword = remove_accents($_keyword);
			
			
			$plural_keyword = $_keyword.'s';
			
			$plural_keyword = mb_strtolower($plural_keyword, "UTF-8");
			
			
			foreach ($product_lists as $key => $product)  {
				
				$product_name = $product->get_name();

				$post = get_post($product->get_id());

				$product_content = $post->post_content;
		
				$product_name_final = mb_strtolower($product_name, "UTF-8");
				
				$product_name_final = remove_accents($product_name_final);
				
				
				
				if($product_name_final == $_keyword) {
				// kiem tra dung tu khoa
					array_push($arr_equal_keyword, $product);
					
				} else {
					
					
					if ($product_name_final == $plural_keyword) {

						// kiem tra tu khoa co them s dang sau	
						array_push($arr_plural_keyword, $product);						
						
					} else {
						
						$test = $_keyword." ";
						if (strpos($product_name_final,$test ) === 0 && strpos($product_name_final,$plural_keyword ) !== 0 ) {
							
						// kiem tra chuoi bat dau bang tu khoa
							array_push($arr_startwith_keyword, $product);
						
						} else {
							
							
						//$_keyword_match = "/'.$_keyword.'/";
							
						if (preg_match('/'.$_keyword.'/', $product_name_final) === 1 &&  
								preg_match('/'.$plural_keyword.'/', $product_name_final) === 0 ) {

								// chuoi chua tu khoa
								if(strpos(strrev($product_name_final), strrev($_keyword)) === 0) {

									$space_end = " ".$_keyword;
									if (preg_match('/'.$space_end.'/', $product_name_final) === 1) {
										array_push($arr_end_by_space_and_keyword, $product);
									} else {
										array_push($arr_end_by_keyword, $product);	
									}
									
										
								} else {
									$space_key = " ".$_keyword." ";
									$space_plural = " ".$plural_keyword." ";
									if (preg_match('/'.$space_key.'/', $product_name_final) === 1 &&  
											preg_match('/'.$space_plural.'/', $product_name_final) === 0 ){
										array_push($arr_keyword_between_space_around, $product);
										
									} else {
										array_push($arr_contain_keyword, $product);
									}
									
										
								}	
								
							} 
							
							else {
							
								if(strpos($product_name_final,$plural_keyword ) === 0) {
									// check if it starts with plural keyword
									array_push($arr_startwith_plural_keyword, $product);
									
									
								} 
								
								else {
									
									$test2 = $plural_keyword." ";
									
									if (preg_match('/'.$test2.'/', $product_name_final) === 1) {
									//$arr_contain_plural_keyword
									
										if(strpos(strrev($product_name_final), strrev($plural_keyword)) === 0) {
											array_push($arr_end_by_plural_keyword, $product);	
										} else {
											array_push($arr_contain_plural_keyword, $product);	
										}	
									
									// check contain plural keyword
										
									} 
									
									else {
										//related content description
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
							
						} // else  string not start with keyword
						
						
						
					}
				}
				
			}
			
			
			
			
		//	return array_merge($arr_equal_keyword,$arr_plural_keyword, $arr_startwith_keyword,$arr_contain_keyword, $arr_startwith_plural_keyword, $arr_contain_plural_keyword, $arr_content_has_keyword, $arr_unrevelances);
			return array_merge($arr_equal_keyword, $arr_plural_keyword,$arr_startwith_keyword,$arr_keyword_between_space_around,$arr_end_by_space_and_keyword,$arr_startwith_plural_keyword, $arr_contain_keyword, $arr_end_by_keyword,$arr_contain_plural_keyword, $arr_end_by_plural_keyword, $arr_content_has_keyword,$arr_unrevelances);
		//	return array_merge($arr_equal_keyword,$arr_plural_keyword,$arr_startwith_keyword, $arr_keyword_between_space_around, $arr_startwith_plural_keyword, $arr_contain_keyword,$arr_end_by_keyword, $arr_contain_plural_keyword, $arr_end_by_plural_keyword, $arr_content_has_keyword, $arr_unrevelances);
		

        }     

    }