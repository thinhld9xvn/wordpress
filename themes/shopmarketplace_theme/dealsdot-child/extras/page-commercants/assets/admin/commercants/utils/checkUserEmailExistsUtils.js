export async function checkUserEmailExists(email) {

    return await jQuery.ajax({

        type : "POST",
        async : true,            
        url : ajaxurl,
        data : {

            action : __ACTIONS_HOOKS_LIST.UNICORN_CHECK_USER_EMAIL_EXIST_ACTION,
            email

        }

    });
    
}