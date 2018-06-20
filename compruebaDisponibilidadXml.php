<?php
 
/*Nombres no disponibles
$logins= array('Manuel', 'German', 'Lorena', 'Consuelo');

 
$usuario= $_REQUEST['login'];
$respuesta= 'Usuarios '.$usuario.' disponible';

if($usuario==""){
    echo " ";
}
 else {
    foreach( $logins as $login){
    
    if($login == $usuario){
        $respuesta= 'Usuarios '.$usuario.' NO disponible';
    }
  
}

echo  $respuesta;
}

*/



require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
$newCo= new conexionPDO('mysql:host=localhost; dbname=JavascriptAjax', 'root', '' );
$nuevaConec=$newCo->myConnect();

$usuario= $_REQUEST['login'];
$resultado= 'Login disponible';

$logins= $conexion->query('SELECT * FROM dosPhp');
 
 
if($usuario==''){
    echo '';
}else{
     foreach ($logins as $aLogin){
        if($usuario==$aLogin['Login']){
            $resultado= 'Login no disponible';
        }
    }
    
    echo $resultado;
}


   
 


class conexionPDO
{

    private $dns;
    private $user;
    private $password;

    public function __construct($dnss, $userr, $pass)
    {
        $this->dns = $dnss;
        $this->user = $userr;
        $this->password = $pass;
    }


    public function myConnect()
    {

        try {
            $miConexion = new PDO($this->dns, $this->user, $this->password);
            
            return $miConexion;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}


?>
