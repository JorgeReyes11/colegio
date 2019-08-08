<?php

require_once '../clases/Usuario.php';
require_once '../clases/Empleado.php';
session_start();

if(!isset($_SESSION['user']) || $_SESSION['user'] == null) :
	echo "<br><br><br>";
	?>

	<html>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		.margen{
			margin-top:17.5vh;
		}
	</style>

	<script src="../utilities/bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../utilities/bootstrap/bootstrap.min.css">


	<div
		><br>
		<div class="container">
			<div class="margen col-12">
        <br><br>
				<h2>USTED NO TIENE AUTORIZACIÓN PARA VER ESTE CONTENIDO O NO HA INICIADO SESIÓN.</h2>
				<br><br><br>
				<a href="../login.php"><input type="button" class="btn btn-primary bg-dark btn-block" value="REGRESAR AL LOGIN"></a>
			</div>
		</div>
	</div>
	</html>

	<?php die(); endif;

?>

<?php

require_once '../clases/Consulta.php';
require_once '../clases/Servidor.php';

$usuario = &$_SESSION['user'];
$empleado = &$_SESSION['empleado'];

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <script src="../utilities/jquery/jquery-3.4.1.min.js"></script>
      <script src="../utilities/jquery/popper.min.js"></script>
      <script src="../utilities/bootstrap/bootstrap.min.js"></script>
      <script src="../utilities/sweet_alert2/sweetalert2@8.js"></script>
      <script src="../js/alta_alumno.js"></script>
   
      <link rel="stylesheet" href="../utilities/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="../css/material_icon.css">
      <link rel="stylesheet" href="../css/alta_alumno.css">
      <link rel="stylesheet" href="../css/enlaces.css">

      <title>Alta Alumno</title>
   </head>
   <body>
      <div class="MainContainer">
         <header class="Header">
            <div class="Credenciales">
               <div class="usuario"><?php echo $empleado->getNombreCompleto() ?></div>
               <div class="puesto"><?php echo $empleado->rol ?></div>
            </div>
         </header>        

  <nav class="NavBar">
    <ul class="NavBar-Elements">
         <li>
            <a href="../index.php"><i class="izq material-icons">dashboard</i>Home</a></li>
			   <li><a href="#"><i class="izq material-icons">group</i>Catalogos
			   <i class="derecha material-icons">expand_more</i></a>
			   <ul class="dropdown">
            <li><a href="./alta_alumno.php" id="aest">Alta alumno</a></li> 
            <li><a href="./alta_profesor.php">Alta empleado</a></li></ul>
        </li>        
      <li><a href="#"><i class="izq material-icons">assignment</i>Panel de Información</a></li>
      <li><a href="#"><i class="izq material-icons">view_list</i>Listas de Grupos</a></li>    
    </ul>
  </nav>
<!-- navbar END -->
         <div class="Content">
            <div class="bootstrap">
               <div class="container">
                  <div class="titulo">
                     <h4>Registro de Alumno</h4>
                  </div>
                  <!-- titulo END -->
                  <div class="titulo">
                     <h5>Datos del Alumno</h5>
                  </div>
                  <!-- titulo END -->
                  <!-- FORMULARIO START -->
                  <form id="formalumno" method="POST">
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="nombre">Nombre</label>
                           <input type="text" class="form-control" name="nombre_alumno" id="nombre_alumno" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="apellidoPaterno_alumno">Apellido Paterno</label>
                           <input type="text" class="form-control" name="apellidoPaterno_alumno" id="apellidoPaterno_alumno" placeholder="Apellido">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="apellidoMaterno_alumno">Apellido Materno</label>
                           <input type="text" class="form-control" name="apellidoMaterno_alumno" id="apellidoMaterno_alumno" placeholder="Apellido">
                        </div>
                     </div>
                     <!-- form-row END -->
                     <hr>
                     <fieldset class="form-group">
                        <div class="row">
                           <legend class="col-form-label col-2 pt-0">Sexo</legend>
                           <div class="col-2">
                                 <input class="form-check-input" type="radio" name="radioSexo_alumno" id="radioSexo_alumno_M" value="M"/>
                                 <label class="form-check-label">Masculino</label>
                           </div>
                           <div class="col-1">
                                <input class="form-check-input" type="radio" name="radioSexo_alumno" id="radioSexo_alumno_F" value="F"/>
                                <label class="form-check-label">Femenino</label>
                           </div>
                        </div>
                        <!-- row END -->
                        <hr>
                     </fieldset>
                     <!-- fieldset form-group END -->
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="curp" >CURP</label>
                           <input type="text" class="form-control" name="curp_alumno" id="curp_alumno" placeholder="CURP">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="fechanacimiento">Fecha de Nacimiento</label>
                           <input type="date" class="form-control" name="DOB_alumno" id="DOB_alumno" placeholder="yyyy-mm-dd">
                        </div>
                     </div>
                     <!-- form row end -->
                     <hr>
                     <br>
                     <div class="datosFamiliarUno">
                        <div class="titulo">
                           <h5>Datos del familiar del Alumno</h5>
                        </div>
                        <!-- titulo END -->
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="nombrepadre">Nombre(s) del familiar</label>
                              <input type="text" class="form-control" name="nombre_familiarUno" id="nombre_familiarUno" placeholder="Nombre">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="inputPassword3" >Apellido paterno del familiar</label>
                              <input type="text" class="form-control" name="apellidoPaterno_familiarUno" id="apellidoPaterno_familiarUno" placeholder="Apellido paterno">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="appaternopadre" >Apellido materno del familiar</label>
                              <input type="text" class="form-control" name="apellidoMaterno_familiarUno" id="apellidoMaterno_familiarUno" placeholder="Apellido materno">
                           </div>
                        </div>
                        <!-- form-row END -->
                        <hr>
                        <div class="row">
                           <legend class="col-form-label col-2 pt-0">Sexo</legend>
                           <div class="col-2">
                                 <input class="form-check-input" type="radio" name="radioSexo_familiarUno" id="radioSexo_familiarUno_M" value="M">
                                 <label class="form-check-label" for="gridRadios1">Masculino</label>
                           </div>
                           <div class="col-1">
                                <input class="form-check-input" type="radio" name="radioSexo_familiarUno" id="radioSexo_familiarUno_F" value="F">
                                <label class="form-check-label" for="gridRadios2">Femenino</label>
                           </div>
                        </div>
                        <hr>
                        <!-- row END -->
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="nombremadre">NSS</label>
                              <input type="text" class="form-control" name="NSS_familiarUno" id="NSS_familiarUno" placeholder="Numero de seguridad social">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="appaternomadrep" >Telefono</label>
                              <input type="text" class="form-control" name="telefono1_familiarUno" id="telefono1_familiarUno" placeholder="Telefono 1">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="apmaternomadre" >Email</label>
                              <input type="text" class="form-control" name="email_familiarUno" id="email_familiarUno" placeholder="Email">
                           </div>
                        </div>
                        <!-- form-row END -->
                     </div>
                     <!-- datosFamiliarUno END -->
                     <hr>
                     <br>
                     <div class="datosFamiliarDos">
                        <div class="titulo">
                           <h5>Datos del familiar 2 del Alumno</h5>
                        </div>
                        <!-- titulo END -->
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="nombrepadre">Nombre(s) del familiar</label>
                              <input type="text" class="form-control" name="nombre_familiarDos" id="nombre_familiarDos" placeholder="Nombre">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="inputPassword3" >Apellido paterno del familiar</label>
                              <input type="text" class="form-control" name="apellidoPaterno_familiarDos" id="apellidoPaterno_familiarDos" placeholder="Apellido paterno">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="appaternopadre" >Apellido materno del familiar</label>
                              <input type="text" class="form-control" name="apellidoMaterno_familiarDos" id="apellidoMaterno_familiarDos" placeholder="Apellido materno">
                           </div>
                        </div>
                        <!-- form-row END -->
                        <hr>
                        <div class="row">
                           <legend class="col-form-label col-2 pt-0">Sexo</legend>
                           <div class="col-2">
                                 <input class="form-check-input" type="radio" name="radioSexo_familiarDos" id="radioSexo_familiarDos_M" value="M">
                                 <label class="form-check-label" for="gridRadios1">Masculino</label>
                           </div>
                           <div class="col-1">
                                <input class="form-check-input" type="radio" name="radioSexo_familiarDos" id="radioSexo_familiarDos_F" value="F">
                                <label class="form-check-label" for="gridRadios2">Femenino</label>
                           </div>
                        </div>
                        <hr>
                        <!-- row END -->
                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="nombremadre">NSS</label>
                              <input type="text" class="form-control" name="NSS_familiarDos" id="NSS_familiarDos" placeholder="Numero de seguridad social">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="appaternomadrep" >Telefono</label>
                              <input type="text" class="form-control" name="telefono1_familiarDos" id="telefono1_familiarDos" placeholder="Telefono 1">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="apmaternomadre" >Email</label>
                              <input type="text" class="form-control" name="email_familiarDos" id="email_familiarDos" placeholder="Email">
                           </div>
                        </div>
                        <!-- form-row END -->
                     </div>
                     <!-- datosFamiliarDos END -->
                     <br>
                  </form>
                  <!-- FORMULARIO END -->
                  <div class="form-group row">
                        <div class="col">
                           <button type="button" id="botonRegistrar" class="btn btn-primary bg-primary btn-block">REGISTRAR ALUMNO</button>
                        </div>
                     </div>
                     <!-- form-row END -->
               </div>
               <!-- container END -->
            </div>
            <!-- bootstrap END -->
         </div>
         <!-- content END-->
      </div>
      <!-- MainContainer END -->
   </body>
<!-- corchete,a-zA-Zcorchete,+ -->
<!-- action="./prueba_registro_alumno.php" -->
</html>