<?php 
include("../controlador/obtener_id_materia.php");
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM materias WHERE id_materia = $id";
    $reultado = mysqli_query($conexion,$query);

    if(mysqli_num_rows($reultado)==1){
        $row = mysqli_fetch_array($reultado);
        $nombre_materia = $row['nombre'];
    }
}

$trim1 = "TRIMESTRE I";

$trim2 = "TRIMESTRE II";

$trim3 = "TRIMESTRE III";

?>


<section class="bg-primary p-5">
    <div class="container">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center">
                <div class="me-5">
                    <h1 class="text-light">Registro de Notas</h1>
                    <h2 class="text-light"><?php echo $row['nombre'] ?></h2>
                </div>
                <img src="img/Cursos.png " width="100px">
            </div>
        </div>
    </div>
</section>

<div class="container mt-5 mb-5">

    <!--Seccion Tabla de Datos-->
    <div class="col-md-12">
        <div class="container p-2">
        <a class="btn btn-warning text-white fw-bold" href="listado_materias.php">Regresar</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIE</th>
                    <th>Nombre Completo</th>
                    <th>Trimestre I</th>
                    <th>Trimestre II</th>
                    <th>Trimestre III</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $query = "SELECT * FROM estudiantes";
                        $resultado = mysqli_query($conexion,$query);

                        while($row = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $row['id_estudiantes'] ?> </td>
                    <td><?php echo $row['nombre'] ?> <?php echo $row['apellidos']?></td>
                    <td>
                        <a href="trimestre.php?id=<?php echo $row['id_estudiantes']?>&nombre_materia=<?php echo urlencode($nombre_materia);?>&trim1=<?php echo urlencode($trim1);?>" class="btn btn-secondary">
                            Registrar
                        </a>
                    </td>
                    <td>
                        <a href="trimestre.php?id=<?php echo $row['id_estudiantes']?>&nombre_materia=<?php echo urlencode($nombre_materia);?>&trim2=<?php echo urlencode($trim2);?>" class="btn btn-secondary">
                            Registrar
                        </a>
                    </td>
                    <td>
                    <a href="trimestre.php?id=<?php echo $row['id_estudiantes']?>&nombre_materia=<?php echo urlencode($nombre_materia);?>&trim3=<?php echo urlencode($trim3);?>" class="btn btn-secondary">
                            Registrar
                        </a>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    <?php
include ('footer.php');
?>