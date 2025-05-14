<!-- Contenido: Home -->
<div class="col vw-100">

    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <p class="fs-4 fw-thin">Hoy
                <!-- <span class="fs-5 fw-thin text-body-secondary"></span> -->
            </p>

            <div class="row tasks">
                <div id="created" class="col-10">
                    <?php foreach ($tasks as $task) {
                        if ($task['taskArchived'] != 1) {
                            $userID = session()->get('idUser');
                            $isTaskAuthor = ($task['taskUserID'] === $userID) ? true : false;
                    ?>

                            <?= view('Home/task_home.php', $task); ?>
                            <?= view('Home/modal_newTask.php') ?>
                            <?= view('Home/modal_editTask.php', $task); ?>
                            <?= view('Home/modal_deleteTask.php', $task); ?>
                            <?= view('Home/modal_changeStatus.php', $task); ?>

                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- End of body -->
</div>