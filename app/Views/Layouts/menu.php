<!-- Navbar Menu -->
<nav class="navbar navbar-inverse navbar-fixed-top d-md-none navColor">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="/">
                    <img src="<?= base_url('/assets/img/logo.png') ?>" height="50">
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <button type="button" class="btn btn-next" data-bs-toggle="modal" data-bs-target="#modalNewTask">
                    Crear tarea
                </button>

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link link-dark" aria-current="page">
                            <i class="bi bi-house-door-fill pe-1"></i>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('perfil/id' . session('idUser')) ?>" class="nav-link link-dark">
                            <i class="bi bi-person-fill pe-1"></i>
                            Perfil
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
                    <li>
                        <a href="<?= url_to('Actions::logout') ?>" class="nav-link link-dark">
                            <i class="bi bi-door-closed-fill pe-1"></i>
                            Cerrar sesión
                        </a>
                    </li>
                </ul>

            </div>
        </div>
</nav>

<!-- Body -->
<div class="row vw-100 overflow-hidden">
    <!-- Sidebar Menu -->
    <div class="col-lg-3 col-md-3 min-vh-100 h-auto p-0 d-none d-md-block">
        <div class="d-flex flex-column h-100 p-3 menuColor"> <!--menuColor style="width: 280px;" -->

            <div class="d-flex justify-content-center mb-4">

                <div id="logoh">
                    <a href="<?= base_url() ?>" class="ps-2 mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="next task logo" height="45">
                    </a>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-next" data-bs-toggle="modal" data-bs-target="#modalNewTask">
                Crear tarea
            </button>

            <ul class="nav nav-pills flex-column mt-3">
                <li class="nav-item">
                    <a href="<?= base_url('') ?>" class="nav-link link-dark" aria-current="page">
                        <i class="bi bi-house-door-fill pe-1"></i>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('perfil/id' . session('idUser')) ?>" class="nav-link link-dark">
                        <i class="bi bi-person-fill pe-1"></i>
                        Perfil
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
                <hr class="my-1">
                <li>
                    <a href="<?= url_to('Actions::logout') ?>" class="nav-link link-dark">
                        <i class="bi bi-door-closed-fill pe-1"></i>
                        Cerrar sesión
                    </a>
                </li>

            </ul>

        </div>
    </div>