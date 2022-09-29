<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layouts/head.template.php" ?>
</head>
<body>
    <!-- NAVBAR -->
    <?php include "../layouts/nav.template.php" ?>
    <!-- CONTAINER -->
    <div class="container-fluid">
       <div class="row">
           <!-- SIDEBAR -->
           <?php include "../layouts/sidebar.template.php" ?>
           <!-- CONTENT -->
           <div class="col-lg-10 col-sm-12 bg-white">
            <!-- BREAD -->
            <div class="border-bottom">
                <div class="row m-2">
                    <div class="col">
                        <h4>Productos</h4>
                    </div>
                    <div class="col">
                        <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#añadirModal">Añadir producto</button>
                    </div>
                </div>
            </div>
            <!-- CARD -->
            <div class="row">
                <?php for ($i=0; $i < 12; $i++) {?> 
                <div class="col-md-3 p-2">
                    <div class="card mb-1" style="width: 18rem;">
                        <img src="../img/producto.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Producto nuevo</h5>
                            <h6 class="card-subtitle text-center">Nombre del producto</h6>
                            <p class="card-text">Contenido del producto</p>
                            <div class="row">
                                <a class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</a>
                                <a href="#" class="btn btn-danger col-6" onclick="remove(this)">Eliminar</a>
                                <a href="detalles.php" class="btn btn-info col-12">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?> 
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/scripts.template.php" ?>

</body>
</html>