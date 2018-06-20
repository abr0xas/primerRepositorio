<?php session_start();/**/
require 'admin/config.php';
require 'functions.php';


if (isset($_POST['registrarse'])){
    header('Location:' . RUTA . '/register.php');

}else{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = limpiarDatos($_POST['usuario']);
        $password = limpiarDatos($_POST['password']);

        $query1 = "SELECT * FROM `usuarios` WHERE `nick` = '" . $usuario ."' AND `contrasenia` = '" . $password ."' " ;
        $miconexion=conexion($bd_config);
        $preparar=$miconexion->prepare($query1);
        $preparar->execute();
        $row=$preparar->fetch(PDO::FETCH_ASSOC);



        if($row>0){//Entra si hay registros
            $_SESSION['admin'] = $row['nick'];
            $_SESSION['id_usuario']= $row['id'];
             header('Location:' . RUTA . '');
        }else{
            header('Location:' . RUTA . '/login.php?error=error');
        }
 die;
        if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {
            $_SESSION['admin'] = $blog_admin['usuario'];
            header('Location:' . RUTA . '');
        }
    }


}


require 'views/login.view.php';

?>