<div class="offcanvas offcanvas-end addSubtask <?= $task['taskColorID'] ?>" data-bs-backdrop="false" tabindex="-1" id="offcanvasTask<?= $task['id'] ?>" aria-labelledby="Label<?= $task['id'] ?>">
    <div class="offcanvas-header pb-0">
        <input type="hidden" id="taskID" value="<?= $task['id'] ?>">
        <h5 class="offcanvas-title" id="Label<?= $task['id'] ?>"><?= $task['taskTitle'] ?></h5>
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

        <div id="subtasksFor<?= $task['id'] ?>">
            <div class="d-flex justify-content-between bg-light">
                <div>
                    <input type="checkbox" name="" id="checkcito">
                    <label for="checkcito">test</label>
                    <br>
                    domingo <br>
                    # comentario xd
                </div>
                <div>
                    <a href="#"><i class="bi bi-pen me-2"></i></a>
                </div>
            </div>
        </div>

        <div id="addFor<?= $task['id'] ?>" style="cursor: pointer; padding: 10px;">
            + Agregar subtarea
        </div>
        
        <div id="sbtaskInputFor<?= $task['id'] ?>"></div>

        <div id="completedSubtasksFor<?= $task['id'] ?>" class="mt-2">
            
        </div>

    </div>
</div>