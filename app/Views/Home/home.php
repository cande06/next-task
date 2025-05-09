<!-- Contenido: Home -->
<?= view('Home/modal_newTask.php') ?>

<div class="col vw-100 overflow-hidden">

    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <h3>Hoy DD/MM/AA</h3>
            <h5>En proceso</h5>

            <div class="row tasks">
                <div class="col-10">
                    <?php foreach ($tasks['created'] as $task) {
                        $tarea = ['task' => $task];
                        echo view('Home/task_card.php', $tarea);
                        echo view('Home/task_offcanvas.php', $tarea);
                    } ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- <input type="hidden" id="token" value="<?= csrf_token() ?>">
<input type="hidden" id="hash" value="<?= csrf_hash() ?>"> -->

<!-- End of body -->
</div>