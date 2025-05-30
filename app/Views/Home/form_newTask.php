<div class="col-12">
    <?php $errors = session('errors'); ?>

    <?= form_open('/form/create') ?>
    <div class="row mb-3">
        <?= form_label(
            'Titulo',
            'taskTitle',
            array('class' => 'form-label')
        ); ?>
        <?= form_input(array(
            'name' => 'taskTitle',
            'placeholder' => 'Iniciar proyecto de Técnicas',
            'value' => old('taskTitle'),
            'class' => 'form-control',
        )); ?>
        <?php if (session('errors.taskTitle')) {   ?>
            <div><small class="text-danger"><?= session('errors.taskTitle') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <?= form_label(
            'Descripción',
            'taskDesc',
            array('class' => 'form-label')
        ); ?>
        <?= form_textarea(array(
            'name' => 'taskDesc',
            'value' => old('taskDesc'),
            'class' => 'form-control',
            'rows' => '3',
        )); ?>
        <?php if (session('errors.taskDesc')) {   ?>
            <div><small class="text-danger"><?= session('errors.taskDesc') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <?= form_label(
            'Prioridad',
            'taskPriority',
            array('class' => 'form-label')
        ); ?>

        <?= form_dropdown(
            array('name' => 'taskPriority', 'id' => 'taskPriority', 'class' => 'form-select'),
            array('Baja' => 'Baja', 'Normal' => 'Normal', 'Alta' => 'Alta',),
            'Normal'
        ); ?>

    </div>

    <div class="row mb-3">
        <div class="row mb-1">
            <div class="col-6">
                <?= form_label(
                    'Fecha de vencimiento',
                    'taskDate',
                    array('class' => 'form-label')
                ); ?>

            </div>
            <div class="col-6">
                <?= form_label(
                    'Recordatorio',
                    'taskReminder',
                    array('class' => 'form-label')
                ); ?>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'taskDate',
                    'type' => 'date',
                    'value' => old('taskDate'),
                    'class' => 'form-control',
                    'aria-label' => 'Fecha de vencimiento',
                    'aria-describedby' => 'taskDate',
                )); ?>
                <?php if (isset($errors['taskDate'])) {   ?>
                    <div><small class="text-danger"><?= $errors['taskDate'] ?></small></div>
                <?php } ?>
            </div>
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'taskReminder',
                    'type' => 'date',
                    'value' => old('taskReminder'),
                    'class' => 'form-control',
                    'aria-label' => 'Recordatorio para tarea',
                    'aria-describedby' => 'taskReminder',
                )); ?>
                <?php if (isset($errors['taskReminder'])) {   ?>
                    <div><small class="text-danger"><?= $errors['taskReminder'] ?></small></div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <input class="btn-check" type="radio" name="taskColor" id="none" value="#FFFFFF" autocomplete="off" checked>
            <label class="btn noColor" for="none"></label>

            <input class="btn-check" type="radio" name="taskColor" id="frut" value="#E5ADAE" autocomplete="off">
            <label class="btn" id="frut" for="frut"></label>

            <input class="btn-check" type="radio" name="taskColor" id="kiwi" value="#BFD5A9" autocomplete="off">
            <label class="btn" id="kiwi" for="kiwi"></label>

            <input class="btn-check" type="radio" name="taskColor" id="mand" value="#EABFA0" autocomplete="off">
            <label class="btn" id="mand" for="mand"></label>

            <input class="btn-check" type="radio" name="taskColor" id="uva" value="#D0AFCD" autocomplete="off">
            <label class="btn" id="uva" for="uva"></label>

            <input class="btn-check" type="radio" name="taskColor" id="coco" value="#D8C9B4" autocomplete="off">
            <label class="btn" id="coco" for="coco"></label>
        </div>
    </div>


    <div class="d-flex justify-content-end">
        <button type="button" class="btn me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>

        <?= form_submit('Submit', 'Crear', ['class' => 'btn btn-next']) ?>
        <?= form_close() ?>
    </div>

</div>