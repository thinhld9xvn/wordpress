<?php 

    require_once GRAPHQL_CLASS_UTILS_DIR . '/graphql-register-fields-utils.php';

    /* register field types */

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTaxonomiesTypesUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSocialNetworkTypesUtils', 'register'));

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
                array('\WP_GraphQL\GraphQLRegisterProjectsTypesUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMediaFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterVideoTypesUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterRecruitmentTypesUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsTypesUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterFPTypesUtils', 'register'));
    
    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterArticlesListTypesUtils', 'register'));

    /* */

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterTaxonomiesFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSocialNetworkFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterSliderFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGTFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLHTKFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterClientsFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCtInfoFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGioiThieuFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProjectsFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMediaTypesUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterVideoFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterRecruitmentFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterFPFieldsUtils', 'register'));

    add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterArticlesListFieldsUtils', 'register'));