<?php
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include '../controlador/edit_student.php';
?>
<section class="text-dark p-5 ">
    <div class="container-fluid text-center mx-auto bg-dark">
        <h1><span class="text-warning ">Listado de Alumnos </span></h1>
        <p class="lead text-white p-2 mb-3">
            A continuación podrá editar la informacion de un alumno inscrito, <br> primero busquelo por su NIE y luego
            cambie los datos que desee.
        </p>
    </div>
</section>


<div class="container mt-5 mb-5">
    <!--Seccion Tabla de Datos-->
    <a href="vista_alumnos.php" class="btn btn-secondary mb-3">Regresar</a>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIE</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $query = "SELECT * FROM estudiantes";
                        $resultado = mysqli_query($conexion,$query);

                        while($row = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $row['id_estudiantes'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['apellidos'] ?></td>
                    <td><?php echo $row['edad'] ?></td>
                    <td><?php echo $row['grado'] ?></td>
                    <td>
                        <a href="form_edit.php?id=<?php echo $row['id_estudiantes']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>

                        <a href="../controlador/delete_student.php?id=<?php echo $row['id_estudiantes']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        <a href="form_boleta.php?id=<?php echo $row['id_estudiantes']?>" class="btn btn-success">
                        <i class="bi bi-filetype-pdf"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php
include 'footer.php';
?>