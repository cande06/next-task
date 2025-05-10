<div class="card task mb-3 <?= $taskColorID ?> <?= ($taskPriority == 'Alta') ? "taskBorder" : "" ?>">
    <input type="hidden" id="taskID" value="<?= $taskID ?>">

    <div class="card-body p-0">

        <div class="row align-items-center">
            <div class="col-11">
                <div class="card-body p-3 pb-2" data-bs-toggle="modal" data-bs-target="#modalShowTask<?= $taskID ?>">
                    <p class="card-title fs-5 fw-semibold text-truncate mb-0" style="transform: rotate(0);">
                        <a class="text-decoration-none stretched-link" href="<?= base_url('/tarea/' . $taskID) ?>">
                            <?= $taskTitle ?>
                        </a>
                        
                    </p>
                    <small class="text-body-secondary ps-1">0/2</small>
                     <!-- <br> -->

                    
                    <!-- <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                </div>
            </div>
            <div class="col-1 ps-0" id="<?= $taskChecked ?>">
                <button class="btn">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card-footer text-body-secondary text-end">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#modalEditTask" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalEditTask<?= $taskID ?>">
                    <span class="badge text-body-secondary"> Creada </span>
                </a>
            </div>

            <div>
                <a href="#modalEditTask" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalEditTask<?= $taskID ?>">
                    <i class="bi bi-pen me-2"></i>
                </a>
                <i class="bi bi-trash"></i>
            </div>

        </div>
    </div>
</div>