<?php
include '../modelo/conexion.php';
if(isset($_POST['save'])){

    $id_estudiante = $_POST['NIE'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $grado = $_POST['grado'];

    $query = "INSERT INTO estudiantes (id_estudiantes,nombre,apellidos,edad,grado) 
    VALUES ('$id_estudiante','$nombre','$apellidos','$edad','$grado')";
    $result = mysqli_query($conexion,$query);


    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = "Registro Guardado";

    header("Location: ../vista/crear_alumno.php");
}
?>