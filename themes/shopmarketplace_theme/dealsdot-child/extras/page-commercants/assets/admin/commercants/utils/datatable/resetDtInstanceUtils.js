import { dtTableInstants } from '../../inits/inits.js';

export function resetDtInstance(index) {

    if (typeof(dtTableInstants[index]) !== 'undefined' && 
            dtTableInstants[index] !== null) {

        if (dtTableInstants[index].clear) {

            dtTableInstants[index].clear().destroy();

        } else {

            dtTableInstants[index].fnClearTable();
            dtTableInstants[index].fnDestroy();

        }

    }
}