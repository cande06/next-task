document.querySelectorAll('input[name="taskColor"]').forEach((input) => {
  input.addEventListener('change', function () {
    const modal = document.getElementById('modalContenido');
    modal.style.backgroundColor = this.value || '#FFFFFF';
  });

});

document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(link => {
      link.addEventListener("click", function () {
        navLinks.forEach(l => l.classList.remove("active"));
        this.classList.add("active");
      });
    });
  });

var subtaskID = 0;
document.querySelectorAll('.addSubtask').forEach((t) => {
  const taskID = t.querySelector('#taskID')?.value;

  t.querySelector('#addFor' + taskID).addEventListener('click', function () {
    const nuevoDiv = document.createElement('div');
    nuevoDiv.classList.add('mb-2', 'input-group', 'input-group-sm');

    const text = document.createElement('input');
    text.type = 'text';
    text.id = 'subtaskInput';
    text.classList.add('form-control');
    text.placeholder = '...';

    const id = document.createElement('id');
    id.type = 'hidden';
    id.id = 'mainTaskID'
    id.value = taskID;

    const boton = document.createElement('button');
    boton.textContent = '+';
    boton.classList.add('btn');

    boton.addEventListener('click', function () {
      const valor = text.value.trim();
      if (valor !== '') {
        // Enviar valor al servidor con AJAX
        fetch('form/subtask', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
          },
          body: JSON.stringify({ valor: valor })
        })

          .then(res => res.json())
          .then(data => {
            if (data.success) {
              const subtasksContainer = t.querySelector('#subtasksFor' + taskID);
              const completedContainer = t.querySelector('#completedSubtasksFor' + taskID);

              const div = document.createElement('div');
              div.classList.add('form-check');

              // Crear checkbox
              const checkbox = document.createElement('input');
              checkbox.classList.add('form-check-input');
              checkbox.type = 'checkbox';
              checkbox.id = 'subtask-' + subtaskID++;

              // Crear label checkbox
              const label = document.createElement('label');
              label.classList.add('form-check-label');
              label.setAttribute('for', checkbox.id);
              label.textContent = valor;

              // Añadir al div
              div.appendChild(checkbox);
              div.appendChild(label);

              // Cambio en el check
              checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                  label.style.textDecoration = 'line-through';
                  label.classList.add('text-secondary');
                  checkbox.classList.add('text-secondary');

                  completedContainer.appendChild(div);
                } else {
                  label.style.textDecoration = 'none';

                  container.appendChild(div);
                }
              });

              subtasksContainer.appendChild(div);

              text.value = '';
            }
          });
      }
    });

    nuevoDiv.appendChild(text);
    nuevoDiv.appendChild(boton);
    t.querySelector('#sbtaskInputFor' + taskID).appendChild(nuevoDiv);
  });
});
