export async function performRemoveSelectedStores(ids) {

    return await jQuery.ajax({

        type : "POST",
        url : ajaxurl,
        data : {

            action : __ACTIONS_HOOKS_LIST.UNICORN_REMOVE_STORES_ACCOUNT_ACTION,
            params : {

                ids

            }

        }

    });

}