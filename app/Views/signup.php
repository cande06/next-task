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

        <?= form_open('form/signup', ['class' => 'mb-4']) ?>
        <div class="mb-3">
            <?= form_label(
                'Apodo',
                'signupNickname',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'name' => 'signupNickname',
                'id' => 'signupNickname',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signupNickname')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signupNickname') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Correo',
                'signupEmail',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                // 'type' => 'email',
                'name' => 'signupEmail',
                'id' => 'signupEmail',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signupEmail')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signupEmail') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Contraseña',
                'signupPass',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'type' => 'password',
                'name' => 'signupPass',
                'id' => 'signupPass',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signupPass')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signupPass') ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <?= form_label(
                'Repetir contraseña',
                'signupPass2',
                array('class' => 'form-label')
            ); ?>
            <?= form_input(array(
                'type' => 'password',
                'name' => 'signupPass2',
                'id' => 'signupPass2',
                'class' => 'form-control',
            )); ?>
            <?php if (session('errors.signupPass2')) {   ?>
                <div style="height: 20px; color: red; font-size: small;"><?= session('errors.signupPass2') ?></div>
            <?php } ?>
        </div>
        <?= form_submit('Submit', 'Comenzar', ['class' => 'btn btn-next']) ?>
        <?= form_close() ?>

        <div class="form-text">
            ¿Ya tienes una cuenta? <a href="<?= url_to('Views::getLogin') ?>"> Iniciar sesión</a>
        </div>

    </div>

    <div class="col-5 d-none d-md-block d-flex justify-content-center">
        <div class="d-flex h-100 align-items-center pe-3">
            <img src="<?= base_url('/assets/img/1.jpg') ?>" alt="" width="400rem">
        </div>
    </div>

</div>