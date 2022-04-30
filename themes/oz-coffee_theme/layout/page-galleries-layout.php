<?php
    /* Template Name: Galleries Child Template */

    $post_type = \Archive\Galleries\GalleriesGetPostTypeUtils::get();
    $post_type = get_post_type_object($post_type); 

    $pid = (int) $_GET['pid'];    

    $gallery_post = get_post($pid);

    $myterm = get_the_terms($gallery_post, \Archive\Galleries\GALLERIES_FIELDS::GALLERIES_TAXONOMY)[0];    

    if ( is_null( $gallery_post ) ) wp_die('Bộ thư viện ảnh này không tồn tại !!!');

    //

    $gid = (int) $_GET['id'] - 1; // gallery id

    $results = \Archive\Galleries\Single\GalleriesGetSingleListsUtils::get($gallery_post);

    if ( ! array_key_exists($gid, $results) ) wp_die('Thư viện ảnh này không tồn tại !!!');

    $data = $results[$gid];

    //print_r($post); die();

    $data['author_name'] = $gallery_post->post_title;
    $data['author'] = $myterm->slug;

    $current_text = $data[\Archive\Galleries\GALLERIES_FIELDS::GALLERY_ITEM_TITLE];
    

get_header();  ?>

        <div class="header-element header-secondary header-page-secondary">

            <div class="container">

                <div class="page-header flex-layout flex-direction-column flex-align-center">
                    
                    <h1 class="sectionTitleHeading sectionTitlePageHeading">
                        <?php echo $post_type->label ?>
                    </h1>
                
                    <?php \Archive\Galleries\PageLayout\GalleriesPrintBreadcrumbHtmlUtils::render(HOME_TEXT, 
                                                                                       array(
                                                                                         'title' => $gallery_post->post_title,
                                                                                         'slug' => get_the_permalink($gallery_post)
                                                                                        ),
                                                                                       $current_text) ?>

                </div>

            </div>

        </div>

    </div>

    <div id="main">

        <?php \Archive\Galleries\PageLayout\GalleriesPrintPageHtmlUtils::render($data) ?>
        
    </div>

<?php 
    get_footer(); ?>