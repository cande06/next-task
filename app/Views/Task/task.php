<!-- Contenido: Task -->
<div class="col vw-100 <?= $task['taskColorID'] ?>">
    <?= view('Home/modal_newTask.php') ?>

    <div class="row m-3 mt-5">
        <div class="row">
            <p class="h3">
                <?= $task['taskTitle'] ?>
                <small class="text-body-secondary">0/2</small>
            </p>
        </div>
        <div class="col-7">

            <div class="mb-2">
                <span class="h6 mark">Descripción</span>
                <p class="ps-1"><?= $task['taskDesc'] ?></p>
            </div>

            <div class="mb-2">
                <p class="h6 mark">Subtareas</p>

                <div class="subtareas-container mb-2">
                    <div class="subtask">
                        <span>Titulo <span class="badge text-bg-secondary ms-1">Priority</span></span>
                        <span>-/-/-</span> <br>
                        Lorem ipsum <br>
                        <span class="ps-1 small"> # comment </span>
                    </div>
                    <hr class="mt-1 mb-2">
                    <div class="subtask">
                        <span>Titulo <span class="badge text-bg-secondary ms-1">Priority</span></span>
                        <span>-/-/-</span> <br>
                        Lorem ipsum <br>
                        <span class="ps-1 small"> > comment </span>
                    </div>
                </div>
                <a class="icon-link text-decoration-none"  href="#">
                   <span><i class="bi bi-plus-lg"></i> Agregar tarea</span> 
                </a>
            </div>

        </div>

        <div class="col-5">
            <!-- <div class="btn-group dropend mb-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Status
                </button>
                <ul class="dropdown-menu">
                    
                </ul>
            </div> -->
            <div class="mb-2">
                <span class="h6 mark">Vencimiento</span><br>
                -/-/-
            </div>
            <div class="mb-2">
                <span class="h6 mark">Recordatorio</span><br>
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
    </div>

</div>