<!-- Modal -->
<div class="modal fade" id="modalDelTask<?= $taskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delTaskLabel">Eliminar tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Eliminar tarea?</p>

                <?= form_open('/form/deleteTask') ?>
                <?= form_hidden('taskID', $taskID); ?>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <?= form_submit('Submit', 'Eliminar', ['class' => 'btn btn-danger']) ?>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>