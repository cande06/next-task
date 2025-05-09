<div class="mb-3">
<div class="card task <?= $task['taskColorID'] ?>">
    <input type="hidden" name="taskID" value="<?= $task['id']?>">
    <div class="card-body p-0">

        <div class="row align-items-center">
            <div class="col-11">
                <div class="card-body p-3 pb-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTask<?= $task['id']?>" >
                    <span class="card-title fs-5 fw-semibold"><?= $task['taskTitle'] ?></span> <br>
                    <!-- <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <span class="card-text"><small class="text-body-secondary">0/2</small></span>
                </div>
            </div>
            <div class="col-1 ps-0">
                <input type="checkbox" class="btn-check" id="btn-check-<?= $task['id']?>" autocomplete="off">
                <label class="btn" for="btn-check-<?= $task['id']?>"><i class="bi bi-circle"></i></label>
            </div>
        </div>
    </div>

    <div class="card-footer text-body-secondary text-end">
        <i class="bi bi-pen me-2"></i>
        <i class="bi bi-trash"></i>
    </div>
</div>