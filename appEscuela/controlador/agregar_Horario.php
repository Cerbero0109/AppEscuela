<?php
include '../modelo/conexion.php';
if (!empty($_POST['crear_horario'])){
    if (!empty($_POST['dia_id']) and !empty($_POST['hInicio']) and !empty($_POST['hFin']) and !empty($_POST['clase'])){
    $dia_id=$_POST['dia_id'];
    $hInicio=$_POST['hInicio'];
    $hFin=$_POST['hFin'];
    $clase = $_POST['clase'];
    
    $sql=$conexion->query("insert into horario_escolar (dia_id, hora_inicio, hora_fin, clase)VALUES ('$dia_id', '$hInicio', '$hFin', '$clase')");    
    
    if ($sql==1) {
        # code...
        echo '<div class="alert alert-success">Horario registrado correctamente</div>';
        header('Location: ../vista/horario.php');
    } else {
        # code...
        echo '<div class="alert alert-danger">Horario no registrado</div>';
    } 
}
}

    


?>