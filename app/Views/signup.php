<!-- Content -->
<nav class="navbar navbar-fixed-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
        </a>
    </div>
</nav>

<div class="row vh-100">

    <div class="col-lg-7 col-md d-flex flex-column align-items-center justify-content-center">
        <a class="navbar-brand" href="#">
            <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
        </a>

        <?= form_open('form/signup', ['class' => 'mb-5']) ?>
        <div class="mb-3">
            <?= form_label(
                'Apodo',
                'signNickname',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'name' => 'signNickname',
                'id' => 'signNickname',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signNickname')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signNickname') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Correo',
                'signEmail',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                // 'type' => 'email',
                'name' => 'signEmail',
                'id' => 'signEmail',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signEmail')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signEmail') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Contraseña',
                'signPass',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'type' => 'password',
                'name' => 'signPass',
                'id' => 'signPass',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signPass')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signPass') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Repetir contraseña',
                'signPass2',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'type' => 'password',
                'name' => 'signPass2',
                'id' => 'signPass2',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signPass2')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signPass2') ?></div>
            <?php } ?>
        </div>

        <?= form_submit('Submit', 'Comenzar', ['class' => 'btn btn-primary']) ?>
        <?= form_close() ?>

        <div class="form-text">
                ¿Ya tienes una cuenta? <a href="<?= base_url('/login') ?>"> Iniciar sesión</a>
        </div>

    </div>

    <div class="col-5 d-none d-md-block d-flex justify-content-center h-100 align-items-center">
        <!-- <img src="<?= base_url('/assets/img/bwink.jpg') ?>" alt="" height="75%" width="75%"> -->
    </div>

</div>