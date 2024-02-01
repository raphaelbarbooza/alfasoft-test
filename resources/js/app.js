// Laravel Boostrap
import './bootstrap';

// Import Bootstrap 5
import * as bootstrap from 'bootstrap'

// Import SweetAlerts funcions
import './sweetAlerts.js'
document.addEventListener("DOMContentLoaded", function(){
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});

