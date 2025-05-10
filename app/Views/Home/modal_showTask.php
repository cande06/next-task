<!-- Modal -->
<div class="modal fade" id="modalShowTask<?= $task['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content <?= $task['taskColorID'] ?>">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showTaskLabel"><?= $task['taskTitle'] ?>
                    <span class="badge text-bg-secondary ms-1"><?= $task['taskPriority'] ?></span>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-7">
                        <span class="text-muted">Descripción</span>
                        <p class="ps-1"><?= $task['taskDesc'] ?></p>

                        <span class="text-muted">Subtareas</span>
                        <div>
                            <span class="ms-0">Titulo <span class="badge text-bg-secondary ms-1">Priority</span></span>
                            <span class="me-0">-/-/-</span> <br>
                            Lorem ipsum <br>
                            # comment
                        </div>
                        <hr class="mt-1 mb-2">
                        <div>
                            <span>Titulo <span class="badge text-bg-secondary ms-1">Priority</span></span>
                            <span>-/-/-</span> <br>
                            Lorem ipsum <br>
                            <span class="ps-1 small"> > comment </span>
                        </div>


                    </div>

                    <div class="col-5">
                        <div class="btn-group dropend mb-2">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Status
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                            </ul>
                        </div>
                        <div class="mb-2">
                            <span class="text-muted">Vencimiento</span><br>
                            -/-/-
                        </div>
                        <div class="mb-2">
                            <span class="text-muted">Recordatorio</span><br>
                            -/-/-
                        </div>
                        <div class="mb-2">
                            <span class="text-muted">Responsable</span><br>
                            wooo
                        </div>
                        <div class="mb-2">
                            <span class="text-muted">Colaboradores
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
        </div>
    </div>
</div>