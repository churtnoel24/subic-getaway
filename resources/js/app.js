import toastr from 'toastr'
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
//images imports
import '../images/logo.png';
import '../images/ads.jpg';
import '../images/ads2.jpg';
import '../images/ads3.jpg';
import '../images/event.jpg';
import '../images/facebook.png';
import '../images/food.jpg';
import '../images/hotel.jpeg';
import '../images/hotel1.jpg';
import '../images/hotel2.jpg';
import '../images/inflatable.jpg';
import '../images/instagram.png';
import '../images/landmark.jpg';
import '../images/malawaan.jpg';
import '../images/moonbay.jpg';
import '../images/mustsee.jpg';
import '../images/office.jpg';
import '../images/Resort.jpg';
import '../images/restaurant.jpg';
import '../images/restaurant1.jpg';
import '../images/room1.jpeg';
import '../images/room2.jpg';
import '../images/safari.jpg';
import '../images/SubicHotels.jpg';
import '../images/SubicRes.jpg';
import '../images/tik-tok.png';
import '../images/youtube.png';

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
