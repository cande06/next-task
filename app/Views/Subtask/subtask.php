<div class="card mb-3" style="background-color: transparent;">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <span class="text-decoration-underline link-offset-2"><?= $subtaskTitle ?></span><br>

                <span class="small">
                    <i class="bi bi-person"></i>
                    <?= $subtaskResp ?>
                </span> <br>

                <span class="small"><?= $subtaskDesc ?></span> <br>

                <?php if ($subtaskComment != '') { ?>
                    <span class="ps-1 small text-body-secondary"><?= $subtaskComment ?></span>
                <?php } ?>
            </div>

            <div>
                <span><?= $subtaskDate ?></span> <br>

                <?php if ($subtaskPriority != 0) { ?>
                    <span class="badge text-body-secondary ms-1"><?= $subtaskPriority ?></span><br>
                <?php } ?>
            </div>
        </div>
    </div>


    <div class="card-footer text-body-secondary text-end py-1 px-3 border-0">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#modalStatusSubtask<?= $subtaskID  ?>" class="text-decoration-none" data-bs-toggle="modal">
                    <span class="badge text-body-secondary"><?= $subtaskStatus ?></span><br>
                </a>

            </div>

            <div>
                <?php if ($isSubOwner) { ?>
                    <a href="#modalEditSubtask<?= $subtaskID ?>" class="link" data-bs-toggle="modal">
                        <i class="bi bi-pen me-2"></i>
                    </a>
                <?php } ?>

                <?php if ($isSubOwner) { ?>
                    <a href="#modalDelSubtask<?= $subtaskID ?>" class="link" data-bs-toggle="modal">
                        <i class="bi bi-trash"></i>
                    </a>
                <?php } ?>

            </div>
        </div>
    </div>
</div>