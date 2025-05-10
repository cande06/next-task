<div class="col-12">
    <?= form_open('/form/edit') ?>
    <?= form_hidden('taskID', $taskID); ?>

    <div class="row mb-3">
        <?= form_label(
            'Titulo',
            'taskTitleEdit',
            array('class' => 'form-label')
        ); ?>
        <?= form_input(array(
            'name' => 'taskTitleEdit',
            'value' => $taskTitle,
            'class' => 'form-control',
        )); ?>
        <?php if (session('errors.taskTitleEdit')) {   ?>
            <div><small class="text-danger"><?= session('errors.taskTitleEdit') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <?= form_label(
            'Descripción',
            'taskDescEdit',
            array('class' => 'form-label')
        ); ?>
        <?= form_textarea(array(
            'name' => 'taskDescEdit',
            'value' => $taskDesc,
            'class' => 'form-control',
            'rows' => '3',
        )); ?>
        <?php if (session('errors.taskDescEdit')) {   ?>
            <div><small class="text-danger"><?= session('errors.taskDescEdit') ?></small></div>
        <?php } ?>
    </div>

    <div class="row mb-3">
        <div class="row mb-1">
            <div class="col-6">
                <?= form_label(
                    'Prioridad',
                    'taskPriorityEdit',
                    array('class' => 'form-label')
                ); ?>
            </div>
            <div class="col-6">
                <?= form_label(
                    'Fecha de vencimiento',
                    'taskDateEdit',
                    array('class' => 'form-label')
                ); ?>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-6">

                <select name="taskPriorityEdit" id="taskPriorityEdit" class="form-control">
                    <option value="Baja"
                    <?= set_select('taskPriorityEdit', 'Baja', old('taskPriorityEdit') == 'Baja' || $taskPriority == 'Baja') ?>>
                        Baja
                    </option>


                    <option value="Normal"
                    <?= set_select('taskPriorityEdit', 'Normal', old('taskPriorityEdit') == 'Normal' || $taskPriority == 'Normal') ?>>
                        Normal
                    </option>

                    <option value="Alta" 
                    <?= set_select('taskPriorityEdit', 'Alta', old('taskPriorityEdit') == 'Alta' || $taskPriority == 'Alta') ?>>
                        Alta
                    </option>
                </select>

            </div>
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'taskDateEdit',
                    'type' => 'date',
                    'class' => 'form-control',
                    'aria-label' => 'Fecha de vencimiento',
                    'aria-describedby' => 'taskDateEdit',
                )); ?>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="row mb-1">
            <div class="col-6">
                <!-- <label for="taskPriority" class="form-label">Prioridad</label> -->
            </div>
            <div class="col-6">
                <?= form_label(
                    'Recordatorio',
                    'taskReminderEdit',
                    array('class' => 'form-label')
                ); ?>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-6">
                <input class="btn-check" type="radio" name="taskColor" id="none" value="#FFFFFF" autocomplete="off"
                    <?= set_radio('taskColor', '#FFFFFF', ($taskColor == '#FFFFFF') ? "true" : "") ?>>
                <label class="btn noColor" for="none"></label>

                <input class="btn-check" type="radio" name="taskColor" id="frut" value="#E5ADAE" autocomplete="off"
                    <?= set_radio('taskColor', '#E5ADAE', ($taskColor == '#E5ADAE') ? "true" : "") ?>>
                <label class="btn" id="frut" for="frut"></label>

                <input class="btn-check" type="radio" name="taskColor" id="kiwi" value="#BFD5A9" autocomplete="off"
                    <?= set_radio('taskColor', '#BFD5A9', ($taskColor == '#BFD5A9') ? "true" : "") ?>>
                <label class="btn" id="kiwi" for="kiwi"></label>

                <input class="btn-check" type="radio" name="taskColor" id="mand" value="#EABFA0" autocomplete="off"
                    <?= set_radio('taskColor', '#EABFA0', ($taskColor == '#EABFA0') ? "true" : "") ?>>
                <label class="btn" id="mand" for="mand"></label>

                <input class="btn-check" type="radio" name="taskColor" id="uva" value="#D0AFCD" autocomplete="off"
                    <?= set_radio('taskColor', '#D0AFCD', ($taskColor == '#D0AFCD') ? "true" : "") ?>>
                <label class="btn" id="uva" for="uva"></label>

                <input class="btn-check" type="radio" name="taskColor" id="coco" value="#D8C9B4" autocomplete="off"
                    <?= set_radio('taskColor', '#D8C9B4', ($taskColor == '#D8C9B4') ? "true" : "") ?>>
                <label class="btn" id="coco" for="coco"></label>
            </div>
            <div class="col-6">
                <?= form_input(array(
                    'name' => 'taskReminderEdit',
                    'type' => 'date',
                    'class' => 'form-control',
                    'aria-label' => 'Recordatorio para tarea',
                    'aria-describedby' => 'taskReminder',
                )); ?>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn me-2 btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>

        <?= form_submit('Submit', 'Guardar', ['class' => 'btn btn-next']) ?>
        <?= form_close() ?>
    </div>

</div>