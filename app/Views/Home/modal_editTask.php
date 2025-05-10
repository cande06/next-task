<!-- Modal -->
<div class="modal fade" id="modalEditTask<?= $task['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContenido">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTaskLabel">Editar tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= view('Home/form_editTask.php') ?>
            </div>
        </div>
    </div>
</div>