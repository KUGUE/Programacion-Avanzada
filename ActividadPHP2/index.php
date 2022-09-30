<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--script src="https://cdn.tailwindcss.com"></script-->
    <!--link rel="stylesheet" href="public/css/main.css"-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <section>
            <div class="row justify-content-md-center align-items-center">
                <div class="col-md-6 col-lg-6 col-sm-12 login border">
                    <h1 class="text-center mt-3">Inicia Sesion</h1>
              
                    <!--form action="products/index.php" class="form"-->
                    <form method="post" action="app/AuthController.php" class="form">
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
                    </form>
                </div>
            </div>
        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>