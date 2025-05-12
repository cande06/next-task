<!-- Modal -->
<div class="modal fade" id="modalStatusTask<?= $taskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <?= form_open('/change/status') ?>
                <?= form_hidden('taskID', $taskID); ?>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="taskStatus" id="taskStatusC" value="0"
                    <?= set_radio('taskStatus', '0', ($taskStatus == 'Creada') ? "true" : "") ?> 
                    >
                    <label class="form-check-label" for="taskStatusC">
                        Creada
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="taskStatus" id="taskStatusP" value="1"
                    <?= set_radio('taskStatus', '1', ($taskStatus == 'En Proceso') ? "true" : "") ?>>
                    <label class="form-check-label" for="taskStatusP">
                        En Proceso
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="taskStatus" id="taskStatusF" value="-1"
                    <?= set_radio('taskStatus', '-1', ($taskStatus == 'Completada') ? "true" : "") ?>>
                    <label class="form-check-label" for="taskStatusF">
                        Completada
                    </label>
                </div>


                <div class="d-flex justify-content-end mt-2">
                    <button type="button" class="btn btn-sm me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <?= form_submit('Submit', 'Cambiar', ['class' => 'btn btn-sm btn-next']) ?>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>