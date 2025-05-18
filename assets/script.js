document.querySelectorAll('input[name="taskColor"]').forEach((input) => {
  input.addEventListener('change', function () {
    const modal = document.getElementById('modalContenido');
    modal.style.backgroundColor = this.value || '#FFFFFF';
  });

});

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("filtroPriority");
    const select = document.getElementById("prioridad");

    select.addEventListener("change", function() {
        form.submit();
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("filtroDate");
    const select = document.getElementById("date");

    select.addEventListener("change", function() {
        form.submit();
    });
  });

// document.addEventListener("DOMContentLoaded", function () {
//     const navLinks = document.querySelectorAll(".nav-link");

//     navLinks.forEach(link => {
//       link.addEventListener("click", function () {
//         navLinks.forEach(l => l.classList.remove("active"));
//         this.classList.add("active");
//       });
//     });
//   });

