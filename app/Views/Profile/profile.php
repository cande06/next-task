<!-- Contenido: Perfil -->
<div class="col p-0 vw-100">

    <div class="row mx-2 mt-3 mb-5 text-start">
        <span>
            <a href="<?= url_to('Views::index') ?>"><i class="bi bi-house-door-fill"></i></a>
        </span>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <div class="row">
                <div class="col-10">

                    <div class="card lightcolor" style="width: 35rem;">
                        <div class="card-body">
                            <p class="display-5"><?= $userNick ?> 
                            <small class="ms-2 text-body-secondary">#<?= $idUser ?></small>
                        </p>
                            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $userEmail ?></h6>

                            <?= form_open('/form/editProfile') ?>

                            <div class="col-8">
                                <div class="row mb-3">
                                    <?= form_label(
                                        'Nick',
                                        'userNickEdit',
                                        array('class' => 'form-label mb-1')
                                    ); ?>
                                    <?= form_input(array(
                                        'name' => 'taskTitleEdit',
                                        'value' => $userNick,
                                        'class' => 'form-control ms-2',
                                    )); ?>
                                    <?php if (session('errors.userNickEdit')) {   ?>
                                        <div><small class="text-danger"><?= session('errors.userNickEdit') ?></small></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row mb-3">
                                    <?= form_label(
                                        'Contraseña actual',
                                        'userPassEdit',
                                        array('class' => 'form-label mb-1')
                                    ); ?>
                                    <?= form_input(array(
                                        'name' => 'taskTitleEdit',
                                        'class' => 'form-control ms-2',
                                    )); ?>
                                    <?php if (session('errors.userPassEdit')) {   ?>
                                        <div><small class="text-danger"><?= session('errors.userPassEdit') ?></small></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row mb-3">
                                    <?= form_label(
                                        'Nueva contraseña',
                                        'userNewPassEdit',
                                        array('class' => 'form-label mb-1')
                                    ); ?>
                                    <?= form_input(array(
                                        'name' => 'taskTitleEdit',
                                        'class' => 'form-control ms-2',
                                    )); ?>
                                    <?php if (session('errors.userNewPassEdit')) {   ?>
                                        <div><small class="text-danger"><?= session('errors.userNewPassEdit') ?></small></div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="text-end">
                                <?= form_submit('Submit', 'Actualizar', ['class' => 'btn btn-next']) ?>
                            </div>
                            <?= form_close() ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- End of body -->
</div>