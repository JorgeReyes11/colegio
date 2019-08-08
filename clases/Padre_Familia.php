<?php

Class Padre_familia{
 
    public $id_padre_familia;
    public $apellido_paterno;
    public $apellido_materno;
    public $nombre;
    public $sexo;
    public $NSS;
    public $telefono_1;
    public $telefono_2;
    public $email;
    public $f_creacion;
    public $usuario_creacion;
    public $f_modificacion;
    public $usuario_modificacion;
    public $estatus;

    public function __construct(){

        $this->id_padre_familia = 0;
        $this->apellido_paterno = 'ap';
        $this->apellido_materno = 'am';
        $this->nombre = 'nom';
        $this->sexo = 'f';
        $this->NSS = 'nss';
        $this->telefono_1 = '123';
        $this->telefono_2 = 'null';
        $this->email = 'email';
        $this->f_creacion = '2000-01-01 17:34:36';
        $this->usuario_creacion = 1;
        $this->f_modificacion = '2000-01-01 17:35:53';
        $this->usuario_modificacion = 1;
        $this->estatus = 0;

    }



}

?>