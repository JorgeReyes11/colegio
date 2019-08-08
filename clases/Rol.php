<?php

Class Rol{

    public $id_rol;
    public $descripcion;
    public $estatus;
 
    public function __construct(){

        $this->id_rol = 0;
        $this->descripcion = 'desc';//varchar(25)
        $this->estatus = 0;

    }

    public function __destruct(){
        
    }

}

?>