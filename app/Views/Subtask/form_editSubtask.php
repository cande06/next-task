<div class="col-12">
    <?= form_open('/form/editSubtask') ?>
    <div class="row mb-3">
        <?= form_label(
            'Titulo',
            'subtaskTitleEdit',
            array('class' => 'form-label')
        ); ?>
        <?= form_input(array(
            'name' => 'subtaskTitleEdit',
            'value' => $subtaskTitle,
            'class' => 'form-control',
        )); ?>
        <?php if (session('errors.subtaskTitleEdit')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskTitleEdit') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <?= form_label(
            'Descripción',
            'subtaskDescEdit',
            array('class' => 'form-label')
        ); ?>
        <?= form_textarea(array(
            'name' => 'subtaskDescEdit',
            'value' => $subtaskDesc,
            'class' => 'form-control',
            'rows' => '2',
        )); ?>
        <?php if (session('errors.subtaskDescEdit')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskDescEdit') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <div class="row mb-1">
            <div class="col-6">
                <?= form_label(
                    'Prioridad',
                    'subtaskPriorityEdit',
                    array('class' => 'form-label')
                ); ?>
            </div>
            <div class="col-6">
                <?= form_label(
                    'Fecha de vencimiento',
                    'subtaskDateEdit',
                    array('class' => 'form-label')
                ); ?>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-6">

                <select name="subtaskPriorityEdit" id="subtaskPriorityEdit" class="form-control">
                    <option value="0"
                        <?= set_select('subtaskPriorityEdit', 0, old('subtaskPriorityEdit') == 0 || $subtaskPriority == 0) ?>>
                        Sin prioridad
                    </option>

                    <option value="Baja"
                        <?= set_select('subtaskPriorityEdit', 'Baja', old('subtaskPriorityEdit') == 'Baja' || $subtaskPriority == 'Baja') ?>>
                        Baja
                    </option>


                    <option value="Normal"
                        <?= set_select('subtaskPriorityEdit', 'Normal', old('subtaskPriorityEdit') == 'Normal' || $subtaskPriority == 'Normal') ?>>
                        Normal
                    </option>

                    <option value="Alta"
                        <?= set_select('subtaskPriorityEdit', 'Alta', old('subtaskPriorityEdit') == 'Alta' || $subtaskPriority == 'Alta') ?>>
                        Alta
                    </option>
                </select>

            </div>
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'subtaskDateEdit',
                    'type' => 'date',
                    'value' => $subtaskDate,
                    'class' => 'form-control',
                    'aria-label' => 'Fecha de vencimiento',
                    'aria-describedby' => 'taskDate',
                )); ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <?= form_label(
            'Responsable',
            'subtaskRespEdit',
            array('class' => 'form-label')
        ); ?>
        <?= form_input(array(
            'name' => 'subtaskRespEdit',
            'value' => $subtaskResp,
            'type' => 'email',
            'class' => 'form-control',
        )); ?>
        <?php if (session('errors.subtaskRespEdit')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskRespEdit') ?></small></div>
        <?php } ?>
    </div>
    <div class="row mb-3">
        <?= form_label(
            'Comentario',
            'subtaskCommentEdit',
            array('class' => 'form-label')
        ); ?>
        <?= form_textarea(array(
            'name' => 'subtaskCommentEdit',
            'value' => $subtaskComment,
            'class' => 'form-control',
            'rows' => '2',
        )); ?>
    </div>
    <?= form_hidden('subtaskID', $subtaskID); ?>
    <?= form_hidden('idTask', $idTask); ?>
    <?= form_hidden('idAuthor', $idAuthor); ?>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>

        <?= form_submit('Submit', 'Guardar', ['class' => 'btn btn-next']) ?>
        <?= form_close() ?>
    </div>

</div>