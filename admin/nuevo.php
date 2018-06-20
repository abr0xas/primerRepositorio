<?php session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['tmp_name'];
	$id_usuario= $_SESSION['id_usuario'];



	$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

	move_uploaded_file($thumb, $archivo_subido);

	$statement = $conexion->prepare(
	'INSERT INTO articulos (id, titulo, extracto, texto, thumb, id_usuario)
	VALUES (null, :titulo, :extracto, :texto, :thumb, :id_usuario)'
	);

	$statement->execute(array(
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $_FILES['thumb']['name'],
        ':id_usuario'=> $id_usuario
	));

	header('Location: '. RUTA . '/admin');
}

require '../views/nuevo.view.php';

?>