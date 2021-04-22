import { setDistanceValue, setStoreNameSelected, setCategoryIdsSelected } from '../inits/inits.js';

export function resetDefFilterValues() {

    setDistanceValue(0);
    setStoreNameSelected('');
    setCategoryIdsSelected([]); 

}