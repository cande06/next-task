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
                <!-- <span class="badge text-body-secondary ms-1"><?= $subtaskStatus ?></span><br> -->

                <?php if ($subtaskPriority != 0) { ?>
                    <span class="badge text-body-secondary ms-1"><?= $subtaskPriority ?></span><br>
                <?php } ?>

                <span><?= $subtaskDate ?></span> <br>
            </div>
        </div>
    </div>


    <div class="card-footer text-body-secondary text-end py-1 px-3 border-0">
        <div class="felx">
            <div>
                <span class="badge text-body-secondary ms-1"><?= $subtaskStatus ?></span><br>
            </div>
            <div>
                <a href="#modalEditSubtask<?= $subtaskID ?>" class="link" data-bs-toggle="modal">
                    <i class="bi bi-pen me-2"></i>
                </a>
                <a href="#modalDelSubtask<?= $subtaskID ?>" class="link" data-bs-toggle="modal">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        </div>
    </div>
</div>