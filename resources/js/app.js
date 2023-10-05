import './bootstrap';

import Alpine from 'alpinejs';
import { Datepicker, Input, Collapse, Ripple, Carousel, initTE } from "tw-elements";
initTE({ Datepicker, Carousel, Collapse, Ripple, Input });
// Initialization for ES Users

window.Alpine = Alpine;

Alpine.start();
