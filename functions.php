<?php
/*Funciones a la conexión a la bdd
 la usaremos en todas las llamadas, vies
 */
function conexion($bd_config){ //$bd_config es un array, viene desde el archivo config.php donde declaro las tres variables
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}

/*Función reciba los datos ,para los nuevos articulos (textos, titulos y demas) y quita las etiquetas html,
devuelve los datos limpios para poder trabajar con ellos*/
function limpiarDatos($datos){
	$datos = ltrim($datos); //elimina espacios al inicio y final de un string
	$datos = stripslashes($datos);//Quita las barras de un string con comillas escapadas
	$datos = htmlspecialchars($datos); //
	return $datos;
}

function pagina_actual(){
	// retornamos directamente si la variable get cn el valor p(pagina) está seteada
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;

}
/*Calcula el nº y cuales de los post(artículos debe traer, dependiendo de donde se le llame. Si estamos en la página 2
traerá el post nº3 y 4, dado que solo aparecen 2 por página*/
function obtener_post($post_por_pagina, $conexion){
    //Si la pagina actual es mayor a 1 entonces pagina_actual()
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    // SQL_CALC_FOUND_ROWS para saber cuantos articulos tenemos en la bdd para utilizarle mas adelante en la paginacion
    //le pedimos a la bdd que nos traiga todos los articulos  desde donde(si inicio está en la pagína nº 2 la variable inicio seria igual a 3),
    //nos traería 2 articulos porq post_por_pagina le dice que nos traiga dos articulos
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos WHERE id_usuario =" . $_SESSION['id_usuario']." LIMIT $inicio, $post_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function numero_paginas($post_por_pagina, $conexion){
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}

function id_articulo($id){
	return (int)limpiarDatos($id);
}

function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp); 
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = "$dia de " . $meses[$mes] . " del $year";
	return $fecha;
}

function comprobarSession(){
	if (!isset($_SESSION['admin'])) {
		header('Location: ' .  RUTA .'/login.php');
	}
}

?>