<?php 
    get_header();
    
    $s = get_query_var('s'); ?>

        <div class="header-element header-secondary header-page-secondary">

            <div class="container">

                <div class="page-header flex-layout flex-direction-column flex-align-center">
                    
                    <h1 class="sectionTitleHeading sectionTitlePageHeading">
                        Tìm kiếm
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

       <?php \Search\SearchPrintHtmlUtils::render() ?>
        
    </div>

<?php 
    get_footer(); ?>