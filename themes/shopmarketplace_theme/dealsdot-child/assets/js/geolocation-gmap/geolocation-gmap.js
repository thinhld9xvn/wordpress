import { initAutoCompleteUI } from './utils/initAutoCompleteUIUtils.js';

import { initGeoLocation } from './utils/initGeoLocationUtils.js';

import { initialize } from './utils/initializeUtils.js';

import { renderGmapWhenViewDetailsStore } from './utils/map/renderGmapWhenViewDetailsStoreUtils.js';

initAutoCompleteUI();

initGeoLocation();

initialize();

renderGmapWhenViewDetailsStore();