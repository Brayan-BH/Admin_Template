<?php
//session start  => toda la informacion se guarada en la session
    session_start();

    if ($_POST) {

        if (($_POST['usuario']=="admin")&&($_POST['contraseña']=="1234")) {//linea a cambiar por consulta a la base de datos
            
            $_SESSION['usuario']="ok";
            $_SESSION['nombreUsuario']="admin";
            header("Location:home.php");
        }else {
            $mensaje="Error: El usuario o contraseña son incorrectos";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="col">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 mt-5">

                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                    <?php if(isset($mensaje)){?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje;?>
                        </div>
                        <?php } ?>

                        <form class="d-flex flex-column" method="POST" action="login.php">
                                <label>Usuario</label>
                                <input type="text" class="form-control" name="usuario"  placeholder="Escribe tu usuario">
                                    <label for="exampleInputPassword1">Contraseña:</label>
                                    <input type="password" class="form-control" name="contraseña" placeholder="Escribe tu contraseña">
                                    <button type="submit" class="btn btn-primary mt-2">Ingresar</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
</html>