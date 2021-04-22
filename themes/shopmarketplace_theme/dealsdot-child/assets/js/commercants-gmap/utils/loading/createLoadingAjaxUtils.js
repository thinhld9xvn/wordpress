export function createLoadingAjax() {

    jQuery('.page-contents').prepend(`<div class="perform-ajax">
                                    <span class="fa fa-circle-o-notch fa-spin"></span>
                                    <span class="caption">Chargement des données, veuillez patienter ...</span>
                                </div>`);

}