<?php

Class Usuario{

    // propiedades de la clase Usuario.
    public $id_usuario;
    public $username;
    public $contrasena;
    public $id_empleado;
    public $id_rol;
    public $estatus;
    public $rol;

    // constructor de la clase Usuario.
    public function __construct(){

        // instancia la clase solamente || crea el objeto.

    }

    public function __destruct(){

    }

    // ******************************************************

    // para uso al momento de instanciarlo
    // metodo publico para asignarle los valores corerespondientes
    // a las propiedades de la clase Usuario
    
    // se recibe a si mismo(objeto) para obtener sus propiedades y
    // recibe tambien el array generado y devuelto en el metodo login de la
    // clase Consulta

    /*public function setObjectProp($object, $arrayLogIn){

        // obtener las propiedades de la clase Usuario en una variable
        $properties = get_object_vars($object);

        // estableciendo los valores de las propiedades del objeto
        foreach($properties as $prop => $value){
            $object->$prop = $arrayLogIn[$prop];
        }

    }*/
    // ******************************************************

    public function getIdUsuario(){
        
        return $this->id_usuario;
        
    }
    public function getUsername(){
        
        return $this->username;
        
    }
    
    public function getContrasena(){

        return $this->contrasena;

    }

    public function getIdEmpleado(){
        
        return $this->id_empleado;
        
    }
    public function getIdRol(){

        return $this->id_rol;

    }
    public function getEstatus(){
        
        return $this->estatus;
        
    }
    public function getUsuarioProp(){
        
        $usuarioProperties = array();

        foreach($this as $index => $value){
            $usuarioProperties[$index] = $this->$index;
        }

        return $usuarioProperties;

    }

}

?>