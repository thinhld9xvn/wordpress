<?php 
	/* Template Name: Đăng bình luận */ ?>
<?php use Comments\InsertComment; ?>
<?php 
    if ( isset($_POST['btnSendComment']) ) :
        $from_url = $_POST['from_product'];
        $comments = $_POST['txtUserReviews'];
        $rating = $_POST['txtRatingPoint'];
        $product_id = $_POST['product_id'];
        InsertComment::perform(['comments' => $comments, 'rating' => $rating], $product_id);
        wp_redirect($from_url);
    endif;