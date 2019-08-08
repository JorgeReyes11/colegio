<?php

require_once './clases/Usuario.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == null) :
	?>

	<html>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, width=device-width, user-scalable=no">
	<style>
		.margen{
			margin-top:17.5vh;
		}
	</style>

	<script src="./utilities/bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./utilities/bootstrap/bootstrap.min.css">

	

	<div
		><br>
		<div class="container">
			<div class="margen col-12">
				<br><br><br><br>
				<h2>USTED NO TIENE AUTORIZACIÓN PARA VER ESTE CONTENIDO O NO HA INICIADO SESIÓN.</h2>
				<br><br><br><br>
				<a href="login.php"><input type="button" class="btn btn-primary bg-dark btn-block" value="REGRESAR AL LOGIN"></a>
			</div>
		</div>
	</div>
	</html>

	<?php die();
endif;
?>

<?php
require_once './clases/Consulta.php';
require_once './clases/Empleado.php';
require_once './clases/Usuario.php';

$usuario = &$_SESSION['user'];

$empleado = new Empleado();
$empleado->id_empleado = $usuario->getIdEmpleado();
$empleado->setDatosEmpleado();

$_SESSION['empleado'] = $empleado;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, width=device-width, user-scalable=no">
	<script src="./utilities/jquery/jquery-3.4.1.min.js"></script>
	<script src="./utilities/jquery/popper.min.js"></script>
	<script src="./utilities/bootstrap/bootstrap.min.js"></script>
	<script src="./js/index.js"></script>
	<link rel="stylesheet" href="./utilities/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="./css/material_icon.css">
	<link rel="stylesheet" href="./css/panelmainstyles.css">
	<link rel="stylesheet" href="./css/enlaces.css">

	
    <title>PANEL DE CONTROL</title>
</head>
<?php if($usuario->id_rol == 1 || $usuario->id_rol == 2 || $usuario->id_rol == 3): ?>

<body>

<div class="MainContainer">


	<header class="Header">
		<div class="Credenciales">
			<div class="usuario"><?php echo $empleado->getNombreCompleto() ?></div>
			<div class="puesto"><?php echo $empleado->rol; ?></div>
			<div class="cerrarSesion">
				<a href="cerrar_sesion.php">
					<!-- <input class="btn btn-primary" type="button" value="CERRAR SESION"> -->
					CERRAR SESION
				</a>
			</div>
		</div>
 
	</header>
	<nav class="NavBar">
		<ul class="NavBar-Elements">
			
			<li><a href="#"><i class="material-icons">dashboard</i>Home</a></li>
			<li><a href="#"><i class="material-icons" id="group">group</i>Catalogos
			<i class="derecha material-icons">expand_more</i></a>
			<ul class="dropdown">
				<li><a href="./formularios/alta_alumno.php">Alta alumno</a></li>
				<li><a href="./formularios/alta_profesor.php">Alta empleado</a></li>
			</ul>
				</li>
			<li><a href="#"><i class="material-icons">assignment</i>Panel de Información</a></li>
			<li><a href="#"><i class="material-icons">view_list</i>Listas de Grupos</a></li>
			
		</ul>
	</nav>

	<div class="Content">

		<div class="container">

			<div class="container">

				<div class="row">
					<div class="altasybajas col-12">
						<a href="./formularios/alta_profesor.php" class="link"><div class="altasybajastxt">Alta empleado</div></a>
					</div>
					
					<div class="altasybajas col-12">
						<a href="./formularios/alta_alumno.php" class="link"><div class="altasybajastxt">Alta alumno</div></a>
					</div>

					<div class="generarstatus col-12">
						<a href="#" class="link"><div class="generarstatustxt">Generar Status</div></a>
					</div>

					<div class="panelinfo col-12">
						<a href="#" class="link"><div class="panelinfotxt">Panel de Información</div></a>
					</div>

					<div class="listasdegrupos col-12">
						<a href="#" class="link"><div class="listasdegrupostxt">Listas de Grupos</div></a>
					</div>

				
				</div>
				<!-- row opciones end -->

			</div>
			<!-- container end -->

		</div>

	</div>

	
	</div>
    
</body>

<?php else: ?>
<style>
		.margen{
			margin-top:13.5vh;
		}
	</style>
<body>

	<div class="container-fluid">
		<div class="row sticky-top"><!-- row header logo -->
			<div class="headerR col-12 col-md-12 d-flex justify-content-center align-items-center">
				<h2>COLEGIO HUMANITAS</h2>
			</div>
		</div>
		
		<div class="row sticky-top-2" style="border-top: solid 1px #FFF;">
		
				<div class="headerR col-5 col-md-9 d-flex justify-content-end align-items-center" style="padding-top:10px; border-right:solid 1px #FFF;">
					<p><?php echo $empleado->getNombreCompleto() ?></p>
				</div>
				
				<div class="headerR col-4 col-md-1 d-flex justify-content-end align-items-center" style="padding-top:10px; border-right:solid 1px #FFF;">
					<p><?php echo $empleado->rol; ?></p>
				</div>

				<div class="headerR col-3 col-md-2 d-flex justify-content-start" style="padding-top:10px;">
					<a href="cerrar_sesion.php">CERRAR SESION</a>
				</div>

		</div>
		<!-- row header END -->

		

		<div class="row">

			<div class="listasdegrupos col-12">
				<a href="#" class="link"><div class="listasdegrupostxt">Listas de Grupos</div></a>
			</div>
			<div class="listasdegrupos col-12">
				<a><div class="listasdegrupostxt">Listas de Grupos</div></a>
			</div>

		</div>

	</div>
	<!-- container fluid END -->
	<div class="container margen">
	</div>
</body>


<?php endif; ?>


</html>