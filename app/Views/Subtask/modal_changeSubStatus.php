<!-- Modal -->
<div class="modal fade" id="modalStatusSubtask<?= $subtaskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <?= form_open('/update/sbtask-status/' . $subtaskID . '/' . $taskID ) ?>
                

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subtaskStatus" id="subtaskStatusC" value="0"
                        <?= set_radio('subtaskStatus', '0', ($subtaskStatus == 'Creada') ? "true" : "") ?>>
                    <label class="form-check-label" for="subtaskStatusC">
                        Creada
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subtaskStatus" id="subtaskStatusP" value="1"
                        <?= set_radio('subtaskStatus', '1', ($subtaskStatus == 'En proceso') ? "true" : "") ?>>
                    <label class="form-check-label" for="subtaskStatusP">
                        En proceso
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subtaskStatus" id="subtaskStatusF" value="2"
                        <?= set_radio('subtaskStatus', '2', ($subtaskStatus == 'Completada') ? "true" : "") ?>>
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