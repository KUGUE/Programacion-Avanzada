<?php
include '../app/ProductosController.php';
include '../app/BrandController.php';
$producto = new ProductosController;
$productos = $producto->listaProductos();
$brands = new BrandController;
$brands = $brands->getBrands();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- HEAD -->
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
                                    <h6 class="card-title text-center"><?php echo ($lista->brand == null ? "No selecciono categoria" : $lista->brand->name) ?></h6>
                                    <p class="card-text"><?php echo $lista->description ?></p>
                                    <div class="row">
                                        <a class="btn btn-warning col-6">Editar</a>
                                        <a class="btn btn-danger  col-6"onclick="remove(<?php echo $lista->id ?>)">Eliminar</a>
                                        <a href="detalles.php?slug=<?php echo $lista->slug ?>" class="btn btn-info col-12">Detalles</a>
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
                        <input type="file" name="img_producto">
                        <input type="text" name="name" class="form-control" placeholder="name" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="slug" class="form-control" placeholder="slug" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="description" class="form-control" placeholder="description" aria-label="Username" aria-describedby="basic-addon1">
                        <input type="text" name="features" class="form-control" placeholder="features" aria-label="Username" aria-describedby="basic-addon1">
                        <select name="brand_id" class="form-control">
                                <?php foreach ($brands as $brand) 
                                { ?>
                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                <?php 
                            }?>
                            </select>
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
    <!-- Modal: "ELIMINAR" -->
    <script>
        function remove (id) {
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });
            var bodyFormData = new FormData();
            bodyFormData.append('id', id);
            bodyFormData.append('action', 'delete');
            axios.post('../app/ProductosController.php', bodyFormData)
            .then(function (response) {
                console.log(response);
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });
    }
    </script>
</body>
</html>