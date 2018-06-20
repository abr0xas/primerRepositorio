<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/06/2018
 * Time: 17:14
 */
 require 'admin/config.php';
require 'functions.php';


$bd_config=$bd_config;
$query = "INSERT INTO usuarios (`nombre`,`apellido`, `nick`,`contrasenia`, `email`,  `telefono`,    `direccion`  ) 
              values ( $nombre, $apellido,$usuario, $contrasenia, $email, $telefono, $direccion)";
$queryUser = "SELECT * FROM `usuarios` WHERE `nick` = '" . $_SESSION['admin'] ."' " ;
$miconexion=conexion($bd_config);
$preparar=$miconexion->prepare($queryUser);
$preparar->execute();
$userLead=$preparar->fetch(PDO::FETCH_ASSOC);
function saveLead(){

}


?>