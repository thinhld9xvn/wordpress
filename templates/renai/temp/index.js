/* Header */

const menudown = document.querySelector('#menudown');
const menu = document.querySelector('#menu');

menu ?.addEventListener('click', () => {
    if (menudown.classList.contains('hidden')) {
        menudown.classList.remove('hidden');
    } else {
        menudown.classList.add('hidden');
    }
})

/* San-pham */

// Modal
const cards = document.querySelectorAll('.card .view__search');
const closebutton = document.getElementById('closebutton');
const modal = document.getElementById('modal');

cards ?.forEach(card => {
    card.addEventListener('click', () => {
        modal.classList.remove('hidden')
    });
});
closebutton ?.addEventListener('click', () => modal.classList.add('hidden'));

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.classList.add('hidden');
    }
}

// San pham tong
const link1 = document.getElementById('link1');
const types1 = document.getElementById('types1');
link1 ?.addEventListener('click', () => {
    if (types1.classList.contains('hidden')) {
        types1.classList.remove('hidden');
    } else {
        types1.classList.add('hidden');
    }
})

// function prev() {
//     document.querySelectorAll('.mitsu_type').classList.remove('active');

// }