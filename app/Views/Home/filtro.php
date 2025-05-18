<div class="d-flex d-inline-flex ps-0">
    <div class="mt-auto">
        <button class="btn disabled border-0 btn-next me-2" height="38"><i class="bi bi-filter"></i></button>
        <a class="btn btn-next me-2" href="<?= base_url() ?>"> <i class="bi bi-x-lg"></i> </a>
    </div>

    <div class="me-2">
        <?= form_open('/form/filter/p', ['id' => 'filtroPriority']) ?>
        <label for="prioridad" class="form-label"></label>
        <select class="form-select" id="prioridad" name="prioridad">
            <option value="" selected disabled>Prioridad</option>
            <option value=1>Alta</option>
            <option value=0>Normal</option>
            <option value=-1>Baja</option>
        </select>
        <?= form_close() ?>
    </div>

    <div>
        <?= form_open('/form/filter/d', ['id' => 'filtroDate']) ?>
        <label for="date" class="form-label"></label>
        <select class="form-select" id="date" name="date">
            <option value="" selected disabled>Vencimiento</option>
            <option value="ASC">Más cercano</option>
            <option value="DESC">Más lejano</option>
        </select>
        <?= form_close() ?>
    </div>

</div>

<script>

</script>