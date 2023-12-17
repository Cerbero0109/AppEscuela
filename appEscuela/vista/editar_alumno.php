<?php
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include '../controlador/edit_student.php';

session_start(); 
$usuario_id = $_SESSION['id_login'];
$query = "SELECT usuario FROM login WHERE id_login = '$usuario_id'";
$result = mysqli_query($conexion, $query);

if ($result) {
    $fila = mysqli_fetch_assoc($result);
    if ($fila) {
        $grado = $fila['usuario'];
    }}
?>
<section class="text-dark">
    <div class="container-fluid text-center mx-auto bg-dark pt-3 pb-3">
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
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Edad</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $query = "SELECT * FROM estudiantes WHERE grado = '$grado' ORDER BY apellidos ASC";
                        $resultado = mysqli_query($conexion,$query);

                        while($row = mysqli_fetch_array($resultado)){ ?>
                <tr>
                    <td><?php echo $row['id_estudiantes'] ?></td>
                    <td><?php echo $row['apellidos'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['edad'] ?></td>
                    <td><?php echo $row['grado'] ?></td>
                    <td>
                        <a href="form_edit.php?id=<?php echo $row['id_estudiantes']?>" class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                        </a>

                        <a href="../controlador/delete_student.php?id=<?php echo $row['id_estudiantes']?>"
                            class="btn btn-danger btnEliminar">
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
<script>
(function() {

    const btnEliminar = document.querySelectorAll(".btnEliminar");

    btnEliminar.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const confirmacion = confirm('¿Seguro de eliminar el curso?');
            if (!confirmacion) {
                e.preventDefault();
            }
        });
    });

})();
</script>
<?php
include 'footer.php';
?>