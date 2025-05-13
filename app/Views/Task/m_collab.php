<!-- Modal -->
<div class="modal fade" id="modalCollabFor<?= $taskID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="taskCollabLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="taskCollabLabel">Invitar colaborador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <?= form_open('/form/') ?>

                        <div class="row mb-3">
                            <?= form_label(
                                'Correo',
                                'collabMail',
                                array('class' => 'form-label ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'collabMail',
                                'placeholder' => 'ejemplo@correo.com',
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.collabMail')) {   ?>
                                <div><small class="text-danger"><?= session('errors.collabMail') ?></small></div>
                            <?php } ?>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(
                                'collabOpt',
                                'm',
                                true,
                                array('id' => 'collabOptM', 'class' => 'form-check-input',)
                            ); ?>
                            <?= form_label(
                                'Leer y modificar',
                                'collabOpt',
                                array('class' => 'form-check-label')
                            ); ?>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(
                                'collabOpt',
                                'r',
                                '',
                                array('id' => 'collabOptR', 'class' => 'form-check-input',)
                            ); ?>
                            <?= form_label(
                                'Sólo lectura',
                                'collabOpt',
                                array('class' => 'form-check-label')
                            ); ?>
                        </div>

                        <?php if (session('errors.collabOpt')) {   ?>
                            <div><small class="text-danger"><?= session('errors.collabOpt') ?></small></div>
                        <?php } ?>

                        <div id="collabHelp" class="form-text mt-2">Revisa que todo esté bien</div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <?= form_submit('Submit', 'Invitar', ['class' => 'btn btn-next']) ?>
                    <?= form_close() ?>
                </div>

            </div>

        </div>
    </div>
</div>