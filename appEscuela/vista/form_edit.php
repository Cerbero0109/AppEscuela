<?php
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include '../controlador/edit_student.php';
?>

<section class="bg-primary">
    <div class="container p-4">
        <h1 class="text-center mb-5">Editar Registro</h1>
        <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="../controlador/edit_student.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group p-3">
                        <p>Nombre del alumno: </p>
                        <input type="text" name=nombre value="<?php echo $nombre;?>" class="form-control">
                    </div>
                    <div class="form-group p-3">
                        <p>Apellido del alumno: </p>
                        <input type="text" name=apellidos value="<?php echo $apellidos;?>" class="form-control">
                    </div>
                    <div class="form-group p-3">
                        <p>Edad del alumno: </p>
                        <input type="text" name=edad value="<?php echo $edad;?>" class="form-control">
                    </div>
                    <div class="form-group p-3">
                        <p>Grado del alumno: </p>
                        <input type="text" name=grado value="<?php echo $grado;?>" class="form-control">
                    </div>
                    <button  class="btn btn-success ms-3" name="update">Actualizar</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</section>