<?php
include '../modelo/conexion.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM materias WHERE id_materia = $id";
    $reultado = mysqli_query($conexion,$query);

    if(mysqli_num_rows($reultado)==1){
        $row = mysqli_fetch_array($reultado);
        $nombre = $row['nombre'];
    }
}
?>