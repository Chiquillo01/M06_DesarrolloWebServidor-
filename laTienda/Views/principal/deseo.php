<?php include_once 'Views/template-principal/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <div claas="row">
        <div claas="col-md-12">
            <div claas="card">
                <div claas="card-body">
                    <table class="table table-bordered" id="tableListaDeseo">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?php include_once 'Views/template-principal/footer.php'; ?>

<!-- añadir en views/principal/deseo.php despues del footer -->
<script src="<?php echo BASE_URL . 'assets/js/modulos/listaDeseo.js'; ?>"></script>
<!-- End Script -->

</body>

</html>