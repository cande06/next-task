<!-- Navbar Menu -->
<nav class="navbar navbar-inverse navbar-fixed-top navColor">
    <div class="container-fluid">

        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <a class="navbar-brand" href="#"> -->
        <img src="<?= base_url('/assets/img/placeholder.png') ?>" height="35">
        <!-- </a> -->

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
</nav>

<!-- Body -->
<div class="row vw-100 overflow-hidden">
    <!-- Sidebar Menu -->
    <div class="col-lg-2 col-md-3 min-vh-100 h-auto p-0 d-none d-md-block">
        <div class="d-flex flex-column h-100 p-3 menuColor"> <!-- style="width: 280px;" -->
            <!-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">Titulou</span>
        </a> 
        <hr> -->

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center justify-content-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="45" height="45" class="rounded-circle me-2">
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
            </div>
            <br>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Crear tarea
            </button>
            <hr>
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


                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-secondary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#people-circle" />
                        </svg>
                        Customers
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