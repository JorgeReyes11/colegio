<?php

Class Ciclo_Escolar{
            
    public $id_ciclo_esc;
    public $ano_inicio;
    public $ano_fin;
    public $f_creacion;
    public $usuario_creacion;
    public $f_modificacion;
    public $usuario_modificacion;
    public $estatus;

    public function __construct(){

        $this->id_ciclo_esc = 0;
        $this->ano_inicio = '2000';
        $this->ano_final = '2000';
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