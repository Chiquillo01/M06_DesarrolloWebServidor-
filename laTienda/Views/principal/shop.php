<?php include_once 'Views/template-principal/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <?php foreach ($data['productos'] as $producto) { ?>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo  BASE_URL . $producto['imagen']; ?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                                    <!-- Botones dentro de la imagen -->
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white btnAddDeseo" href="#" prod="<?php echo $producto['id']; ?>"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="<?php echo  BASE_URL . 'pincipal/detail/' . $producto['id']; ?>"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2 btnAddCarro" href="#" prod="<?php echo $producto['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $producto['nombre']; ?></a>

                                <p class="text-center mb-0"><?php echo $producto['precio'] . ' ' . MONEDA; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <?php
                        $anterior = $data['pagina'] - 1;
                        $siguiente = $data['pagina'] + 1;
                        $url = BASE_URL . 'principal/shop/';

                        if ($data['pagina'] > 1) {
                            echo '<li class="page-item"> 
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="' . $url . $anterior . '">Anterior</a>
                        </li>';
                        }

                        if ($data['total'] >= $siguiente) {
                            echo '<li class="page-item">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-white" href="' . $url . $siguiente . '">Siguiente</a>
                        </li>';
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

<?php include_once 'Views/template-principal/footer.php'; ?>
<!-- End Script -->

</body>

</html>