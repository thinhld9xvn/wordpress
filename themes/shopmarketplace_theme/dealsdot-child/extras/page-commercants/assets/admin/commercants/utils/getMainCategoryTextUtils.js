export function getMainCategoryText(id) {

    const $this = this;

    return $this.find('option[value="' + id + '"]').text();

}