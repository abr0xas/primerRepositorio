<?php
/**/
require 'admin/config.php';
require 'functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $nombre = limpiarDatos($_POST['nombre']);

    $apellido = limpiarDatos($_POST['apellido']);
    $contrasenia = limpiarDatos($_POST['contrasenia']);

    $telefono = limpiarDatos($_POST['telefono']);
    $email = limpiarDatos($_POST['email']);
    $direccion = limpiarDatos($_POST['direccion']);

    $query = "INSERT INTO usuarios (`nombre`,`apellido`, `nick`,`contrasenia`, `email`,  `telefono`,    `direccion`  ) 
              values ( $nombre, $apellido,$usuario, $contrasenia, $email, $telefono, $direccion)";
    echo $query . '<br>';
    $nuevaConec = conexion($bd_config);
    $nuevaConec->query("INSERT INTO `usuarios` (`nombre`,`apellido`, `nick`,`contrasenia`, `email`,  `telefono`,    `direccion`  ) 
              values ( '".$nombre."','".$apellido."' ,'".$usuario."', '".$contrasenia."','".$email."' , '".$telefono."', '".$direccion."')");
    var_dump($_POST);



       // prepare query statement

    //$stmt = $nuevaConec->prepare( $query );

    //ejecuta la query
   // $stmt->execute();

    // get retrieved row
   // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    header('Location:' . RUTA . '/login.php');

}

require 'views/register.view.php';

?>