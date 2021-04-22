export function onClick_toggleSearchButtonEvent(e) {

    const $btnSearch = document.querySelector('.short-search-button'),
            $txtSearch = document.querySelector('.short-search-field');

    //e.preventDefault();

    if ($btnSearch.contains(e.target)) {

        $txtSearch.classList.toggle('visible');

    } else {

        if ($txtSearch.contains(e.target)) {

        } else {

            if ($txtSearch.classList.contains('visible')) {

                $txtSearch.classList.remove('visible');

            }

        }

    }

}