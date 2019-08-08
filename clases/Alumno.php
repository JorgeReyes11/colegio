<?php
 
Class Alumno{

    public $id_alumno;
    public $apellido_paterno;
    public $apellido_materno;
    public $nombre;
    public $sexo;
    public $f_nac;
    public $CURP;
    public $familiar_uno;
    public $familiar_dos;
    public $f_creacion;
    public $usuario_creacion;
    public $f_modificacion;
    public $usuario_modificacion;
    public $estatus;
    public $id_baja;

    public function __construct(){

        $this->id_alumno = 0;
        $this->apellido_paterno = 'ap';
        $this->apellido_materno = 'am';
        $this->nombre = 'nom';
        $this->sexo = 'f';
        $this->f_nac = '2000-01-01';
        $this->CURP = 'curp';
        $this->familiar_uno = 0;
        $this->familiar_dos = 0;
        $this->f_creacion = '2000-01-01 17:34:36';
        $this->usuario_creacion = 1;
        $this->f_modificacion = '2000-01-01 17:35:53';
        $this->usuario_modificacion = 1;
        $this->estatus = 0;
        $this->id_baja = 1;

    }

}