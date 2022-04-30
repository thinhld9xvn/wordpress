<?php 
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-fields-utils.php';
    /* register field types */
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTaxonomiesTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSliderTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGTTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLHTKTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterClientsTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCTInfoTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGioiThieuTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterArticlesListTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterBannersTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTestiTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsListTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterWooPaymentsTypesUtils', 'register'));
    
    /* */
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTaxonomiesFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSliderFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGTFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCtInfoFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGioiThieuFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterArticlesListFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterBannersFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterClientsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTestiFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsListsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsTabListsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTestiSectionFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterWooPaymentsFieldsUtils', 'register'));