<!-- Content -->
<nav class="navbar navbar-fixed-top navColor">
    <div class="container-fluid">
        <a class="navbar-brand ms-3" href="<?= base_url() ?>">
            <img src="<?= base_url('/assets/img/sublogo-black.png') ?>" alt="Bootstrap" width="38" height="26">
        </a>
    </div>
</nav>

<div class="row vh-100">

    <div class="col-lg-7 col-md d-flex flex-column align-items-center justify-content-center">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('/assets/img/logo.png') ?>" alt="Bootstrap" width="180" height="62">
        </a>

        <?= form_open('form/login', ['class' => 'mb-5']) ?>
        <div class="mb-3">
            <?= form_label(
                'Correo',
                'loginEmail',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                // 'type' => 'email',
                'name' => 'loginEmail',
                'id' => 'loginEmail',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.loginEmail')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.loginEmail') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Contraseña',
                'loginPass',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'type' => 'password',
                'name' => 'loginPass',
                // 'id' => 'loginPass',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.loginPass')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.loginPass') ?></div>
            <?php } ?>

            <div id="passHelp" class="form-text"><a href="#">¿Olvidaste tu contraseña?</a></div>
        </div>

        <?= form_submit('Submit', 'Iniciar sesión', ['class' => 'btn btn-next']) ?>
        <?= form_close() ?>

        <div class="form-text">
                ¿No tienes una cuenta? <a href="<?= url_to('Views::getSignup') ?>"> Registrarse</a>
        </div>


    </div>

    <div class="col-5 d-none d-md-block d-flex justify-content-center">
        <div class="d-flex h-100 align-items-center pe-3">
            <img src="<?= base_url('/assets/img/2.jpg') ?>" alt="" width="400rem">
        </div>
    </div>

</div>