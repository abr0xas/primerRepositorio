<?php

require 'admin/config.php';
require 'functions.php';

$nuevaConec = conexion($bd_config);
if (!$nuevaConec) { //si no hay conexión me redirige al archivo de error.php
    header('Location: error.php');
}


$usuario= $_REQUEST['login'];
$resultado= 'Login disponible';


$logins= $nuevaConec->query('SELECT * FROM usuarios');

if($usuario==''){
    echo '';
}else{
     foreach ($logins as $aLogin){
        if($usuario==$aLogin['nick']){
            $resultado= 'Login no disponible';
        }
    }
    
    echo $resultado;
}

?>
