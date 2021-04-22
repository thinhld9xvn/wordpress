import { onClick_toggleSearchButtonEvent } from '../handleEvents/onClick_toggleSearchButtonEvent.js';

export function setupToggleSearchButton() {   

    document.body.addEventListener('click', onClick_toggleSearchButtonEvent);

}