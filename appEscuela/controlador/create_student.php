<?php
include '../modelo/conexion.php';
if(isset($_POST['save'])){

    $id_estudiante = $_POST['NIE'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];

    session_start();  // Asegúrate de iniciar la sesión
    $usuario_id = $_SESSION['id_login'];
    $query = "SELECT usuario FROM login WHERE id_login = '$usuario_id'";
    $result = mysqli_query($conexion, $query);

    // Verificar si la consulta fue exitosa
    if ($result) {
        // Obtener la fila como un array asociativo
        $fila = mysqli_fetch_assoc($result);
        if ($fila) {
            $grado = $fila['usuario'];
        }}

    $query = "INSERT INTO estudiantes (id_estudiantes,nombre,apellidos,edad,grado) 
    VALUES ('$id_estudiante','$nombre','$apellidos','$edad','$grado')";
    $result = mysqli_query($conexion,$query);


    $_SESSION['message'] = "Registro de Estudiante Guardado";

    if(!$result){
        die("Query Failed");
    }

    header("Location: ../vista/crear_alumno.php");
}
?>