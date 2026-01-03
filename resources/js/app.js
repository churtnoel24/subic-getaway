import toastr from 'toastr'
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine
Alpine.plugin(collapse)
Alpine.start()

import './bootstrap';

// Configure Toastr
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

// Make toastr available globally (optional)
window.toastr = toastr;

document.addEventListener('DOMContentLoaded', () => {
    if (window.flashMessages.success) toastr.success(window.flashMessages.success);
    if (window.flashMessages.error) toastr.error(window.flashMessages.error);
    if (window.flashMessages.info) toastr.info(window.flashMessages.info);
    if (window.flashMessages.warning) toastr.warning(window.flashMessages.warning);

    if (Array.isArray(window.flashMessages.errors)) {
        window.flashMessages.errors.forEach(msg => toastr.error(msg));
    }
});
