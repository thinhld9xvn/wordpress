<?php
/**
 * searchform.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.0
 * 
 */
 ?>

<form id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<div class="control-group">
	   <input type="text" name="s" id="se" placeholder="<?php esc_attr_e('Search For', 'dealsdot') ?>" class="search-field" autocomplete="off">
		  <button type="submit" class="klb-search search-button"></button>
	</div>
</form>
