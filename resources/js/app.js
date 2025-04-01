import './bootstrap';
import {slider} from './slider';
import {helper} from './pageHelper';
import {chart} from './chart';

import.meta.glob([
    '../images/**',
]);

document.addEventListener('DOMContentLoaded', function(){
    helper.init();
    slider.init();
    chart.init();
});
