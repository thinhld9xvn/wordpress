<?php
    namespace Theme_Options;
    class ThemeOptionsGetHomeSectionUtils {
        public static function get() {
            return array(
                'id' => HOME_FIELDS::HOME_SECTION_ID,
                'title'  => array(
                   'vi' => HOME_FIELDS::HOME_TITLE,
                   'en' => HOME_FIELDS::HOME_TITLE
               ),
                'desc'   => array(
                    'vi' => HOME_FIELDS::HOME_DESCRIPTION,
                   'en' => HOME_FIELDS::HOME_DESCRIPTION
               ),
                'fields' => array(
                    // dịch vụ
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_SV1_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_SV1_TYPE,
                        'title' => array(                             
                            'vi' => HOME_FIELDS::HOME_SECTION_SV1_TITLE,
                            'en' => HOME_FIELDS::HOME_SECTION_SV1_TITLE                    
                        ),
                        'desc' => HOME_FIELDS::HOME_SECTION_SV1_DESCRIPTION,
                        'indent' => HOME_FIELDS::HOME_SECTION_SV1_INDENT
                    ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SV_HEADING_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SV_HEADING_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SV_HEADING_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SV_HEADING_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SV_HEADING_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SV_SMALL_HEADING_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SV_SMALL_HEADING_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SV_SMALL_HEADING_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SV_SMALL_HEADING_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SV_SMALL_HEADING_DESCIPTION
                        ),   
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SV_BUTTON_TEXT_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SV_BUTTON_TEXT_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SV_BUTTON_TEXT_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SV_BUTTON_TEXT_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SV_BUTTON_TEXT_DESCIPTION
                        ),   
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SV_POST_TYPE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SV_POST_TYPE_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_SV_POST_TYPE_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SV_POST_TYPE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SV_POST_TYPE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SV_POST_TYPE_DESCIPTION
                        ),   
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SV_POSTS_PER_PAGE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SV_POSTS_PER_PAGE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SV_POSTS_PER_PAGE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SV_POSTS_PER_PAGE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SV_POSTS_PER_PAGE_DESCIPTION
                        ),   
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SV_PAGE_ID_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SV_PAGE_ID_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_SV_PAGE_ID_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SV_PAGE_ID_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SV_PAGE_ID_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SV_PAGE_ID_DESCIPTION
                        ),      
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_SV2_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_SV2_TYPE,
                        'indent' => HOME_FIELDS::HOME_SECTION_SV2_INDENT
                    ),
                    // giới thiệu
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_GT1_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_GT1_TYPE,
                        'title' => array(                             
                            'vi' => HOME_FIELDS::HOME_SECTION_GT1_TITLE,
                            'en' => HOME_FIELDS::HOME_SECTION_GT1_TITLE                    
                        ),
                        'desc' => HOME_FIELDS::HOME_SECTION_GT1_DESCRIPTION,
                        'indent' => HOME_FIELDS::HOME_SECTION_GT1_INDENT
                    ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_GT_TITLE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_GT_TITLE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_TITLE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_GT_TITLE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_GT_TITLE_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_GT_DESCRIPTION_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_GT_DESCRIPTION_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_DESCRIPTION_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_GT_DESCRIPTION_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_GT_DESCRIPTION_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_GT_THUMBNAIL_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_GT_THUMBNAIL_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_THUMBNAIL_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_GT_THUMBNAIL_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_GT_THUMBNAIL_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_GT_BUTTON_TEXT_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_DESCIPTION
                        ),
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_GT2_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_GT2_TYPE,
                        'indent' => HOME_FIELDS::HOME_SECTION_GT2_INDENT
                    ),
                    // sản phẩm
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_SP1_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_SP1_TYPE,
                        'title' => array(                             
                            'vi' => HOME_FIELDS::HOME_SECTION_SP1_TITLE,
                            'en' => HOME_FIELDS::HOME_SECTION_SP1_TITLE                    
                        ),
                        'desc' => HOME_FIELDS::HOME_SECTION_SP1_DESCRIPTION,
                        'indent' => HOME_FIELDS::HOME_SECTION_SP1_INDENT
                    ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SP_TITLE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SP_TITLE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SP_TITLE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SP_TITLE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SP_TITLE_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SP_BUTTON_TEXT_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SP_BUTTON_TEXT_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SP_BUTTON_TEXT_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SP_BUTTON_TEXT_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SP_BUTTON_TEXT_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SP_POST_TYPE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SP_POST_TYPE_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_SP_POST_TYPE_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SP_POST_TYPE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SP_POST_TYPE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SP_POST_TYPE_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_SP_POSTS_PER_PAGE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_SP_POSTS_PER_PAGE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_SP_POSTS_PER_PAGE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_SP_POSTS_PER_PAGE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_SP_POSTS_PER_PAGE_DESCIPTION
                        ),   
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_SP2_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_SP2_TYPE,
                        'indent' => HOME_FIELDS::HOME_SECTION_SP2_INDENT
                    ),
                    // kiến thức
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_KT1_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_KT1_TYPE,
                        'title' => array(                             
                            'vi' => HOME_FIELDS::HOME_SECTION_KT1_TITLE,
                            'en' => HOME_FIELDS::HOME_SECTION_KT1_TITLE                    
                        ),
                        'desc' => HOME_FIELDS::HOME_SECTION_KT1_DESCRIPTION,
                        'indent' => HOME_FIELDS::HOME_SECTION_KT1_INDENT
                    ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_KT_TITLE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_KT_TITLE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_KT_TITLE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_KT_TITLE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_KT_TITLE_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_KT_BUTTON_TEXT_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_KT_BUTTON_TEXT_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_KT_BUTTON_TEXT_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_KT_BUTTON_TEXT_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_KT_BUTTON_TEXT_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_KT_POSTS_PER_PAGE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_KT_POSTS_PER_PAGE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_KT_POSTS_PER_PAGE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_KT_POSTS_PER_PAGE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_KT_POSTS_PER_PAGE_DESCIPTION
                        ),   
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_KT_PAGE_ID_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_KT_PAGE_ID_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_KT_PAGE_ID_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_KT_PAGE_ID_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_KT_PAGE_ID_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_KT_PAGE_ID_DESCIPTION
                        ),
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_KT2_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_KT2_TYPE,
                        'indent' => HOME_FIELDS::HOME_SECTION_KT2_INDENT
                    ),
                    // Đối tác
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_CL1_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_CL1_TYPE,
                        'title' => array(                             
                            'vi' => HOME_FIELDS::HOME_SECTION_CL1_TITLE,
                            'en' => HOME_FIELDS::HOME_SECTION_CL1_TITLE                    
                        ),
                        'desc' => HOME_FIELDS::HOME_SECTION_CL1_DESCRIPTION,
                        'indent' => HOME_FIELDS::HOME_SECTION_CL1_INDENT
                    ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_CL_TITLE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_CL_TITLE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_CL_TITLE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_CL_TITLE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_CL_TITLE_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_TYPE,
                            'data' => HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_DATA,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_CL_POST_TYPE_DESCIPTION
                        ),
                        array(
                            'id' => HOME_FIELDS::HOME_SECTION_CL_POSTS_PER_PAGE_ID,
                            'type' => HOME_FIELDS::HOME_SECTION_CL_POSTS_PER_PAGE_TYPE,
                            'title' => array(                             
                                'vi' => HOME_FIELDS::HOME_SECTION_CL_POSTS_PER_PAGE_TITLE,
                                'en' => HOME_FIELDS::HOME_SECTION_CL_POSTS_PER_PAGE_TITLE                    
                            ),
                            'desc' => HOME_FIELDS::HOME_SECTION_CL_POSTS_PER_PAGE_DESCIPTION
                        ),
                    array(
                        'id' => HOME_FIELDS::HOME_SECTION_CL2_ID,
                        'type' => HOME_FIELDS::HOME_SECTION_CL2_TYPE,
                        'indent' => HOME_FIELDS::HOME_SECTION_CL2_INDENT
                    ),
                )
            );
        }
    }