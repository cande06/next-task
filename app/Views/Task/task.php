<!-- Contenido: Task -->
<div class="col-lg-9 col vh-100 m-0 overflow-auto <?= $task['taskColorID'] ?>"> <!-- vw-100 -->

    <div class="row mx-1 mt-5 text-start">
        <span class="fs-4">
            <a href="<?= url_to('Views::index') ?>"><i class="bi bi-arrow-left"></i></a>
        </span>
    </div>

    <div class="row mx-3 mt-2">
        <!-- Title -->
        <div class="row">
            <p class="h3 mb-2">
                <?= $task['taskTitle'] ?>
            </p>
        </div>
        <!-- Info -->
        <div class="row pe-0">
            <div class="col">
                <p>
                    <span class="badge text-body-secondary ms-1 pe-1"><?= $task['taskPriority'] ?></span>
                    <a href="#modalStatusTask<?= $task['taskID']  ?>" class="text-decoration-none" data-bs-toggle="modal">
                        <span class="badge text-body-secondary"><?= $task['taskStatus'] ?></span>
                    </a>
                </p>
            </div>
            <div class="col-5 ps-4">
                <div>
                    <?php if ($task['isTaskOwner']) { ?>
                        <a href="#modalEditTask<?= $task['taskID']  ?>" class="link" data-bs-toggle="modal">
                            <i class="bi bi-pen me-2"></i>
                        </a>
                    <?php } ?>

                    <?php if ($task['isTaskOwner']) { ?>
                        <a href="#modalDelTask<?= $task['taskID']  ?>" class="link" data-bs-toggle="modal">
                            <i class="bi bi-trash me-2"></i>
                        </a>
                    <?php } ?>

                    <?php if ($task['isTaskOwner'] && $task['taskStatus'] == 'Completada') { ?>
                        <a href="<?= base_url('/archive/' . $task['taskID']) ?>" class="link">
                            <i class="bi bi-archive"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Columna Izquierda -->
        <div class="col-7">
            <div class="mb-3 rounded-end bg-dark bg-opacity-10">
                <!-- <span class="text-decoration-underline link-offset-2">Descripción</span> -->
                <p class="ps-1"><?= $task['taskDesc'] ?></p>
            </div>
            <div class="mb-3">
                <p>
                    <span class="text-decoration-underline link-offset-2">Subtareas</span>
                    <small class="text-body-secondary ms-2">0/2</small>
                </p>

                <a class="icon-link text-decoration-none mb-3" href="#modalNewSubtask" data-bs-toggle="modal">
                    <span><i class="bi bi-plus-lg"></i> Agregar tarea</span>
                </a>

                <div class="subtareas-container mb-2">
                    <?php foreach ($subtasks as $sub) { 
                        $d = array('subtaskID' => $sub['subtaskID'],
                                    'subtaskStatus' => $sub['subtaskStatus'],
                                    'taskID' => $task['taskID']);
                    ?>

                        <?= view('Subtask/subtask.php', $sub); ?>
                        <?= view('Subtask/modal_editSubtask.php', $sub); ?>
                        <?= view('Subtask/modal_deleteSubtask.php', array('subtaskID' => $sub['subtaskID'])); ?>
                        <?= view('Subtask/modal_changeSubStatus.php', $d); ?>

                    <?php } ?>
                </div>

            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="col-5">

            <!-- <div class="mb-3">
                <span class="text-decoration-underline link-offset-2">Responsable</span><br>
                wooo
            </div> -->
            <div class="mb-3">
                <span class="text-decoration-underline link-offset-2">Vencimiento</span><br>
                <?= $task['taskDate'] ?>
            </div>
            <div class="mb-3">
                <span class="text-decoration-underline link-offset-2">Recordatorio</span><br>
                <?= $task['taskDate'] ?>
            </div>

            <div class="mb-3">
                <div class="d-flex- align-items-center">
                    <span class="text-decoration-underline link-offset-2">Colaboradores</span>

                    <?php if ($task['isTaskOwner']) { ?>
                        <a href="#modalCollabFor<?= $task['taskID'] ?>" class="btn btn-sm btn-task" data-bs-toggle="modal">
                            <i class="bi bi-share"></i>
                        </a>
                    <?php } ?>

                    <!-- <button class="btn btn-sm btn-task">
                        <i class="bi bi-share"></i>
                    </button>
                    <br> -->
                </div>
                <div class="ps-1">
                    <p class="text-body-secondary mb-1">example@</p>
                    <p class="text-body-secondary mb-1">example@</p>
                </div>
            </div>

        </div>

    </div>

    <?= view('Home/modal_changeStatus.php', $task); ?>
    <?= view('Home/modal_editTask.php', $task); ?>
    <?= view('Home/modal_deleteTask.php', $task); ?>
    <?= view('Task/modal_newSubtask.php', array('taskID' => $task['taskID'])) ?>
    <?= view('Task/m_collab.php', $task); ?>

</div>