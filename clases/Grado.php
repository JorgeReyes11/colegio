<?php

Class Grado{

    public $id_grado;
    public $descripcion;
    public $f_creacion;
    public $usuario_creacion;
    public $f_modificacion;
    public $usuario_modificacion;
    public $estatus;

    public function __construct(){

            $this->id_grado = 0;
            $this->descripcion = 'desc';
            $this->f_creacion = '2000-01-01 17:34:36';
            $this->usuario_creacion = 0;
            $this->f_modificacion = '2000-01-01 17:34:36';
            $this->usuario_modificacion = 0;
            $this->estatus = 0;

    }

    public function __destruct(){
        
    }

}

?>