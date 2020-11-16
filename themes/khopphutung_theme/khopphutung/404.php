<?php 

	header('HTTP/1.0 404 Not Found');
	header("Location: " . get_site_url() );
	exit();

?>