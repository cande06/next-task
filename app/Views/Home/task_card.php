<div class="card task mb-3 <?= $task['taskColorID'] ?> <?= ($task['taskPriority'] == 'Alta') ? "taskBorder" : "" ?>">
    <input type="hidden" id="taskID" value="<?= $task['id']?>">

    <div class="card-body p-0">

        <div class="row align-items-center">
            <div class="col-11">
                <div class="card-body p-3 pb-2" data-bs-toggle="modal" data-bs-target="#modalShowTask<?= $task['id'] ?>">
                    <span class="card-title fs-5 fw-semibold"><?= $task['taskTitle'] ?></span> 
                    <small class="text-body-secondary ps-1">0/2</small> <br>
                    <!-- <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                </div>
            </div>
            <div class="col-1 ps-0" id="<?= $task['taskChecked'] ?>">
                <input class="btn-check" type="checkbox" name="taskCheck" id="btn-check-<?= $task['id']?>" autocomplete="off">
                <label class="btn" for="btn-check-<?= $task['id']?>"><i class="bi bi-circle"></i></label>
            </div>
        </div>
    </div>

    <div class="card-footer text-body-secondary text-end">
        <a href="#modalEditTask" data-bs-toggle="modal" data-bs-target="#modalEditTask<?= $task['id'] ?>"><i class="bi bi-pen me-2"></i></a>
        <i class="bi bi-trash"></i>
    </div>
</div>