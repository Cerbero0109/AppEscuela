<?php
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include '../controlador/create_student.php';

?>

<section class="text-dark p-5 ">
    <div class="container-fluid text-center">
        <h1><span class="text-warning">Listado de Alumnos </span></h1>
        <p class="lead my-4">
            A continuacion ingrese la informacion necesaria <br>para agregar un nuevo alumno al listado.
        </p>
    </div>
</section>

<div class="container container-fluid p-4">
    <div class="row">
        <!--Seccion de Tarjeta de Guardado-->
        <div>
            <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); } ?>
            <form class="row" action="../controlador/create_student.php" method="POST">

                <div class="col-md-6 p-3">
                    <input type="text" name="NIE" class="form-control" placeholder="NIE" autofocus>
                </div>
                <div class="col-md-6 p-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombres" autofocus>
                </div>
                <div class="col-md-6 p-3">
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" autofocus>
                </div>

                <div class="col-md-6 p-3">
                    <input type="text" name="edad" class="form-control" placeholder="Edad" autofocus>
                </div>
                <div class="col-md-6 p-3">
                    <input type="text" name="grado" class="form-control" placeholder="Grado" autofocus>
                </div>

                <div class="col-md-10">
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                    <a class="btn btn-warning btn-block" href="vista_alumnos.php">Regresar <i
                            class="bi bi-arrow-left-circle-fill"></i></a>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include ('footer.php');
?>