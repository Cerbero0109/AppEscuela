<?php
include 'header.php';
include 'navbar.php';
include 'modelo/conexion.php';
session_start();


// Antes de ejecutar la consulta para obtener la información del usuario
if (!isset($_SESSION['id_login'])) {
    // Redirige a la página de inicio de sesión si el usuario no ha iniciado sesión
    header('Location: login.php');
    exit();
}

// Utiliza el ID del usuario almacenado en la sesión para obtener la información del usuario
$usuario_id = $_SESSION['id_login'];
$query = "SELECT * FROM login WHERE id_login = '$usuario_id'";
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
                    <img src="vista/img/usuarios.png" class="img-fluid mx-auto d-block rounded"
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

                <a href="controlador/logout_controlador.php" class="btn btn-danger">
                    <img src="vista/img/salida.png" class="img-fluid" style="width: 25px; height: auto;" alt="">
                    Cerrar sesión
                </a>
                <!-- Agrega más información del docente aquí -->
            </div>

            <!-- Cuerpo del index -->

            <div class="col-md-6 col-sm-12 p-4">
                <h3 class="p-1 text-center">¡Bienvenido, <?php echo $row['nombres'] ?>!</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <a href="vista/vista_alumnos.php" class="btn"><img src="vista/img/Alumnos.png"
                                class="img-fluid rounded w-75" alt=""></a>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a href="vista/horario.php" class="btn "><img src="vista/img/Horario.png"
                                class="img-fluid rounded w-75" alt=""></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>




<?php
include 'footer.php';
?>