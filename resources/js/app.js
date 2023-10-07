import './bootstrap';

import Alpine from 'alpinejs';
import { Datepicker, Input, Collapse, Ripple, Carousel, Alert, Modal, initTE } from "tw-elements";
initTE({ Datepicker, Carousel, Collapse, Ripple, Alert, Modal, Input });
// Initialization for ES Users

window.Alpine = Alpine;

Alpine.start();
