<?php

define('RUTA', 'http://localhost/MegaDevelop/blog');
//define('RUTA', 'http://localhost/g/blog');

$bd_config = array(
    'basedatos' => 'blogtfc',
    //'basedatos' => 'blogfinal',
	'usuario' => 'root',
	'pass' => ''
);

$blog_config = array(
	'post_por_pagina' => '4',
	'carpeta_imagenes' => 'imagenes/'
);

$blog_admin = array(
	'usuario' => 'Carlos',
	'password' => '123'
);

?>