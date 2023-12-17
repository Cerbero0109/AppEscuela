<?php
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include '../controlador/create_student.php';


session_start();  
$usuario_id = $_SESSION['id_login'];
$query = "SELECT usuario FROM login WHERE id_login = '$usuario_id'";
$result = mysqli_query($conexion, $query);


if (isset($_SESSION['message'])) { 
    ?>
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    unset($_SESSION['message']);
}

if ($result) {
    $fila = mysqli_fetch_assoc($result);
    if ($fila) {
        $grado = $fila['usuario'];
    }}

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
            <form class="row" action="../controlador/create_student.php" method="POST" onsubmit="return validarFormulario()">
                <div class="col-md-6 p-3">
                    <input type="text" name="NIE" id="NIE" class="form-control" placeholder="NIE" autofocus>
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
                    <input type="text" name="grado" class="form-control" 
                     placeholder="Grado" autofocus value=<?php echo $grado ?> disabled>
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

<script>
function validarFormulario() {
    var nieInput = document.getElementById("NIE");
    var nieValor = nieInput.value;
    if (nieValor.length === 8) {
        return true;
    } else {
        alert("El NIE debe tener exactamente 8 caracteres.");
        return false;
    }
}
</script>

<?php
include ('footer.php');
?>