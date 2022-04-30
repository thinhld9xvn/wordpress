<?php 

require_once GRAPHQL_UTILS_DIR . '/graphql-register-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-logo-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-ctinfo-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-blog-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-pages-list-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-categories-list-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-menuitems-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-gioithieu-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-duan-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-products-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-home-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-nhamay-fields-utils.php';
require_once GRAPHQL_UTILS_DIR . '/graphql-register-articles-list-fields-utils.php';

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterLogoFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterMenuItemsFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCtInfoFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterBlogFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES,
                array('\WP_GraphQL\GraphQLRegisterArticlesListFieldsUtils', 'register'));
                
add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterPagesListFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterCategoriesListFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterGioithieuFieldsUtils', 'register'));
                
add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterDuAnPageFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterProductsFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterHomeFieldsUtils', 'register'));

add_action(\Actions\ACTIONS::GCO_GRAPHQL_REGISTER_TYPES, 
                array('\WP_GraphQL\GraphQLRegisterNhaMayFieldsUtils', 'register'));

