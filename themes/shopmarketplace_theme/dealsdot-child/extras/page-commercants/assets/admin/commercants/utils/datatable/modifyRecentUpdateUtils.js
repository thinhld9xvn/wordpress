export function modifyRecentUpdate(txtDatetime) {

    const $recent_update = jQuery('.tabbles-nav .tabbles-content.show .recent-update');

    $recent_update.html(`Last update: <span class="time">${txtDatetime}</span>`);

    $recent_update.addClass('show');

}