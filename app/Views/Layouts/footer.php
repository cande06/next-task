<?= view('Home/modal_newTask.php') ?>

<?php if (session()->has('errors')) : ?>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var modalElement = document.getElementById('<?=  session('modalTarget')  ?>');
            var modal = new bootstrap.Modal(modalElement);
            modal.show();
        });
    </script>
<?php endif; ?>

<!-- JS -->
<script src="<?= base_url('/assets/script.js') ?>"></script>

<!-- <script src="https://kit.fontawesome.com/0ce357c188.js" crossorigin="anonymous"></script> -->
<!-- BOOTSTRAP script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>

</html>