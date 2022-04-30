<?php 
    get_header(); 
    
    $post_type = get_query_var('post_type');
    $post_type_obj = get_post_type_object( $post_type ); ?>

    <div class="header-element header-secondary header-page-secondary">

        <div class="container">

            <div class="page-header flex-layout flex-direction-column flex-align-center">
                
                <h1 class="sectionTitleHeading sectionTitlePageHeading">
                    <?php echo $post_type_obj->label; ?>
                </h1>
            
                <?php the_breadcrumbs('page-breadcrumb', 
                                    'page-breadcrumb',
                                    'Trang chủ', 
                                    '<span class="fa fa-angle-right"></span>'); ?>

            </div>

        </div>

    </div>

    </div>

    <div id="main">

        <?php \Archive\UuDai\Single\UDPrintSingleHtmlUtils::render(); ?>
        
    </div>

<?php 
    get_footer(); ?>