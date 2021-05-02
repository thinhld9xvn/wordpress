<?php

global $post;

$listing = MyListing\Src\Listing::get( $post );

if ( ! $listing->type ) {
    return;
}

// Get the layout blocks for the single listing page.
$layout = $listing->type->get_layout();
$tagline = $listing->get_field( 'tagline' );

$listing_author = get_profile_author_name($post);

$avatar = UserMemberShip::get_user_avatar_url($post->post_author);

$bg_cover_profile = get_profile_bg_cover_profile($post); 

if ( $bg_cover_profile ) :
    $bg_cover_profile = $bg_cover_profile[0] ? $bg_cover_profile[0] : '';    
endif; 

$is_online = UserMemberShip::is_user_online($post->post_author); ?>

<div class="single-job-listing" id="c27-single-listing">
    <input type="hidden" id="case27-post-id" value="<?php echo esc_attr( get_the_ID() ) ?>">
    <input type="hidden" id="case27-author-id" value="<?php echo esc_attr( get_the_author_meta('ID') ) ?>">

    <section class="featured-section profile-cover">

        <div class="overlay" 
            <?php if ($bg_cover_profile) : ?>
                style="background-image: url('<?= $bg_cover_profile ?>'); opacity: 1"
            <?php endif; ?>>
        </div>

        <div class="main-info-desktop">
            <div class="container listing-main-info">
                <div class="col-md-8">
                    <div class="profile-name <?php echo esc_attr( $tagline ? 'has-tagline' : 'no-tagline' ) ?> 
                        <?php echo esc_attr( $listing->get_rating() ? 'has-rating' : 'no-rating' ) ?>">

                        <div class="profile-avatar">
                            <img src="<?= $avatar ?>" alt="">
                        </div>

                        <h1 class="case27-primary-text">
                            <div class="author_name"><?= $listing_author ?></div>
                            <figure>                             
                                <span><?= $listing->get_name() ?></span>
                            </figure>
                            <small class="profile-status <?= $is_online ? '__online' : '__offline' ?>">
                                <span class="fa fa-circle"></span>
                                Status: <?= $is_online ? 'Online' : 'Offline' ?>
                            </small>
                        </h1>
                        <div class="pa-below-title">
                            <?php mylisting_locate_template( 'partials/star-ratings.php', [
                                'rating' => $listing->get_rating(),
                                'max-rating' => MyListing\Ext\Reviews\Reviews::max_rating( $listing->get_id() ),
                                'class' => 'listing-rating',
                            ] ) ?>

                            <?php if ( $tagline ): ?>
                                <h2 class="profile-tagline listing-tagline-field"><?php echo esc_html( $tagline ) ?></h2>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <?php
                /**
                 * Quick actions list.
                 *
                 * @since 2.0
                 */
                require locate_template( 'templates/single-listing/cover-details.php' );
                ?>
            </div>
        </div>

    </section>

    <div class="main-info-mobile">
        <?php // .listing-main-info is moved here in mobile using JS ?>
    </div>
    <div class="profile-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-menu">

                        <?php print_single_profile_listing_menu_tabs(); ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    /**
     * Quick actions list.
     *
     * @since 2.0
     */
    require locate_template( 'templates/single-listing/quick-actions/quick-actions.php' );
    ?>

    <?php if ( ! empty( $_GET['review-submitted'] ) ): ?>
	    <div class="container listing-notifications">
	    	<div class="row">
	    		<div class="col-md-12">
					<div class="woocommerce-message" role="alert">
						<?php echo esc_html( __( 'Your review has been submitted.', 'my-listing' ) ) ?>
						<a href="#" class="button wc-forward hide-notification">Close</a>
					</div>
				</div>
	    	</div>
	    </div>
    <?php endif ?>

    <div class="tab-content listing-tabs">

        <?php print_single_profile_listing_content_tabs(); ?>
        
        
    </div>

    <?php
    /**
     * Similar listings section.
     *
     * @since 2.0
     */
    /*if ( $layout['similar_listings']['enabled'] && apply_filters( 'mylisting/single/show-similar-listings', true ) !== false ) {
        require locate_template( 'templates/single-listing/similar-listings.php' );
        
    }*/ 
    print_single_profile_listing_reviews();        
    print_single_profile_relates(); ?>

</div>

<?php print_add_listing_ajax_loader(); ?>