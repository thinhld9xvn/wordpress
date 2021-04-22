export async function getDetailsFromStore(user_email) {

    return await jQuery.ajax({

        type : "POST",
        async : true,
        url : ajaxurl,
        data : {
            action : __ACTIONS_HOOKS_LIST.UNICORN_ADMIN_GET_DETAILS_FORM_STORE_ACTION,
            email : user_email
        }

    });

}