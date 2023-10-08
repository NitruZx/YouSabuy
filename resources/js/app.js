import './bootstrap';

import Alpine from 'alpinejs';
import { Datepicker, Datatable, Tab, Input, Collapse, Ripple, Carousel, Alert, Modal, initTE } from "tw-elements";
initTE({ Datepicker, Datatable, Tab, Carousel, Collapse, Ripple, Alert, Modal, Input });
// Initialization for ES Users

window.Alpine = Alpine;

Alpine.start();
