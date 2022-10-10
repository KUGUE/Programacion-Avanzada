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
                                    <button type="button"  class="btn col btn-warning" data-bs-toggle="modal" data-bs-target="#updateProduct" onclick="llenarDatos(<?php echo $lista->id ?>);">Editar</button>

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
                    <input type="hidden" name="super_token" value="<?=$_SESSION['super_token'] ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal: "EDITAR" -->
    <div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProduct" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Articulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../app/ProductosController.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        <span class="input-group-text" id="addon-wrapping">Nombre</span>
                        <input type="text" id="name"  name="name" class="form-control" placeholder="">
                        <span class="input-group-text" id="addon-wrapping">Slug</span>
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" aria-label="Username" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="addon-wrapping">Descripcion</span>
                        <input type="text" id="description" name="description" class="form-control" placeholder="">
                        <span class="input-group-text" id="addon-wrapping">Caracteristicas</span>
                        <input type="text" id="features" name="features" class="form-control" placeholder="">
                        <span class="input-group-text" id="addon-wrapping">Brand</span>
                        <select class="form-select" aria-label="Default select example" id="brand_id" name="brand_id">
                            <option selected>Selecciona la marca</option>
                            <?php foreach($brands as $brand): ?>
                                <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                            <?php endforeach; ?>
                          </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="hidden" name="action" value="upload">
                    <input type="hidden" name="super_token" value="<?=$_SESSION['super_token'] ?>">
                    <input type="text" name="id" id="id" value="0">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php include "../layouts/scripts.template.php" ?>
    <!-- FUNCION: "ELIMINAR" -->
    <!-- FUNCION: "EDITAR" -->
    <script>
        function remove (id) {
        swal({
        title: "Estas seguro??",
        text: "Una vez eliminado no podras recuperar el archivo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        
        })
        .then((willDelete) => {
         
        if (willDelete) {
            swal("Producto Eliminado Con exito", {
            icon: "success",
            });
            var bodyFormData = new FormData();
            bodyFormData.append('id', id);
            bodyFormData.append('action', 'delete');
            bodyFormData.append('super_token', '<?=$_SESSION['super_token'] ?>');
            axios.post('../app/ProductosController.php', bodyFormData)
            .then(function (response) {
                console.log(response);
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        } else {
            swal("Cancelado con exito");
        }
        });
    }
function llenarDatos(id) {
    data = id
    console.log(data);
    document.getElementById('name').value = data[0];
    document.getElementById('slug').value = data[2];
    document.getElementById('description').value = data[3];
    document.getElementById('features').value = data[4];
    document.getElementById('brand_id').value = data[5];
    document.getElementById('id').value = data[6];
};
    </script>
</body>
</html>