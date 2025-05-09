<div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="offcanvasTask<?= $task['id']?>" aria-labelledby="Label<?= $task['id']?>">
    <div class="offcanvas-header pb-0">
        <h5 class="offcanvas-title" id="Label<?= $task['id']?>"><?= $task['taskTitle'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-1">
        <span class="badge text-bg-secondary mb-2">Priority</span>
        <p><?= $task['taskDesc'] ?></p>
        <span class="taskSubtitle text-body-secondary">Fecha de vencimiento</span> dd-mm-aa
        <br>
        <span class="taskSubtitle text-body-secondary">Recordatorio</span> <br>
        <span class="taskSubtitle text-body-secondary">Colaboradores</span> <br>
        <hr>

        <span class="taskSubtitle text-body-secondary">Subtareas</span> <br>
        <ul id="valoresIngresados" class="list-group"></ul>
        <div id="agregar" style="cursor: pointer; background: #eee; padding: 10px;">
            + Agregar subtarea
        </div>

        <div id="contenedor"></div>
    </div>
</div>
</div>