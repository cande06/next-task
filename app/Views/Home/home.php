<!-- Contenido: Home -->
<div class="col vw-100 overflow-hidden">
    <?= view('Home/modal_newTask.php') ?>

    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <h4><?= $date ?></h4>

            <div class="row tasks">
                <div id="created" class="col-10">
                    <?php foreach ($tasks as $task) { ?>
                        <?= view('Home/task_card.php', $task); ?>
                        <?= view('Home/modal_newTask.php') ?>
                        <?= view('Home/modal_editTask.php', $task); ?>
                        <?= view('Home/modal_deleteTask.php', $task); ?>
                        <?= view('Home/modal_changeStatus.php', $task); ?>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- End of body -->
</div>