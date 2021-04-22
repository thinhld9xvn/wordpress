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