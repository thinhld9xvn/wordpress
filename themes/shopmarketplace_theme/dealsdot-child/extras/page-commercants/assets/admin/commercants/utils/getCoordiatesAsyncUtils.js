import { commercants_lists_data, addr_lists } from '../inits/inits.js';

import { performGetCoordiates } from '../utils/performGetCoordiatesUtils.js';

import { getCommercantsDtField } from '../utils/datatable/getCommercantsDtFieldUtils.js';

export async function getCoordiateAsync() {

    var coordiates_data = '',
        update_dt = null;   

    if (commercants_lists_data.length > 0) {

        //console.log(commercants_lists_data);

        commercants_lists_data.forEach((row, i) => {

            let txtAddr = '',
                numero = getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.NUMERO),
                address = getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ADDRESSE),
                ville = getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.VILLE);

            //console.log(numero + '-' + address + '-' + ville);

            if (numero) {
                txtAddr += numero + ' ';
            }

            if (address) {
                txtAddr += address + ' ';
            }

            if (ville) {
                txtAddr += ville;
            }

            if (txtAddr) {

                txtAddr += ', france';

                addr_lists.push(txtAddr);

            }


        });

        const addr_length = addr_lists.length;

        //console.log(addr_length);

        for (let j = 0; j < addr_length; j++) {

            const result_data = await new Promise((resolve, reject) => {

                resolve(performGetCoordiates(addr_lists, j, addr_length));

            });

            coordiates_data += result_data;

        }

        setTimeout(async function() {

            //console.log('waitting ...');

            update_dt = await jQuery.ajax({

                method: "POST",
                url: ajaxurl,
                data: {
                    action: __ACTIONS_HOOKS_LIST.UNICORN_COMMERCANTS_UPDATE_COORDIATES_DATA_ACTION,
                    commercants_coords_list: coordiates_data
                }

            });

        }, 5000);

    }

    return update_dt;

}