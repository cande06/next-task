<div class="card mb-3" style="background-color: transparent;">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <span class="text-decoration-underline link-offset-2"><?= $sub['subtaskTitle'] ?></span><br>

                <span class="small">
                    <i class="bi bi-person-fill"></i>
                    <?= $sub['subtaskResp'] ?>
                </span> <br>

                <span class="small">
                    <i class="bi bi-info-circle"></i>
                    <?= $sub['subtaskDesc'] ?>
                </span> <br>

                <?php if ($sub['subtaskComment'] != '') { ?>
                    <span class="ps-1 small text-body-secondary">
                        <!-- <i class="bi bi-chat-left-text-fill"></i> -->
                        <?= $sub['subtaskComment'] ?>
                    </span><br>
                <?php } ?>

                <span class="small mt-2">
                    <i class="bi bi-calendar2-x-fill"></i>
                    <?= $sub['subtaskDate'] ?>
                </span> <br>
            </div>

            <div>
                <?php if ($sub['subtaskPriority'] != 0) { ?>
                    <span class="badge bdg text-body-secondary ms-1"><?= $sub['subtaskPriority'] ?></span><br>
                <?php } ?>
            </div>
        </div>
    </div>


    <div class="card-footer text-body-secondary text-end py-1 px-3 border-0">
        <div class="d-flex justify-content-between">
            <div>
                <a href="#modalStatusSubtask<?= $sub['subtaskID']  ?>" class="text-decoration-none" data-bs-toggle="modal">
                    <span class="badge text-body-secondary"><?= $sub['subtaskStatus'] ?></span><br>
                </a>

            </div>

            <div>
                <?php if ($sub['isSubOwner']) { ?>
                    <a href="#modalEditSubtask<?= $sub['subtaskID'] ?>" class="link" data-bs-toggle="modal">
                        <i class="bi bi-pen me-2"></i>
                    </a>
                <?php } ?>

                <?php if ($isTaskOwner) { ?>
                    <a href="#modalDelSubtask<?= $sub['subtaskID'] ?>" class="link" data-bs-toggle="modal">
                        <i class="bi bi-trash"></i>
                    </a>
                <?php } ?>

            </div>
        </div>
    </div>
</div>