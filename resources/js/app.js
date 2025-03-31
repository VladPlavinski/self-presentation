import './bootstrap';
import './chart';
import {slider} from './slider';
import {helper} from './pageHelper';

import.meta.glob([
    '../images/**',
]);

document.addEventListener('DOMContentLoaded', function(){
    helper.init();
    slider.init();
});
