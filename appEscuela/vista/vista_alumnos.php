<?php 
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
session_start();


    
    $query = "SELECT nombres, apellidos, especialidad, area_interes, correo FROM login";
    $resultado = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($resultado);



?>
<div class="d-flex align-items-center justify-content-center" style="min-height: 75vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <!-- Columna izquierda con información del docente -->
            <div class="col-md-4 col-sm-12 p-4" style="background-color: #FFFFFF;">            
                <h3 class="text-center fw-bold mb-4">CENTRO ESCOLAR <br> CASERÍO LAS COLINAS</h3>
                <div class="mb-2">
                    <img src="img/usuarios.png" class="img-fluid mx-auto d-block rounded"
                        style="width: 100px; height: auto;" alt="">
                </div>
                <div class="text-center p-2">
                    <h3><?php echo $row['nombres'] ?> <?php echo $row['apellidos'] ?></h3>
                </div>
                <hr style="height: 5px; background-color: #333;">
                <h3 class="text-center p-2">Información del Docente</h3>
                <p class="lead"> <strong>Especialidad:</strong> <?php echo $row['especialidad'] ?></p>
                <p class="lead"><strong>Área de interés:</strong> <?php echo $row['area_interes'] ?></p>
                <p class="lead"><strong>Correo electrónico:</strong> <?php echo $row['correo'] ?></p>

                <a href="../controlador/logout_controlador.php" class="btn btn-danger">
                    <img src="img/salida.png" class="img-fluid" style="width: 25px; height: auto;" alt="">
                    Cerrar sesión
                </a>
                <!-- Agrega más información del docente aquí -->
            </div>

            <!-- Cuerpo del index -->
            <!-- Columna derecha con secciones para otras páginas -->
            <div class="col-md-8 col-sm-12 p-4">
                <h3 class="p-1 text-start">Elije una opción</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <a href="crear_alumno.php" class="btn btn-block"><img src="img/agregar _Alumos.png"
                                class="img-fluid w-50 rounded" alt=""></a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="listado_materias.php" class="btn btn-block"><img src="img/Calificaciones.png"
                                class="img-fluid w-50 rounded" alt=""></a>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="editar_alumno.php" class="btn btn-block"><img src="img/listado.jpeg"
                                class="img-fluid w-50  rounded" alt=""></a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 col-sm-12">
                        <a class="btn mt-4 p-2 btn-warning btn-block" href="../index.php">Ir al inicio <i
                                class="bi bi-arrow-left-circle-fill"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include ('footer.php');
?>