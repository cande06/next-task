<!-- Contenido: Home -->
<div class="col vw-100">

    <div class="row justify-content-center mt-4">
        <div class="col-7">
            <div class="d-flex justify-content-between mb-2">
                <p class="fs-4 fw-thin">Tareas</p>

                <!-- filtro -->
                <button class="btn"><i class="bi bi-filter"></i></button>
            </div>
        </div>

        <div class="col-9">
            <div class="row justify-content-center">
                <div id="created" class="col-10">
                    <?php foreach ($tasks as $task) { ?>

                            <?= view('Home/task_home.php', $task); ?>
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

<!-- End of body -->
</div>