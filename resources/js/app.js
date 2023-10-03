import './bootstrap';

import Alpine from 'alpinejs';
import { Datepicker, Input, Collapse, Ripple, initTE } from "tw-elements";
initTE({ Datepicker, Collapse, Ripple, Input });
// Initialization for ES Users

window.Alpine = Alpine;

Alpine.start();
