<?php

    if($_POST == null){
        header("Location:login.php");
        die();
    }

    require_once './clases/Consulta.php';
    require_once './clases/Servidor.php';
    require_once './clases/Usuario.php';
    
    $consulta = new Consulta(Servidor::getServerIp(),'colegio_lsis','12345678');

    $res = $consulta->login($_POST['username'],$_POST['contrasena']);

    if($res==1){
        
        $usuario = $consulta->crearUsuario($_POST['username'],$_POST['contrasena']);

        session_start();
        $_SESSION['user'] = $usuario;
		
		echo 1;
	}//jiji
	else if($res == 2){
		echo 2;
	}
	else{
		echo 0;
	}
	
?>
