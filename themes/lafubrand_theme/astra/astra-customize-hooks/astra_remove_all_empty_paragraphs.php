<?php
	function lafu_remove_all_empty_paragraphs($contents) {

	return preg_replace('~\\s?<p>(\\s|&nbsp;)+</p>\\s?~', '', $contents);

}

add_filter('the_content', 'lafu_remove_all_empty_paragraphs', 99999);
add_filter('the_excerpt', 'lafu_remove_all_empty_paragraphs', 99999);