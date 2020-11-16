<?php 
	class UC_Minify_Cache {		

		public function minify( $html ) {
    		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
    		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);    	
    		// Variable reused for output
    		$html = '';
    		foreach ($matches as $token)
    		{
    			$tag = ( isset( $token['tag'] ) ) ? strtolower( $token['tag'] ) : null;
    			
    			$content = $token[0];
    			
    			if ( is_null( $tag ) )
    			{
					// Remove any HTML comments, except MSIE conditional comments
					$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);				
    				
    			}
    			else
    			{		
					// Remove any empty attributes, except:
					// action, alt, content, src
					$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
					
					// Remove any space before the end of self-closing XHTML tags
					// JavaScript excluded
					$content = str_replace(' />', '/>', $content);    				
    			}   			
    			
    			$content = $this->removeWhiteSpace($content);    			
    			
    			$html .= $content;
    		}
    		
    		return $html;
    	}  

    	protected function removeWhiteSpace( $str ) {
    		$str = str_replace("\t", ' ', $str);
    		$str = str_replace("\n",  '', $str);
    		$str = str_replace("\r",  '', $str);
    		
    		while (stristr($str, '  '))
    		{
    			$str = str_replace('  ', ' ', $str);
    		}
    		
    		return $str;
    	}  

	}
?>