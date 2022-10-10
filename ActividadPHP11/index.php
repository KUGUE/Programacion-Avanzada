<?php
    include_once "app/Config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <section>
            <div class="row justify-content-md-center align-items-center">
                <div class="col-md-6 col-lg-6 col-sm-12 login border">
                    <h1 class="text-center mt-3">Inicia Sesion</h1>
                    <form method="post" action="<?=BASE_PATH?>auth" class="form">
                        <div>
                            <label for="">Correo electrónico</label>
                            <div class="input-group mb-3">
                               
                                <input name="email" type="text" class="form-control" placeholder="Aqui ingresas tu correo" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div>
                            <label for="">Contraseña</label>
                            <div class="input-group mb-3">
                                
                                <input name="password"  type="text" class="form-control" placeholder="Aqui ingresas tu contraseña" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark col-12 mb-4">Acceder</button>
                        <input type="hidden" value="access" name="action">
                        <input type="hidden" name="super_token" value="<?=$_SESSION['super_token'] ?>">
                    </form>
                </div>
            </div>
        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>