<?php 
    get_header(); 
    
    global $post; ?>

        <div class="header-element header-secondary header-page-secondary">

            <div class="container">

                <div class="page-header flex-layout flex-direction-column flex-align-center">
                    
                    <h1 class="sectionTitleHeading sectionTitlePageHeading">
                        <?php echo $post->post_title; ?>
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

        <?php \Page\PagePrintHtmlUtils::render($post) ?>

    <?php 
    get_footer(); ?>