<!-- Modal -->
<div class="modal fade" id="modalEditSubtask<?= $subtaskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSubtaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editSubtaskLabel">Editar subtarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= view('Subtask/form_editSubtask.php') ?>
            </div>
        </div>
    </div>
</div>