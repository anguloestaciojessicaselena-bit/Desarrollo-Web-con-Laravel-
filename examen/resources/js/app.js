import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;
import 'datatables.net-bs5';
import 'datatables.net-responsive-bs5';
import './datatables';
import './validation';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
