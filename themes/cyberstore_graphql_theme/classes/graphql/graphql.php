<?php 

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-logo-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-social-network-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-menuitems-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-ctinfo-fields-utils.php';
    //require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-partners-list-fields-utils.php';
    //require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-banners-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-products-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-products-terms-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-sliders-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-articles-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-pages-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-products-attributes-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-portfolio-list-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-sales-off-section-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-promotions-section-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-payments-fields-utils.php';
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-delivery-fields-utils.php';
    

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSocialNetworkFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsFieldsUtils', 'register'));

     add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCtInfoFieldsUtils', 'register'));

    /*add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterBannersListFieldsUtils', 'register'));*/

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsListsFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterProductsTermsListFieldsUtils', 'register'));
    
     add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterProductsAttributesListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterSlidersListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterPortfolioListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterSalesOffSectionFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterPaymentsFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterPromotionsSectionFieldsUtils', 'register'));

    /*add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterPartnersListFieldsUtils', 'register'));*/

     add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterArticlesListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterPagesListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterDeliveryFieldsUtils', 'register'));