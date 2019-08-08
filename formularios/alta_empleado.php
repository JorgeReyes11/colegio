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
				<h2>USTED NO TIENE AUTORIZACIÓN PARA VER ESTE CONTENIDO O NO HA INICIADO SESIÓN</h2>
				<br><br><br>
				<a href="login.php"><input type="button" class="btn btn-primary bg-dark btn-block" value="REGRESAR AL LOGIN"></a>
			</div>
		</div>
	</div>
	</html>

	<?php die();
endif;
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
  <script src="../js/alta_empleado.js"></script>  

  <link rel="stylesheet" href="../utilities/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../css/material_icon.css">
  <link rel="stylesheet" href="../css/alta_profesor.css">
  <link rel="stylesheet" href="../css/enlaces.css">
  
  <title>Alta Profesor</title>
</head>

  <body>
  
  <div class="MainContainer">


  <header class="Header">
    <div class="Credenciales">
      <div class="usuario"><?php echo $empleado->getNombreCompleto() ?></div>
      <div class="puesto"><?php echo $empleado->rol ?></div>
      <a href="../cerrar_sesion.php"></a>
    </div> 
    <!-- <input class="btn btn-primary" type="button" value="CERRAR SESION"> -->

  </header>
  
  <nav class="NavBar">
    <ul class="NavBar-Elements">
         <li><a href="../index.php"><i class="izq material-icons">dashboard</i>Home</a></li>
			<li><a href="#"><i class="izq material-icons">group</i>Catalogos
			<i class="derecha material-icons">expand_more</i></a>
			<ul class="dropdown">
        <li><a href="./alta_alumno.php">Alta alumno</a></li>
        <li><a href="./alta_profesor.php" id="apro">Alta profesor</a></li> 
      </ul>
        </li>       
      <li><a href="#"><i class="material-icons">assignment</i>Panel de Información</a></li>
      <li><a href="#"><i class="material-icons">view_list</i>Listas de Grupos</a></li>    
    </ul>
  </nav>

  <div class="Content">

  <div class="bootstrap">
  
  <div class="container">

  <h2>Registro de empleado</h2>
  <br>

  <form action="../insertar_profesor.php" method="post">
  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nombre(s)</label>
      <input type="text" class="inputTexto form-control" name="nombre" id="nombre" placeholder="Nombre(s) empleado" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Apellido Paterno</label>
      <input type="text" class="inputTexto form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" required>
    </div>
     <div class="form-group col-md-4">
      <label for="inputPassword4">Apellido Materno</label>
      <input type="text" class="inputTexto form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido Materno" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">CURP</label>
      <input type="text" class="inputTexto form-control" name="CURP" id="CURP" placeholder="CURP" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">RFC</label>
      <input type="text" class="inputTexto form-control" name="RFC" id="RFC" placeholder="RFC" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">NSS</label>
      <input type="text" class="inputTexto form-control" name="NSS" id="NSS" placeholder="NSS" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Email</label>
      <input type="email" class="inputTexto form-control" name="email" id="email" placeholder="Email" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputPassword3" >Teléfono</label>
   
      <input type="text" class="inputTexto form-control" name="telefono_1" id="telefono_1" placeholder="Teléfono" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputPassword3" >Teléfono 2</label>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" name="gridRadios" id="chkbxTelefono2" value="Femenino">
          <label class="form-check-label" for="femenino">No incluir</label>
        </div>
      <input type="text" class="inputTexto form-control" name="telefono_2" id="telefono_2" placeholder="Teléfono 2 (Opcional)">
    </div>
  
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Sexo</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radioSexo" id="masculino" value="M" checked>
          <label class="form-check-label" for="masculino">
            Masculino
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radioSexo" id="femenino" value="F">
          <label class="form-check-label" for="femenino">
            Femenino
          </label>
        </div>
      
      </div>
    </div>

    <div class="form-row">
    
      <div class="form-group col-md-6">
    
        <label for="inputState">Rol</label>
      
        <select id="rol" name="rol" class="form-control">
      
          <option selected>Elegir...</option>
      
          <option value="PROFESOR">PROFESOR</option>
      
        </select>
    
    </div>
    
    <div class="form-group col-md-6">
    
      <label for="inputPassword3">Fecha de Nacimiento</label>
   
      <input  type="date" name="f_nac"class="form-control" id="f_nac" placeholder="dd/mm/yyyy">
 
    </div>
  
  </div>
  </fieldset>
  <div class="form-row">

    <button type="button" id="botonRegistrar" class="btn btn-primary bg-primary btn-block">Registrar</button>
    
  </div>

</form>

</div>

</div>
  
  </div>


</body>
</html>