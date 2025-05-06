/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

document.querySelectorAll('input[name="color"]').forEach((input) => {
    input.addEventListener('change', function () {
        const modal = document.getElementById('modalContenido');
        modal.style.backgroundColor = this.value || '#ffffff';
    });

    // Establece el color inicial cuando se abre
    if (input.checked) {
        document.getElementById('modalContenido').style.backgroundColor = input.value;
    }
});