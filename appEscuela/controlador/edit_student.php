<?php 
include '../modelo/conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM estudiantes WHERE id_estudiantes = $id";
        $reultado = mysqli_query($conexion,$query);

        if(mysqli_num_rows($reultado)==1){
            $row = mysqli_fetch_array($reultado);
            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];
            $edad = $row['edad'];   
            $grado = $row['grado'];  
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $grado = $_POST['grado'];

        $query = "UPDATE estudiantes set nombre = '$nombre', apellidos = '$apellidos', edad = '$edad', grado = '$grado'
        WHERE id_estudiantes = $id";
        mysqli_query($conexion, $query);
        header("Location: ../vista/editar_alumno.php");
    }
?>