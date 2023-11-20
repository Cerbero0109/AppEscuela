<?php
include '../modelo/conexion.php';
if(isset($_POST['crear_profe'])){

    
    $nombre = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $especialidad = $_POST['especialidad'];
    $area_interes = $_POST['area_interes'];
    $correo = $_POST['correo'];
    

    $query = "INSERT INTO login (nombres,apellidos,usuario,contrasena,especialidad,area_interes,correo) 
    VALUES ('$nombre','$apellidos','$usuario','$contrasena','$especialidad','$area_interes','$correo')";
    $result = mysqli_query($conexion,$query);


    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = "Profesor registrado";

    header("Location: ../vista/crear_profesor.php");
}
?>