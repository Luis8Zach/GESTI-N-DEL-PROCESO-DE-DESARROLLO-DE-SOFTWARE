<?php
session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["NUE"]) && !empty($_POST["Password"])) {
        $NUE = $_POST["NUE"];
        $Password = $_POST["Password"];
        $sql = $conexion->query("SELECT * FROM usuarios WHERE NUE = '$NUE' AND Password = '$Password'");
        
        if ($datos = $sql->fetch_object()) {
            if ($datos->id_rol == 1) { //administrador
                header("location: inicio.php");
                $_SESSION["id_usuario"] = $datos->id_usuario;
                $_SESSION["Nombre"] = $datos->NUE;
                $_SESSION["id_rol"] = $datos->id_rol;
            } else if ($datos->id_rol == 2) { //cliente
                header("location: agremiado.php");
            }
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado</div>";
        }
    } else {
        echo "Campos vacíos";
    }
}
?>
