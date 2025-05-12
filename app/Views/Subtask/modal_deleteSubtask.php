<!-- Modal -->
<div class="modal fade" id="modalDelSubtask<?= $subtaskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delSubtaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delSubtaskLabel">Eliminar subtarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Eliminar subtarea?</p>

                <?= form_open('/form/deleteSubtask') ?>
                <?= form_hidden('subtaskID', $subtaskID); ?>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <?= form_submit('Submit', 'Eliminar', ['class' => 'btn btn-danger']) ?>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>