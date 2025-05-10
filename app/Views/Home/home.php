<!-- Contenido: Home -->
<div class="col vw-100 overflow-hidden">
    <?= view('Home/modal_newTask.php') ?>

    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <h5>Hoy DD/MM/AA</h5>

            <div class="mb-4">
                <h4>En proceso</h4>
                <div class="row tasks">
                    <div id="in_progress" class="col-10">
                        
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h4>Creadas</h4>
                <div class="row tasks">
                    <div id="created" class="col-10">
                        <?php foreach ($tasks['created'] as $task) {
                            $tarea = ['task' => $task]; ?>
                            <a class="text-decoration-none" href="<?= base_url('/tarea/'. $task['id']) ?>">
                                <?= view('Home/task_card.php', $tarea); ?>
                            </a>
                            <?= view('Home/modal_newTask.php') ?>
                            <?= view('Home/modal_editTask.php', $task); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h4>Finalizadas</h4>
                <div class="row tasks">
                    <div id="finished" class="col-10">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- End of body -->
</div>