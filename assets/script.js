
// document.addEventListener('DOMContentLoaded', () => {
//   const form = document.getElementById('myForm');

//   form.addEventListener('submit', function(e) {
//     e.preventDefault(); 
//   })
// });

document.querySelectorAll('input[name="taskColor"]').forEach((input) => {
    input.addEventListener('change', function () {
        const modal = document.getElementById('modalContenido');
        modal.style.backgroundColor = this.value || '#ffffff';
    });

    // Establece el color inicial cuando se abre
    // if (input.checked) {
    //     document.getElementById('modalContenido').style.backgroundColor = input.value;
    // }
});