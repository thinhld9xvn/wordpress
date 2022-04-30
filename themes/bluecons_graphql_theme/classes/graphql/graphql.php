<?php 
    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-fields-utils.php';
    /* register field types */    
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTaxonomiesTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterArticlesListTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterHomeTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSliderTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGTTypesUtils', 'register'));    
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsTypesUtils', 'register'));    
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSVTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterKLTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterClientsTypesUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCTInfoTypesUtils', 'register'));

    /* */
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTaxonomiesFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterArticlesListFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSliderFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGTFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSVFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterKLFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterClientsFieldsUtils', 'register'));
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCtInfoFieldsUtils', 'register'));
                
    
    