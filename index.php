<?php
session_start();
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

comprobarSession();


if (!$conexion) { //si no hay conexión me redirige al archivo de error.php
	header('Location: error.php');
}
// le pasamos dos parametros, blog_config es un array en config.php que le indicamos 2 articulos por paginas
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

if (!$posts) {
	header('Location: error.php');
}

require 'views/index.view.php';

?>