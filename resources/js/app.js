import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jQuery from 'jquery';
window.$ = jQuery;

import jqueryConfirmMin from 'jquery-confirm';
window.confirm = jqueryConfirmMin;

import Swal from 'sweetalert2'
window.Swal = Swal;

