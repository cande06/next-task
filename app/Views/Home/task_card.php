<div class="card mb-3 rounded-1 <?= $taskColorID ?> ">
    <input type="hidden" id="taskID" value="<?= $taskID ?>">

    <div class="card-body p-0">

        <div class="row align-items-center">
            <div class="col">
                <div class="card-body p-3 pb-2" data-bs-toggle="modal" data-bs-target="#modalShowTask<?= $taskID ?>">

                    <p style="transform: rotate(0);" class="card-title fs-6 text-truncate mb-0
                    <?= ($taskPriority == 'Alta') ? "fw-bold text-decoration-underline link-offset-2 taskBorder" : "fw-semibold" ?>">
                        <a class="text-decoration-none stretched-link" href="<?= base_url('/tarea/' . $taskID) ?>">
                            <?= $taskTitle ?>
                        </a>
                        
                    </p>
                    <small class="text-body-secondary ps-1">0/2</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-body-secondary py-1 px-3 border-0">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#modalStatusTask<?= $taskID ?>" class="text-decoration-none" data-bs-toggle="modal">
                    <span class="badge text-body-secondary"><?= $taskStatus ?></span>
                </a>
            </div>

            <div class="me-2">
                <a href="#modalEditTask<?= $taskID ?>" class="link" data-bs-toggle="modal">
                    <i class="bi bi-pen me-2"></i>
                </a>
                <a href="#modalDelTask<?= $taskID ?>" class="link" data-bs-toggle="modal">
                    <i class="bi bi-trash"></i>
                </a>
            </div>

        </div>
    </div>
</div>