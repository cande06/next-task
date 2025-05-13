<div class="col-12">
    <?= form_open('/form/newSubtask') ?>
    <div class="row mb-2">
        <?= form_label(
            'Titulo',
            'subtaskTitle',
            array('class' => 'form-label')
        ); ?>
        <?= form_input(array(
            'name' => 'subtaskTitle',
            'class' => 'form-control',
        )); ?>
        <?php if (session('errors.subtaskTitle')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskTitle') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-2">
        <?= form_label(
            'Descripción',
            'subtaskDesc',
            array('class' => 'form-label')
        ); ?>
        <?= form_textarea(array(
            'name' => 'subtaskDesc',
            'class' => 'form-control',
            'rows' => '2',
        )); ?>
        <?php if (session('errors.subtaskDesc')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskDesc') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-2">
        <div class="row mb-1">
            <div class="col-6">
                <?= form_label(
                    'Prioridad',
                    'subtaskPriority',
                    array('class' => 'form-label')
                ); ?>
            </div>
            <div class="col-6">
                <?= form_label(
                    'Fecha de vencimiento',
                    'subtaskDate',
                    array('class' => 'form-label')
                ); ?>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-6">
                <?= form_dropdown(
                    array('name' => 'subtaskPriority', 'id' => 'subtaskPriority', 'class' => 'form-select'),
                    array(0 => 'Sin prioridad', 'Baja' => 'Baja', 'Normal' => 'Normal', 'Alta' => 'Alta',)
                ); ?>
            </div>
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'subtaskDate',
                    'type' => 'date',
                    'class' => 'form-control',
                    'aria-label' => 'Fecha de vencimiento',
                    'aria-describedby' => 'taskDate',
                )); ?>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <?= form_label(
            'Asignar un responsable',
            'subtaskResp',
            array('class' => 'form-label')
        ); ?>
        <?= form_input(array(
            'name' => 'subtaskResp',
            'type' => 'email',
            'placeholder' => 'ejemplo@correo.com',
            'class' => 'form-control',
        )); ?>
        <div class="form-check">
            <?= form_checkbox(
                'subtaskRespCheck',
                1,
                '',
                array('id' => 'self_assign', 'class' => 'form-check-input',)
            ); ?>
            <?= form_label(
                'Asignarme como responsable',
                'self_assign',
                array('class' => 'form-check-label')
            ); ?>
        </div>
        <?php if (session('errors.subtaskResp')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskResp') ?></small></div>
        <?php } ?>
        <?php if (session('errors.subtaskRespCheck')) {   ?>
            <div><small class="text-danger"><?= session('errors.subtaskRespCheck') ?></small></div>
        <?php } ?>
    </div>
    <div class="row mb-2">
        <?= form_label(
            'Comentario',
            'subtaskComment',
            array('class' => 'form-label')
        ); ?>
        <?= form_textarea(array(
            'name' => 'subtaskComment',
            'class' => 'form-control',
            'rows' => '2',
        )); ?>
    </div>
    <?= form_hidden('taskID', $taskID); ?>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>

        <?= form_submit('Submit', 'Crear', ['class' => 'btn btn-next']) ?>
        <?= form_close() ?>
    </div>

</div>