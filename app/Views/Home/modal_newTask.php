<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" id="modalContenido">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Crear tarea</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <?= form_open() ?>
                                    <?= form_label(
                                        'Titulo',
                                        'taskTitle',
                                        array('class' => 'form-label')
                                    ); ?>
                                    <?= form_input(array(
                                        'name' => 'taskTitle',
                                        'placeholder' => 'Iniciar proyecto de Técnicas',
                                        'class' => 'form-control',
                                    )); ?>
                                    <!-- ERROR -->
                                    <?= form_label(
                                        'Descripción',
                                        'taskDesc',
                                        array('class' => 'form-label')
                                    ); ?>
                                    <?= form_textarea(array(
                                        'name' => 'taskDesc',
                                        'placeholder' => 'Aquí puedes incluir una descripción de tu tarea',
                                        'class' => 'form-control',
                                        'rows' => '3',
                                    )); ?>
                                    <!-- ERROR -->
                                    <div class="row mb-3">
                                        <div class="col-2 ">
                                            <label for="priority-opt" class="form-label">Prioridad</label>
                                        </div>
                                        <div class="col ps-2">
                                            <input type="radio" class="btn-check" name="priority-opt" id="-1" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="-1">Baja</label>

                                            <input type="radio" class="btn-check" name="priority-opt" id="0" autocomplete="off" checked>
                                            <label class="btn btn-outline-secondary" for="0">Normal</label>

                                            <input type="radio" class="btn-check" name="priority-opt" id="1" autocomplete="off">
                                            <label class="btn btn-outline-secondary" for="1">Alta</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-2 ">
                                            <?= form_label(
                                                'Asignar tarea',
                                                'taskCollab',
                                                array('class' => 'form-label')
                                            ); ?>
                                        </div>
                                        <div class="col ps-2">
                                            <?= form_input(array(
                                                'name' => 'taskCollab',
                                                'placeholder' => 'ejemplo@correo.com',
                                                'class' => 'form-control',
                                                'aria-label' => 'Asignar tarea',
                                                'aria-describedby' => 'taskCollab',
                                            )); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input class="btn-check" type="radio" name="color" id="none" value="#ffffff" autocomplete="off" checked>
                                            <label class="btn noColor" for="none"></label>

                                            <input class="btn-check" type="radio" name="color" id="frut" value="#E5ADAE" autocomplete="off">
                                            <label class="btn" for="frut" style="background-color: #E5ADAE;"></label>
                                        
                                            <input class="btn-check" type="radio" name="color" id="kiwi" value="#BFD5A9" autocomplete="off">
                                            <label class="btn" for="kiwi" style="background-color: #BFD5A9;"></label>
                                        
                                            <input class="btn-check" type="radio" name="color" id="mand" value="#EABFA0" autocomplete="off">
                                            <label class="btn" for="mand" style="background-color: #EABFA0;"></label>

                                            <input class="btn-check" type="radio" name="color" id="uva" value="#D0AFCD" autocomplete="off">
                                            <label class="btn" for="uva" style="background-color: #D0AFCD;"></label>

                                            <input class="btn-check" type="radio" name="color" id="coco" value="#D8C9B4" autocomplete="off">
                                            <label class="btn" for="coco" style="background-color: #D8C9B4;"></label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-2 ">
                                            <label for="priority-opt" class="form-label">Recordatorio</label>
                                        </div>
                                        <div class="col ps-2">
                                            datepicker (?)
                                        </div>
                                    </div>

                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-outline-secondary">Crear</button>
                        </div>
                    </div>
                </div>
            </div>