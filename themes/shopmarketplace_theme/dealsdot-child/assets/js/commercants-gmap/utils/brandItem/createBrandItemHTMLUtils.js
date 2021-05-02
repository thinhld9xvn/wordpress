export function createBrandItemHTML(i) {

    const address = _brands_lists_info[i].address,
        phone = _brands_lists_info[i].telephone_commerce,
        secteur = _brands_lists_info[i].secteur_activity,
        name = _brands_lists_info[i].enseigne;

    return `<div class="brand-item"
                data-index="${i}"     							     
                data-address="${address}"
                data-phone="${phone}"
                data-secteur="${secteur}"
                data-name="${name}">

                <h4>${name}</h4>

                <div class="addr mtop20">

                    <p>${secteur}</p>
                    <p>${address}</p>
                    <p>${phone}</p>

                </div>

            </div>`;

}

export function createBrandItemHTMLByObject(item) {   

    const { address, telephone_commerce, secteur_activity, enseigne } = item.data,
          i = item.index;    

    return `<div class="brand-item"
                data-index="${i}"     							     
                data-address="${address}"
                data-phone="${telephone_commerce}"
                data-secteur="${secteur_activity}"
                data-name="${enseigne}">

                <h4>${enseigne}</h4>

                <div class="addr mtop20">

                    <p>${secteur_activity}</p>
                    <p>${address}</p>
                    <p>${telephone_commerce}</p>

                </div>

            </div>`;


}