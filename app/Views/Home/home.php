<!-- Contenido: Home -->
<div class="col vw-100 overflow-hidden">
    <?= view('Home/modal_newTask.php') ?>

    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <h4><?= $date ?></h4>

                <div class="row tasks">
                    <div id="created" class="col-10">
                        <?php foreach ($tasks as $task) {?>
                            <!-- <a class="text-decoration-none" href="<?= base_url('/tarea/' . $task['taskID']) ?>"> -->
                                <?= view('Home/task_card.php', $task); ?>
                            <!-- </a> -->
                            <?= view('Home/modal_newTask.php') ?>
                            <?= view('Home/modal_editTask.php', $task); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- End of body -->
</div>