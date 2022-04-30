<?php
    $this->sections[] = \Theme_Options\ThemeOptionsGetGlobalSectionUtils::get();
    $end_section = end( $this->sections );       
    foreach( $GLOBALS['_custom_post_types_registered'] as $post_type ) :        
        $section_field = array(
                    "id"    => "global-pagenumber-post-type-{$post_type['slug']}",
                    "type"  => "text",
                    "title" => array(
                                    "vi" => "Post Type {$post_type['label']}",
                                    "en" => "Post Type {$post_type['label']}"
                                ),
                    "desc"  => ""
                );
        array_splice( $end_section['fields'], 
                      sizeof( $end_section['fields'] ) - 1,
                      0,
                      array( $section_field ) );       
    endforeach;
    $args = array(
        'hide_empty' => false
    );
    $categories = get_categories( $args );
    foreach ( $categories as $category ) :
        $section_field = array(
                    "id"    => "global-pagenumber-category-{$category->slug}",
                    "type"  => "text",
                    "title" => array(
                                  "vi" => "Danh mục {$category->name}",
                                  "en" => "Category {$category->name}"
                               ),
                    "desc"  => ""
                );
        array_splice( $end_section['fields'], 
                      sizeof( $end_section['fields'] ) - 1,
                      0,
                      array( $section_field ) );      
    endforeach;
    $this->sections[ sizeof( $this->sections ) - 1 ] = $end_section;   
    $this->sections[] = \Theme_Options\ThemeOptionsGetHeaderSectionUtils::get();
    $this->sections[] = \Theme_Options\ThemeOptionsGetBannersSectionUtils::get();
    $this->sections[] = \Theme_Options\ThemeOptionsGetHomeSectionUtils::get();
    $this->sections[] = \Theme_Options\ThemeOptionsGetCtinfoSectionUtils::get();