<!-- Contenido: Home -->
<?= view('Home/modal_newTask.php') ?>

<div class="col vw-100 overflow-hidden">
    <div class="d-flex flex-column justify-content-center align-items-center pt-3">
        <!-- <div class="row pt-3"> -->
 
            <h3>Hoy DD/MM/AA</h3>
            <h5>En proceso</h5>
            <div class="row tasks">
                <div class="col-7">
                    <div class="task d-flex justify-content-between p-2 pe-0 m-2 bg-light rounded">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <label>
                                <input type="checkbox" name="" id="">
                                <!-- <span> </span> -->
                                </label>
                            </div>
                            <div class="col" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                texto de tarea lalala lalala 
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia mollitia aut eum ex aliquid animi voluptates non, temporibus, quis laboriosam sit fugiat, autem optio quidem odit enim magni reprehenderit quas?
                            </div>
                            <div class="col-2 hTaskButtons">
                                <i class="bi bi-pen"></i> 
                                <i class="bi bi-trash"></i> 
                                <i class="bi bi-archive"></i>
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Titulo tarea</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p>lalala</p>
                        </div>
                    </div>

                </div>
            </div>
            <h5>Creadas</h5>
            <div class="row tasks">
                <div class="col-7">

                    <div class="task d-flex justify-content-between p-2 m-2 bg-light rounded">
                        <div>
                            <label>
                            <input type="checkbox">
                            <!-- <span> </span> -->
                            </label>
                        </div>
                        <div class="hTaskButtons">
                            <i class="bi bi-pen"></i>
                            <i class="bi bi-trash"></i>
                            <i class="bi bi-archive"></i>
                        </div>
                    </div>

                </div>
            </div>
        <!-- </div> -->
    </div>
</div>

<!-- End of body -->
</div>


<!-- SESSEION A BDD -->
<button id="guardarEnBD" class="btn btn-warning mt-3">Guardar en BD</button>

document.getElementById('guardarEnBD').addEventListener('click', function () {
  fetch('<?= site_url("guardar-sesion-db") ?>', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest'
    }
  })
  .then(res => res.json())
  .then(data => {
    alert(data.msg);
  });
});

<!-- subtasks -->

const container = t.querySelector('#subtasksFor' + id);
const completedContainer = t.querySelector('#completedSubtasksFor' + id);

// Crear el contenedor de la subtarea tipo formulario
const div = document.createElement('div');
div.classList.add('form-check');

// Crear el checkbox
const checkbox = document.createElement('input');
checkbox.classList.add('form-check-input');
checkbox.type = 'checkbox';
checkbox.id = 'subtask-' + Date.now(); // ID único

// Crear la etiqueta del checkbox
const label = document.createElement('label');
label.classList.add('form-check-label');
label.setAttribute('for', checkbox.id);
label.textContent = valor;

// Añadir checkbox y etiqueta al contenedor
div.appendChild(checkbox);
div.appendChild(label);

// Añadir evento al checkbox
checkbox.addEventListener('change', () => {
  if (checkbox.checked) {
    label.style.textDecoration = 'line-through';

    // Mover el div a la sección de completadas
    completedContainer.appendChild(div);
  } else {
    label.style.textDecoration = 'none';

    // Mover de nuevo a la lista de activas
    container.appendChild(div);
  }
});

// Añadir el contenedor al div principal
container.appendChild(div);

// Limpiar el campo de entrada
text.value = '';



