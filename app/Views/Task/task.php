<!-- Contenido: Task -->
<div class="col-lg-9 col vh-100 m-0 <?= $task['taskColorID'] ?>"> <!-- vw-100 -->
    <?= view('Home/modal_newTask.php') ?>

    <div class="row mx-1 mt-5 text-start">
        <span class="fs-4"><a href=""><i class="bi bi-arrow-left"></i></a></span>
    </div>

    <div class="row mx-3 mt-2">
        <div class="row">
            <p class="h3">
                <?= $task['taskTitle'] ?>
                <!-- <small class="text-body-secondary">0/2</small> -->
            </p>
        </div>
        <div class="col-5">
            <div class="mb-2">
                <span class="h6 text-body-secondary">Descripción</span>
                <p class="ps-1"><?= $task['taskDesc'] ?></p>
            </div>
            <div class="mb-2">
                <span class="h6 mark">Vencimiento</span><br>
                <?= $task['taskDate'] ?>
            </div>
            <div class="mb-2">
                <span class="h6 mark">Responsable</span><br>
                wooo
            </div>
            <div class="mb-2">
                <span class="h6 highlight">Colaboradores
                    <button class="btn btn-sm">
                        <i class="bi bi-share"></i>
                    </button>
                </span><br>
                <br>
                <br>
            </div>


        </div>

        <div class="col-7">
            <div class="mb-2">
                <p class="fs-6 highlight">Subtareas</p>

                <div class="subtareas-container mb-2">

                    <?php foreach ($subtasks as $sub) { ?>
                        <div class="card mb-2" style="background-color: transparent;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <span class="text-decoration-underline link-offset-2"><?= $sub['subtaskTitle'] ?></span><br>

                                        <span class="small">
                                            <i class="bi bi-person"></i>
                                            <?= $sub['subtaskResp'] ?>
                                        </span> <br>

                                        <span class="small"><?= $sub['subtaskDesc'] ?></span> <br>

                                        <?php if ($sub['subtaskComment'] != '') { ?>
                                            <span class="ps-1 small text-body-secondary"><?= $sub['subtaskComment'] ?></span>
                                        <?php } ?>

                                    </div>
                                    <div class="col-2">
                                        <span class="badge text-body-secondary ms-1"><?= $sub['subtaskPriority'] ?></span><br>
                                        <span class="badge text-body-secondary ms-1">Estado</span> <br>

                                        <span>-/-/-</span> <br>
                                        <!-- <?= $sub['subtaskDate'] ?> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-body-secondary text-end py-1 px-3 border-0">
                                <a href="#modalEditTask<?= $task['taskID'] ?>" class="link" data-bs-toggle="modal">
                                    <i class="bi bi-pen me-2"></i>
                                </a>
                                <a href="#modalDelTask<?= $task['taskID'] ?>" class="link" data-bs-toggle="modal">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                </div>

                <a class="icon-link text-decoration-none" href="#modalNewSubtask" data-bs-toggle="modal">
                    <span><i class="bi bi-plus-lg"></i> Agregar tarea</span>
                </a>
            </div>
        </div>
    </div>

    <?= view('Task/modal_newSubtask.php', array('taskID' => $task['taskID'])) ?>
    <?= view('Home/modal_editTask.php', $task); ?>
    <?= view('Home/modal_deleteTask.php', $task); ?>

</div>