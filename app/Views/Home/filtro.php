<div class="d-flex d-inline-flex ps-0">
    <button class="btn disabled border-0 btn-next me-2 mt-auto" height="38"><i class="bi bi-filter"></i></button>

    <?= form_open('/form/filter/p', ['id' => 'filtroPriority']) ?>
    <label for="prioridad" class="form-label"></label>
    <select class="form-select" id="prioridad" name="prioridad">
        <option value="" selected disabled>Prioridad</option>
        <option value= 1>Alta</option>
        <option value= 0>Normal</option>
        <option value= -1>Baja</option>
    </select>
    <?= form_close() ?>

    <!-- <?= form_open('/form/filter/') ?>
    <label for="criterio" class="form-label"></label>
    <select class="form-select" id="criterio" name="criterio">
        <option value="" selected disabled>Vencimiento</option>
        <option value="">Más cercano</option>
        <option value="prioridad">Más lejano</option>
    </select>
    <?= form_close() ?> -->


    <!-- 
    <form id="filtroForm" method="get" action="<?= site_url('tareas/filtrar') ?>" class="row g-3">
        <div class="col-md-6">
            <label for="criterio" class="form-label">Ordenar por</label>
            <select class="form-select" id="criterio" name="criterio">
                <option value="" selected disabled>Seleccione</option>
                <option value="prioridad">Prioridad</option>
                <option value="fecha">Fecha de vencimiento</option>
            </select>
        </div>
-->
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const select = document.getElementById("prioridad");
    // const opt = document.getElementById("prioridadSelect");
    const form = document.getElementById("filtroPriority");

    select.addEventListener("change", function() {
    //   if (this.value === "prioridad") {
    //     prioridadSelect.style.display = "block";
    //   } else if (this.value === "fecha") {
    //     prioridadSelect.style.display = "none";
        form.submit(); // Envía el formulario inmediatamente
    //   }
    });
  });
</script>
