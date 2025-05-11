<!-- Contenido: Task -->
<div class="col-lg-9 col vh-100 m-0 <?= $taskColorID ?>"> <!-- vw-100 -->
    <?= view('Home/modal_newTask.php') ?>

    <div class="row mx-1 mt-5 text-start">
        <span class="fs-4"><a href=""><i class="bi bi-arrow-left"></i></a></span>
    </div>

    <div class="row mx-3 mt-2">
        <div class="row">
            <p class="h3">
                <?= $taskTitle ?>
                <!-- <small class="text-body-secondary">0/2</small> -->
            </p>
        </div>
        <div class="col-5">
            <div class="mb-2">
                <span class="h6 text-body-secondary">Descripción</span>
                <p class="ps-1"><?= $taskDesc ?></p>
            </div>
            <div class="mb-2">
                <span class="h6 mark">Vencimiento</span><br>
                -/-/-
            </div>
            <div class="mb-2">
                <span class="h6 mark">Responsable</span><br>
                wooo
            </div>
            <div class="mb-2">
                <span class="h6 mark">Colaboradores
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
                <p class="h6 highlight">Subtareas</p>

                <div class="subtareas-container mb-2">
                    <div class="subtask">
                        <span>Titulo <span class="badge text-bg-secondary ms-1">Priority</span></span>
                        <span>-/-/-</span> <br>
                        <span class="small">Lorem ipsum</span> <br>
                        <span class="ps-1 small text-body-secondary"> # comment </span>
                    </div>
                    <hr class="mt-1 mb-2">
                </div>
                <a class="icon-link text-decoration-none" href="#modalNewSubtask" data-bs-toggle="modal">
                    <span><i class="bi bi-plus-lg"></i> Agregar tarea</span>
                </a>
            </div>
        </div>
    </div>

    <?= view('Task/modal_newSubtask.php', array('taskID' => $id)) ?>

</div>