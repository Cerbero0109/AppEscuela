<?php 

include("../modelo/conexion.php");

if (isset($_POST['promedio'])) {
    $promedio = $_POST['promedio'];
    $id_estudiante = $_POST['id_estudiante'];
    $nombre_materia = $_POST['materia'];
    $trimestre = $_POST['trimestre'];
    $estado = $_POST['estados'];


    $query = "INSERT INTO notas (materia,trimestre,promedio,id_estudiantes,estado) 
    VALUES ('$nombre_materia','$trimestre','$promedio','$id_estudiante','$estado')";
    $result = mysqli_query($conexion,$query);


    if(!$result){
        die("Query Failed");
    }

if($nombre_materia == "Lenguaje"){
    $id=1;
} elseif($nombre_materia == "Ciencias"){
    $id=2;
} elseif($nombre_materia == "Sociales"){
    $id=3;
} elseif($nombre_materia == "Matematicas"){
    $id=4;
} elseif($nombre_materia == "Ingles"){
    $id=5;
}

header("Location: http://localhost/appEscuela/vista/lista_de_notas.php?id=" . $id);


} else {

}
?>