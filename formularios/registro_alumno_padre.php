<?php

require_once '../clases/Usuario.php';
require_once '../clases/Empleado.php';
session_start();

require_once '../clases/Consulta.php';
require_once '../clases/Servidor.php';
require_once '../clases/Alumno.php';
require_once '../clases/Padre_familia.php';

$usuario = &$_SESSION['user'];
$empleado = &$_SESSION['empleado'];

$alumno = new Alumno();
$padre_familia_obj = new Padre_Familia();
$padre_familia_obj_2 = new Padre_Familia();

$alumno->nombre=$_POST["nombre_alumno"];
$alumno->apellido_paterno=$_POST["ApellidoPaterno_alumno"];
$alumno->apellido_materno=$_POST["ApellidoMaterno_alumno"];
$alumno->sexo=$_POST["radioSexo_alumno"];
$alumno->CURP=$_POST["curp_alumno"];
$alumno->f_nac=$_POST["DOB_alumno"];

$padre_familia_obj->nombre = $_POST["nombre_familiarUno"];
$padre_familia_obj->apellido_paterno = $_POST["apellidoPaterno_familiarUno"];
$padre_familia_obj->apellido_materno = $_POST["apellidoMaterno_familiarUno"];
$padre_familia_obj->sexo = $_POST["radioSexo_familiarUno"];
$padre_familia_obj->NSS = $_POST["NSS_familiarUno"];
$padre_familia_obj->telefono_1 = $_POST["telefono1_familiarUno"];
$padre_familia_obj->email = $_POST["email_familiarUno"];

$padre_familia_obj_2->nombre = $_POST["nombre_familiarDos"];
$padre_familia_obj_2->apellido_paterno = $_POST["apellidoPaterno_familiarDos"];
$padre_familia_obj_2->apellido_materno = $_POST["apellidoMaterno_familiarDos"];
$padre_familia_obj_2->sexo = $_POST["radioSexo_familiarDos"];
$padre_familia_obj_2->NSS = $_POST["NSS_familiarDos"];
$padre_familia_obj_2->telefono_1 = $_POST["telefono1_familiarDos"];
$padre_familia_obj_2->email = $_POST["email_familiarDos"];

$consulta = new Consulta(Servidor::getServerIp(),'colegio_lsis','12345678');

// $consulta->consulta($consulta->crear_PA_Padre_Familia($padre_familia_obj,"INSERT"));
// $consulta->consulta($consulta->crear_PA_Padre_Familia($padre_familia_obj_2,"INSERT"));
// echo $consulta->crear_PA_Alumno($alumno,"INSERT");

$consulta->InsertarAlumno($alumno,$padre_familia_obj,$padre_familia_obj_2,"NUEVO",$usuario->id_usuario);

echo 1;


// echo $consulta->getLastIdFromTable("id_usuario","usuario");




?>
