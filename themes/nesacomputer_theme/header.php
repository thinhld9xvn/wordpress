<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />	
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<?php wp_head(); ?>
	</head>
    <?php $logo = \Logo\LogoGetPrimaryUrlUtils::get(); ?>
    <body <?php body_class('bg-gray'); ?>>
        <header id="header">
            <div class="container">
                <?php include(locate_template('/templates/header/top.php')) ?>
                <?php include(locate_template('/templates/header/mid.php')) ?>
                <?php include(locate_template('/templates/header/bottom.php')) ?>
            </div>
        </header>
        <div class="wrapper">