function toggleBoxChatEvent() {

    const chatbox_node = jQuery('.chatbox-sd')[0],
         chatbox_heading_node = jQuery('.chatbox-sd h4')[0];

    jQuery(document).on('mouseup', function(e) {

        const target = e.target;

        if ( chatbox_heading_node && chatbox_heading_node.contains(target) ) {            

            if ( chatbox_node && ! chatbox_node.classList.contains("__minimize") ) {

                chatbox_node.classList.add("__minimize");

            }

            else {

                chatbox_node && chatbox_node.classList.remove("__minimize");

            }           

        }

        else {

            if ( chatbox_node && chatbox_node.contains(target) ) {
            }

            else {

                chatbox_node && chatbox_node.classList.add("__minimize");

            }


        }

    })

}

export function setupChatBox() {

    toggleBoxChatEvent();

}