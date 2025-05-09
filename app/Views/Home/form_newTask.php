<div class="col-12">
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
            'class' => 'form-control',
        )); ?>
        <?php if (session('errors.taskTitle')) {   ?>
            <div style="height: 20px; color: red; font-size: small;"><?= session('errors.taskTitle') ?></div>
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
            // 'placeholder' => 'Aquí puedes incluir una descripción de tu tarea',
            'class' => 'form-control',
            'rows' => '3',
        )); ?>
        <?php if (session('errors.taskDesc')) {   ?>
            <div style="height: 20px; color: red; font-size: small;"><?= session('errors.taskDesc') ?></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <div class="row mb-1">
            <div class="col-6">
                <label for="taskPriority" class="form-label">Prioridad</label>
            </div>
            <div class="col-6">
                <?= form_label(
                    'Fecha de vencimiento',
                    'taskDate',
                    array('class' => 'form-label')
                ); ?>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-6">
                <input type="radio" class="btn-check" name="taskPriority" id="-1" value="-1" autocomplete="off">
                <label class="btn btn-outline-secondary" for="-1">Baja</label>

                <input type="radio" class="btn-check" name="taskPriority" id="0" value="0" autocomplete="off" checked>
                <label class="btn btn-outline-secondary" for="0">Normal</label>

                <input type="radio" class="btn-check" name="taskPriority" id="1" value="1" autocomplete="off">
                <label class="btn btn-outline-secondary" for="1">Alta</label>
            </div>
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'taskDate',
                    'type' => 'date',
                    'class' => 'form-control',
                    'aria-label' => 'Fecha de vencimiento',
                    'aria-describedby' => 'taskDate',
                )); ?>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-2 ">
            <?= form_label(
                'Asignar tarea',
                'taskCollab',
                array('class' => 'form-label')
            ); ?>
        </div>
        <div class="col ps-2">
            <?= form_input(array(
                'name' => 'taskCollab',
                'placeholder' => 'ejemplo@correo.com',
                'class' => 'form-control',
                'aria-label' => 'Asignar tarea',
                'aria-describedby' => 'taskCollab',
            )); ?>
            <?php if (session('errors.taskCollab')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.taskCollab') ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-2 ">
            <?= form_label(
                'Recordatorio',
                'taskReminder',
                array('class' => 'form-label')
            ); ?>
        </div>
        <div class="col-3 ps-2">
            <?= form_input(array(
                'name' => 'taskReminder',
                'type' => 'date',
                'class' => 'form-control',
                'aria-label' => 'Recordatorio para tarea',
                'aria-describedby' => 'taskReminder',
            )); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <input class="btn-check" type="radio" name="taskColor" id="none" value="#ffffff" autocomplete="off" checked>
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