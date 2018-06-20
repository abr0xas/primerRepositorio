<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	 <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
	<title>Blog</title>
</head>
<body>
<?php
if(isset($_POST['nombreOng'])){
    $queryUser = "SELECT * FROM `usuarios` WHERE `nick` = '" . $_SESSION['admin'] ."' " ;

    $miconexion=conexion($bd_config);
    $preparar=$miconexion->prepare($queryUser);
    $preparar->execute();
    $userLead=$preparar->fetch(PDO::FETCH_ASSOC);


    $queryOng= "INSERT INTO proyectoong (`id_usuario`, `nombre`,`apellido`,`email`,`telefono`,`ong_nombre`)
              values ('".$userLead['id']."','".$userLead['nombre']."','".$userLead['apellido']."','".$userLead['email']."','".$userLead['telefono']."','".$_POST['nombreOng']."')";
    $preparar=$miconexion->prepare($queryOng);
    $preparar->execute();


}
?>
	<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="<?php echo RUTA; ?>">Espejo</a></p>
			</div>

			<div class="derecha">
				<form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
					<input type="text" name="busqueda" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search"></button>
				</form>

				<nav class="menu">

					<ul>
						<li><a href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://es-es.facebook.com/"><i class="fab fab fa-facebook-f"></i></a></li>
						<li><a class="   " data-toggle="modal" data-target="#exampleModal" href="https://es-es.facebook.com/"><i class="  fas fa-gift"></i></a></li>

                        <li><a href="<?php echo RUTA .'/admin' ?>"> <i class="icono fas fa-pencil-alt"></i></a></li>
                        <li><a href="<?php echo RUTA .'/admin/cerrar.php' ?> ">  <i class="icono fas fa-power-off"></i></a></li>

                    </ul>
				</nav>
			</div>
		</div>
	</header>