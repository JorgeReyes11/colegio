<?php

require_once '../clases/Usuario.php';
require_once '../clases/Empleado.php';

session_start();

require_once '../clases/Consulta.php';
require_once '../clases/Rol.php';
require_once '../clases/Servidor.php';

//Crear variables de sesión
$usuario = &$_SESSION['user'];
$empleado = &$_SESSION['empleado'];

//Crear objeto Padre
 $empleado = new Empleado();
 
 $empleado->apellido_paterno = $_POST["apellido_paterno"];
 $empleado->apellido_materno = $_POST["apellido_materno"];
 $empleado->nombre = $_POST["nombre"];
 $empleado->CURP = $_POST["CURP"];
 $empleado->RFC = $_POST["RFC"];
 $empleado->NSS = $_POST["NSS"];
 $empleado->email = $_POST["email"];
 $empleado->f_nac = $_POST["f_nac"];
 $empleado->sexo = $_POST["sexo"];
 $empleado->telefono_1 = $_POST["telefono_1"];
 $empleado->telefono_2 = $_POST["telefono_2"];
//$empleado->rol = $_POST["rol"];

$consulta = new Consulta(Servidor::getServerIp(),'colegio_lsis','12345678');

// $consulta->consulta($consulta->crear_PA_Empleado($empleado,"INSERT"));

echo 1;

?>
