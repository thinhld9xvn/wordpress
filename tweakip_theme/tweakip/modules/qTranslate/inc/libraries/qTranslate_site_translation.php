<?php 
	class qTranslate_site_translation {		
    
    	// Variables
    	protected $html;
    	private $mydb;

    	public function __construct( $html ) {
    	    	
    		if ( ! empty( $html ) ) :

    			require_once QTRANSLATE_DIRECTORY_INC . '/qTranslate_db.php';

    			$this->mydb = new qTranslate_db();

    			$this->parseHTML( $html );

    		endif;

    	}

        public function __toString() {
            return $this->html;
        }

    	public function translateHTML( $html ) {

    		$mydb = $this->mydb;

    		$qstrings = $mydb->get_all_translate_strings();

    		foreach ( $qstrings as $qstring ) :

    			$mainsite_langcode = $_SESSION['qtranslate_mainsite_langcode'];    

                $replace = empty( $qstring["string_value_{$mainsite_langcode}"] ) ? $qstring['string_name'] : $qstring["string_value_{$mainsite_langcode}"];

    			$html = str_replace( $qstring['string_name'], $replace, $html );

    		endforeach;

    		return $html;

    	}
    		
    	public function parseHTML( $html ) {

    		$this->html = $this->translateHTML( $html );           
    		
    	}    	
    	
    } 

    function wp_html_translation_finish($html) {
    	return new qTranslate_site_translation($html);        

    }
    
    function wp_html_translation_start() {    
    	ob_start('wp_html_translation_finish');
    }
    
    add_action('get_header', 'wp_html_translation_start');

	
?>