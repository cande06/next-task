<!-- Navbar Menu -->
<nav class="navbar navbar-inverse navbar-fixed-top d-md-none navColor">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="/">
                    <img src="<?= base_url('/assets/img/logo-black.png') ?>" height="50">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a href="<?= base_url('') ?>" class="nav-link link-dark" aria-current="page">
                            <i class="bi bi-house-door-fill pe-1"></i>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('archived/for/' . session('idUser')) ?>" class="nav-link link-dark">
                            <i class="bi bi-archive-fill pe-1"></i>
                            Archivadas
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('collabs/for/' . session('idUser')) ?>" class="nav-link link-dark">
                            <i class="bi bi-people-fill pe-1"></i>
                            Colaboraciones
                        </a>
                    </li>
                </ul>
                <div class="d-flex justify-content-start mt-2">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center justify-content-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="https://github.com/mdo.png" alt="" width="42" height="42" class="rounded-circle me-2"> -->
                            <strong><?= session('nick') ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li> -->
                            <li><a class="dropdown-item" href="<?= base_url('perfil') ?>">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= url_to('Actions::signOut') ?>">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</nav>

<!-- Body -->
<div class="row vw-100 overflow-hidden">
    <!-- Sidebar Menu -->
    <div class="col-lg-3 col-md-3 min-vh-100 h-auto p-0 d-none d-md-block">
        <div class="d-flex flex-column h-100 p-3 menuColor"> <!--menuColor style="width: 280px;" -->

            <div class="d-flex justify-content-between">
                <div>
                    <!-- <a href="/" class="ps-2 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <img src="<?= base_url('assets/img/logo-black.png') ?>" alt="next task logo" height="45">
                    </a> -->
                </div>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="https://github.com/mdo.png" alt="" width="42" height="42" class="rounded-circle me-2"> -->
                        <strong><?= session('nick') ?></strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li> -->
                        <li><a class="dropdown-item" href="<?= base_url('perfil') ?>">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= url_to('Actions::signOut') ?>">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>

            <hr>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalNewTask">
                Crear tarea
            </button>
            <hr>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="<?= base_url('') ?>" class="nav-link link-dark" aria-current="page">
                        <i class="bi bi-house-door-fill pe-1"></i>
                        Inicio
                    </a>
                </li>
                <!-- <li>
                    <a href="<?= base_url('completed') ?>" class="nav-link link-dark">
                        <i class="bi bi-check-circle-fill pe-1"></i>
                        Completadas
                    </a>
                </li> -->
                <li>
                    <a href="<?= base_url('archived/for/' . session('idUser')) ?>" class="nav-link link-dark">
                        <i class="bi bi-archive-fill pe-1"></i>
                        Archivadas
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('collabs/for/' . session('idUser')) ?>" class="nav-link link-dark">
                        <i class="bi bi-people-fill pe-1"></i>
                        Colaboraciones
                    </a>
                </li>
            </ul>

            <!-- <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div> -->
        </div>
    </div>