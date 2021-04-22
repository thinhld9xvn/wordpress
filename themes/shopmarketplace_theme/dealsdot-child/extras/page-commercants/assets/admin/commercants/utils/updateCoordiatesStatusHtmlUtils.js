export function updateCoordiatesStatusHtml(i, length) {

    const $recent_update = jQuery('.recent-update');

    $recent_update.addClass('show');

    $recent_update.html(`Getting coordiates from google map (${i}/${length}) ...`);

}