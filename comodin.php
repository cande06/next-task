<div class="form-check">
    <?= form_label(
        'Creada',
        'taskStatusC',
        array('class' => 'form-label')
    ); ?>
    <?= form_radio(
        'taskStatusOpt',
        0,
        '',
        [
            'id' => 'taskStatusC',
            'class' => 'form-check-input'
        ]
    ); ?>
</div>
<div class="form-check">
    <?= form_label(
        'En proceso',
        'taskStatusP',
        array('class' => 'form-label')
    ); ?>
    <?= form_radio(
        'taskStatusOpt',
        1,
        '',
        array('id' => 'taskStatusP', 'class' => 'form-check-input')
    ); ?>
</div>
<div class="form-check">
    <?= form_label(
        'Completada',
        'taskStatusF',
        array('class' => 'form-label')
    ); ?>
    <?= form_radio(
        'taskStatusOpt',
        -1,
        '',
        array('id' => 'taskStatusF', 'class' => 'form-check-input')
    ); ?>
</div>