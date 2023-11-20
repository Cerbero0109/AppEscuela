<?php 
include '../modelo/conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM login WHERE id_login = $id";
        $resultado = mysqli_query($conexion,$query);

        if(mysqli_num_rows($resultado)==1){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombres'];
            $apellidos = $row['apellidos'];
            $contrasena = $row['contrasena'];   
            $usuario = $row['usuario'];  
        }
    }

    if(isset($_POST['actualizar_profe'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $contrasena = $_POST['contrasena'];
        $usuario = $_POST['usuario'];

        $query = "UPDATE login set nombres = '$nombre', apellidos = '$apellidos', contrasena = '$contrasena', usuario = '$usuario'
        WHERE id_login = $id";
        mysqli_query($conexion, $query);
        header('Location: ../admin.php');
    }
?>