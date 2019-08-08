<?php

error_reporting(0);

session_start();
if(isset($_SESSION['user']) || !$_SESSION['user']==''){
    header("Location:index.php");
}

// spl_autoload_registrer(function ($className){
//     if(strpcos($className,"Styde")){

//     }
//     if(file_exists("src/$className.php")){
//         require "./src";
//     }

// });

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="./utilities/jquery/jquery-3.4.1.min.js"></script>
    <script src="./utilities/jquery/popper.min.js"></script>
    <script src="./utilities/bootstrap/bootstrap.min.js"></script>
    <script src="./js/login.js"></script>

    <link rel="stylesheet" href="./utilities/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">

    <style>

        
    </style>

    <title>INICIO</title>

</head>

<body>

    <div class="container margen">
        
        <div class="row">

            <div class="col d-flex justify-content-center">

                <h1>BIENVENIDO</h1>

            </div>

        </div>
        <!-- ROW BIENVENIDO END -->
    
        <div class="row">

            <div class="col d-flex justify-content-center">

                <small>INGRESE SUS CREDENCIALES PARA ACCEDER AL SISTEMA</small>

            </div>

        </div>
        <!-- ROW BIENVENIDO END -->

        <form action="validacion.php" method="post">
        
            <div class="row">
                <div class="col-12">
                    <!-- username -->
                    <div class="">
                        <input type="text" id="username" class="form-control" name="username" placeholder="INGRESE SU NOMBRE DE USUARIO">
                    </div>
                    <!-- username -->
                </div>
            </div>
            <!-- ROW INPUT USERNAME END -->

            <div class="row">
                <div class="col-12">
                    <!-- pass -->
                    <div class="">
                        <input type="password" id="contrasena" class="form-control" name="contrasena" placeholder="INGRESE SU CONTRASEÑA">
                    </div>
                    <!-- pass -->
                </div>
            </div>
            <!-- ROW INPUT PASSWORD END -->

            <div class="row">
                
                <div class="col-12">
                
                    <input type="button" id="botonLogin" class="btn btn-primary bg-dark btn-block" value="INGRESAR" name="botonLogin">
                
                </div>

            </div>
            <!-- ROW BUTTON END -->
            
            <div class="row">

                <div class="col-12">

                    <span id="result"></span>

                </div>
            
            </div>

        </form>
            
    </div>
    <!-- CONTAINER END -->

    </body>

</html>