<?php
 
require_once 'Empleado.php';
require_once 'Usuario.php';

Class Consulta{

    private $conn;

    /* constructor reciba la IP del Servidor, usuario, password */
    public function __construct($serverIP,$db_username,$db_password){

        try {
            $this->conn = new PDO("mysql:host=$serverIP:3306;dbname=colegio_colegio",$db_username,$db_password);
        }
        catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            // throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
            return $Exception->getMessage();
        }

    } // function construct END

    public function __desctruct(){
        
        
    } // function destruct END
    
    /* metodo consulta recibe un query */
    public function consulta($query){

        try {
            
            /* $res guarda el resultado del query */
            $res = $this->conn->query($query);
            
            /* setFet para que el resultado $res que es un PDO-Statement
            sea devuelto en un array asociativo */
            $res->setFetchMode(PDO::FETCH_ASSOC);
            
            /* devolver el resultado de la consulta */
            return $res;

        }
        catch( PDOException $Exception ) {
            return $Exception->getMessage();
        }

    } // function consulta END

    public function login($usr_username,$usr_password){

        //usar el PA para login
        $res = $this->consulta($this->crear_PA_Login($usr_username,$usr_password));

        // array para guardar 
        $loginArray = array();

        /* asignar los resultados de la consulta al array loginAarray
        para despues comparar */
        foreach($res as $row){
            $loginArray['username'] = $row['username'];
            $loginArray['contrasena'] = $row['contrasena'];
            $loginArray['estatus'] = $row['estatus'];
        }

        /* si array esta vacio porque la consulta NO trae
        resultados */ 
        if(empty($loginArray)){
            //NO coinciden las credenciales;
            return 0;
        }
        /* si array NO esta vacio es porque la consulta SI trae
        resultados */
        else if(!empty($loginArray) && strcmp("1",$loginArray['estatus']==0)){
            // ACCESO;
            return 1;
        }
        /* si array NO esta vacio es porque la consulta SI trae
        resultados */
        else if(!empty($loginArray) && strcmp("0",$loginArray['estatus']==0)){
            // SI coinciden las credenciales pero su cuenta esta desactivada;
            return 2;
        }
        
    } // function login END

    public function crearUsuario($usr_username,$usr_password){

        $res = $this->consulta($this->crear_PA_ObtenerUsuario($usr_username,$usr_password));

        // $results = $res->fetchAll();

        $usuario = new Usuario();
        
        foreach($res->fetchAll()[0] as $prop => $value){
            
            $usuario->$prop = $value;

        }

        return $usuario;

    }

    function consultaEmpleado() {

        $empleado = new Empleado();

        $res = $this->consulta(
            $this->crear_PA_Empleado($empleado,'SEARCH')
        );

           
        return $this->devolverEmpleados($res);

    }

    function consultaEmpleadoNombre($nombre_empleado) {

        $empleado = new Empleado();
        
        $empleado->nombre = $nombre_empleado;

        $res = $this->consulta($this->crear_PA_Empleado($empleado,'NOMBRE'));

        return $this->devolverEmpleados($res);

    }


    public function devolverEmpleados($arreglo_consulta){

        $arreglo_empleado = array();

        foreach ($arreglo_consulta as $row)
        {
          $empleado1 = new Empleado();

          $empleado1->apellido_paterno = $row['apellido_paterno'];
          $empleado1->apellido_materno = $row['apellido_materno'];
          $empleado1->nombre = $row['nombre'];
          $empleado1->s_nombre = $row['s_nombre'];

          $arreglo_empleado[] = $empleado1;

        }

        return $arreglo_empleado;

    }

    public function devolverEmpleado($arreglo_consulta){

        $empleado = new Empleado();

        foreach($arreglo_consulta as $row){

        $empleado->id_empleado = $row['id_empleado'];
        $empleado->apellido_paterno = $row['apellido_paterno'];
        $empleado->apellido_materno = $row['apellido_materno'];
        $empleado->nombre = $row['nombre'];
        $empleado->CURP = $row['CURP'];
        $empleado->RFC = $row['RFC'];
        $empleado->NSS = $row['NSS'];
        $empleado->email = $row['email'];
        $empleado->DOB = $row['DOB'];
        $empleado->sexo = $row['sexo'];
        $empleado->id_rol = $row['id_rol'];
        $empleado->estatus = $row['estatus'];
        $empleado->id_baja = $row['id_baja'];
        $empleado->f_creacion = $row['f_creacion'];
        $empleado->usuario_creacion = $row['usuario_creacion'];
        $empleado->f_modificacion = $row['f_modificacion'];
        $empleado->usuario_modificacion = $row['usuario_modificacion'];
        $empleado->rol = $row['rol'];

        }

        return $empleado;

    }

    public function crear_PA_Empleado($empleado,$opcion){

        $PA = "call PA_Empleado
        ('".$opcion."',".
        $empleado->id_empleado.",'".
        $empleado->apellido_paterno."','".
        $empleado->apellido_materno."','".
        $empleado->nombre."','".
        $empleado->CURP."','".
        $empleado->RFC."','".
        $empleado->NSS."','".
        $empleado->email."','".
        $empleado->f_nac."','".
        $empleado->sexo."','".
        $empleado->telefono_1."','".
        $empleado->telefono_2."','".
        $empleado->f_creacion."',".
        $empleado->usuario_creacion.",'".
        $empleado->f_modificacion."',".
        $empleado->usuario_modificacion.",".
        $empleado->id_rol.",".
        $empleado->estatus.",".
        $empleado->id_baja.",'".
        $empleado->rol."'".
        ");";

        return $PA;

    }

    public function crear_PA_Alumno($alumno, $opcion){

        $PA = "call PA_Alumno("."'".$opcion."',".
        $alumno->id_alumno.",'".
        $alumno->apellido_paterno."','".
        $alumno->apellido_materno."','".
        $alumno->nombre."','".
        $alumno->sexo."','".
        $alumno->f_nac."','".
        $alumno->CURP."',".
        $alumno->familiar_uno.",".
        $alumno->familiar_dos.",'".
        $alumno->f_creacion."',".
        $alumno->usuario_creacion.",'".
        $alumno->f_modificacion."',".
        $alumno->usuario_modificacion.",".
        $alumno->estatus.",".
        $alumno->id_baja.
        ");";

        return $PA;

    }

    public function crear_PA_ObtenerUsuario($username, $contrasena){

        $PA = "call PA_Obtener_Usuario("."'".$username."',"."'".$contrasena."');";

        return $PA;

    }
    
    public function crear_PA_Login($username,$contrasena){

        $PA = "call PA_Login("."'".$username."',"."'".$contrasena."');";

        return $PA;

    }

    public function crear_PA_Padre_Familia($padre_familia,$opcion){

        $PA = "call PA_Padre_Familia('".
        $opcion."',".
        $padre_familia->id_padre_familia.",'".
        $padre_familia->apellido_paterno."','".
        $padre_familia->apellido_materno."','".
        $padre_familia->nombre."','".
        $padre_familia->sexo."','".
        $padre_familia->NSS."','".
        $padre_familia->telefono_1."','".
        $padre_familia->telefono_2."','".
        $padre_familia->email."','".
        $padre_familia->f_creacion."',".
        $padre_familia->usuario_creacion.",'".
        $padre_familia->f_modificacion."',".
        $padre_familia->usuario_modificacion.",".
        $padre_familia->estatus.

        ");";

        return $PA;

    }

    public function getLastIdFromTable($columna,$table){
        /* SE CREO ESTE METODO COMO AUXILIAR AL PDO::lastInsertId
        DEBIDO A QUE ESTE ULTIMA, DEVOLVIA 0 EN LA ***MAYORIA*** DE LOS CASOS. */

        $res = $this->consulta("select MAX(".$columna.")"."from ".$table.";");

        $result = $res->fetch();

        $index = "MAX(".$columna.")";

        return $result[$index];

    }

    public function InsertarAlumno($alumno,$padre_f1,$padre_f2,$opcion,$usuario_creacion){

        try{

            if($opcion="NUEVO"){

            $padre_f1_fk;
            $padre_f2_fk;
            $this->conn->beginTransaction();
            $this->consulta($this->crear_PA_Padre_Familia($padre_f1,"INSERT"));
            // $padre_f1_fk = $this->conn->lastInsertId();
            $padre_f1_fk = intval($this->getLastIdFromTable("id_padre_familia","padre_familia"));
            $this->consulta($this->crear_PA_Padre_Familia($padre_f2,"INSERT"));
            // $padre_f2_fk = $this->conn->lastInsertId();
            $padre_f2_fk = intval($this->getLastIdFromTable("id_padre_familia","padre_familia"));
            $alumno->familiar_uno = $padre_f1_fk;
            $alumno->familiar_dos = $padre_f2_fk;
            $alumno->usuario_creacion = intval($usuario_creacion);
            $alumno->usuario_modificacion = intval($usuario_creacion);
            $this->consulta($this->crear_PA_Alumno($alumno,"INSERT"));
            $this->conn->commit();

            }
        }
        catch (PDOException $Exception){
            
            $this->conn->rollback();
            return $Exception->getMessage();

        }

    }

}
