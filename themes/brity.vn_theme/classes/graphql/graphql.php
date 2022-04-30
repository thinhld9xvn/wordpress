<?php 

    require_once GRAPHQL_CLASS_CONSTANTS_DIR . '/graphql-fields-class.php';

    /* schema types */
    require_once GRAPHQL_CLASS_UTILS_DIR . '/schema/graphql-register-social-network-types-utils.php';

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterSocialNetworkTypesUtils', 'register'));

    /* */
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-logo-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-social-network-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-menuitems-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-ctinfo-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-sliders-list-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-clients-list-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-articles-list-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-pages-list-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-categories-list-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-stories-fields-utils.php';

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-notification-fields-utils.php';

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterLogoFieldsUtils', 'register'));


    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterSocialNetworkFieldsUtils', 'register'));



    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterMenuItemsFieldsUtils', 'register'));



     add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterCtInfoFieldsUtils', 'register'));



    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterStoriesFieldsUtils', 'register'));



    /*add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterBannersListFieldsUtils', 'register'));*/



    /*add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterProductsListsFieldsUtils', 'register'));



    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,

                array('\WP_GraphQL\GraphQLRegisterProductsTermsListFieldsUtils', 'register'));

    

     add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,

                array('\WP_GraphQL\GraphQLRegisterProductsAttributesListFieldsUtils', 'register'));*/



    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,

                array('\WP_GraphQL\GraphQLRegisterSlidersListFieldsUtils', 'register'));



    /*add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterPartnersListFieldsUtils', 'register'));*/



     add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,

                array('\WP_GraphQL\GraphQLRegisterArticlesListFieldsUtils', 'register'));



    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,

                array('\WP_GraphQL\GraphQLRegisterPagesListFieldsUtils', 'register'));



    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,

                array('\WP_GraphQL\GraphQLRegisterCategoriesListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterClientsListFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 

                array('\WP_GraphQL\GraphQLRegisterNotificationFieldsUtils', 'register'));