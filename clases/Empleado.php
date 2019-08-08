<?php
 
require_once 'Consulta.php';
require_once 'Servidor.php';

Class Empleado{

    public $id_empleado;
    public $apellido_paterno;
    public $apellido_materno;
    public $nombre;
    public $CURP;
    public $RFC;
    public $NSS;
    public $email;
    public $f_nac;
    public $sexo;
    public $telefono_1;
    public $telefono_2;
    public $f_creacion;
    public $usuario_creacion;
    public $f_modificacion;
    public $usuario_modificacion;
    public $id_rol;
    public $estatus;
    public $id_baja;
    public $rol;

    public function __construct(){

    $this->id_empleado = 0;
    $this->apellido_paterno = 'ap';
    $this->apellido_materno = 'am';
    $this->nombre = 'nomb';
    $this->CURP = 'curp';
    $this->RFC = 'rfc';
    $this->NSS = 'nss';
    $this->email = 'email';
    $this->f_nac = '2000-01-01';
    $this->sexo = 'F';
    $this->telefono_1 = 'telefono1';
    $this->telefono_2 = 'telefono2';
    $this->f_creacion = '2000-01-01 17:34:36';
    $this->usuario_creacion = 0;
    $this->f_modificacion = '2000-01-01 17:35:53';
    $this->usuario_modificacion = 0;
    $this->id_rol = 0;
    $this->estatus = 0;
    $this->id_baja = 0;
    $this->rol = 'rol';

    }

    public function __destruct(){

    }
    

   public function getNombreCompleto(){

        return $this->apellido_paterno." ".$this->apellido_materno." ".$this->nombre;

    }


    public function consultarPorId(){

        $consulta = new Consulta(Servidor::getServerIp(),'colegio_lsis','12345678');

        $string = $consulta->crear_PA_Empleado($his,"SEARCH_BY_ID");

        $arreglo = $consulta->consulta($string);

        if(!empty($arreglo)){
            


        }

    }

    public function setDatosEmpleado(){

        $consulta = new Consulta(Servidor::getServerIp(),'colegio_lsis','12345678');

        if($this->id_baja==null){
            $this->id_baja=0;
        }

        $res = $consulta->consulta($consulta->crear_PA_Empleado($this,"SEARCH_BY_ID"));

        foreach($res->fetchAll()[0] as $prop => $value){

            if(strcmp("DIRECTOR",$value)==0 && strcmp("F",$this->sexo)==0){
                $value .= "A";
            }
            else if(strcmp("SUB-DIRECTOR",$value)==0 && strcmp("F",$this->sexo)==0){
                $value .="A";
            }
            else if(strcmp("ADMINISTRATIVO",$value)==0 && strcmp("F",$this->sexo)==0){
                $value .= "ADMINISTRATIVA";
            }
            else if(strcmp("PROFESOR",$value)==0 && strcmp("F",$this->sexo)==0){
                $value .= "A";
            }
            $this->$prop = $value;

        }

    }

    public function getEmpleadoProp(){

        $empleadoProperties = array();

        foreach($this as $index => $value){
            $empleadoProperties[$index] = $this->$index;
        }

        return $empleadoProperties;

    }

}

?>
