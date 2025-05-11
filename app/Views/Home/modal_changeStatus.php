<!-- Modal -->
<div class="modal fade" id="modalStatusTask<?= $taskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h1 class="modal-title fs-5">Eliminar tarea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body">
                <?= form_open('/') ?>
                <?= form_hidden('taskID', $taskID); ?>
                <div class="form-check">
                    <?= form_label(
                        'Creada',
                        'taskStatusC',
                        array('class' => 'form-label')
                    ); ?>
                    <?= form_radio(
                        'taskStatusOpt',
                        0,
                        '',
                        array('id' => 'taskStatusC', 'class' => 'form-check-input')
                    ); ?>
                </div>
                <div class="form-check">
                    <?= form_label(
                        'En proceso',
                        'taskStatusP',
                        array('class' => 'form-label')
                    ); ?>
                    <?= form_radio(
                        'taskStatusOpt',
                        1,
                        '',
                        array('id' => 'taskStatusP', 'class' => 'form-check-input')
                    ); ?>
                </div>
                <div class="form-check">
                    <?= form_label(
                        'Completada',
                        'taskStatusF',
                        array('class' => 'form-label')
                    ); ?>
                    <?= form_radio(
                        'taskStatusOpt',
                        -1,
                        '',
                        array('id' => 'taskStatusF', 'class' => 'form-check-input')
                    ); ?>
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