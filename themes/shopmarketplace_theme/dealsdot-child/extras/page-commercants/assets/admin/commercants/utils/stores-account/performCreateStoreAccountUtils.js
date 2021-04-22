export async function performCreateStoreAccount(params) {

    return await jQuery.ajax({

        type : "POST",
        async : true,
        url : ajaxurl,
        data : {
            action : __ACTIONS_HOOKS_LIST.UNICORN_CREATE_NEW_STORE_ACCOUNT_ACTION,
            params
        }

    });

}