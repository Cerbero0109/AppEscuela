<?php 
include "../modelo/conexion.php";   
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM estudiantes WHERE id_estudiantes = $id";
        $reultado = mysqli_query($conexion,$query);

        if(!$reultado){
            die("Query Fallo");
        }

        header("Location: ../vista/editar_alumno.php");  
    }

?>