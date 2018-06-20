<?php require 'header_login.php'; ?>

	<div class="contenedor">
		<div class="post formRegistro">
			<article>
				<h2 class="titulo">Iniciar Sesion </h2>
				<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<input type="text" name="usuario" placeholder="Usuario" required>
					<input type="password" name="password" placeholder="Contraseña" required>
                    <?php echo isset($_GET['error']) ?   "<span style='color: red'> Vuelva a introducir usuario y contraseña correctamente</span>" : "";  ?>
					<input type="submit" value="Iniciar Sesion">


				</form>
                <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                     <input type="hidden" name="registrarse" value="true">
                    <input type="submit" id="btnRegistrar" value="Registrarse">

                </form>

            </article>
		</div>
	</div>

