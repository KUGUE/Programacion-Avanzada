<?php
include '../app/ProductosController.php';
$producto = new ProductosController;
$productos = $producto->listaProductos();
?>
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
                    <?php foreach ($productos as $lista) : ?>
                        <div class="col-md-3 p-2">
                            <div class="card mb-1" style="width: 18rem;">
                                <img src="<?php echo $lista->cover ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $lista->name ?></h5>
                                    <p class="card-text"><?php echo $lista->description ?></p>
                                    <div class="row">
                                        <a class="btn btn-warning col-6">Editar</a>
                                        <a class="btn btn-danger col-6">Eliminar</a>
                                        <a href="detalles.php" class="btn btn-info col-12">Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!--FUNCION AÑADIR-->
    <div class="modal fade" id="añadirModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirModalLabel"> ->Nuevo Producto<- </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="../app/ProductosController.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="name" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="slug" class="form-control" placeholder="slug" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="description" class="form-control" placeholder="description" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="features" class="form-control" placeholder="features" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="brand_id" class="form-control" placeholder="brand id" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <input type="hidden" name="action" value="create">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "../layouts/scripts.template.php" ?>


</body>

</html>