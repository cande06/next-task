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

            <?=form_open('/', ['class' => 'mb-5'])?> 
                <div class="mb-3"> 
                    <?= form_label('Correo', 'loginEmail', 
                                    array('class' => 'form-label'));?>
                    <?= form_input(array(
                                        // 'type' => 'email',
                                        'name' => 'loginEmail',
                                        'id' => 'loginEmail',
                                        'class' => 'form-control',));?>
                </div>
                <div class="mb-3">
                    <?= form_label('Contraseña', 'loginPass', 
                                    array('class' => 'form-label'));?>
                    <?= form_input(array('type' => 'password',
                                        'name' => 'loginPass',
                                        'id' => 'loginPass',
                                        'class' => 'form-control',));?>
                    <div id="passHelp" class="form-link"><a href="#">¿Olvidaste tu contraseña?</a></div>
                </div>
                <?=form_submit('Submit', $opt, ['class' => 'btn btn-primary'])?>
            <?=form_close()?> 

            <div class="form-text">
            <?php if ($flag == 0){
                $s = ' Iniciar sesion'; ?>
                ¿Ya tienes una cuenta? <a href="<?=base_url('/login')?>"><?=$s?></a>
            <?php }else if ($flag == 1){
                $s = ' Registrarse'; ?>
                ¿No tienes una cuenta? <a href="<?=base_url('/signup')?>"><?=$s?></a>
            <?php }?>
            </div>
            

    </div>

    <div class="col-5 d-none d-md-block d-flex justify-content-center h-100 align-items-center">
        <!-- <img src="<?=base_url('/assets/img/bwink.jpg')?>" alt="" height="75%" width="75%"> -->
    </div>

</div>