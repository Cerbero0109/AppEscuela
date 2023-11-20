<?php
include 'header.php'; 
include 'navbarV.php';
include('../modelo/conexion.php');
include('../controlador/edit_teacher.php');
session_start();

if( !isset($_SESSION['usuario']) || $_SESSION['usuario'] != "admin") {
    header('Location: ../login.php');
}
    $id=$_GET["id"];
    $edit_sql = "select * from login where id_login=$id;";
    $edit_result=mysqli_query($conexion, $edit_sql);

?>
<div class="container mt-5">
    <h1>EDITAR MAESTRO</h1>
    <form action="../controlador/edit_teacher.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <div class="mb-3">
            <input type="hidden" name="id_pelicula" value="<?= $_GET["id"] ?>">
            <label for="nombres" class="form-label">Nombres</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombres" value="<?php echo $nombre;?>"
                    placeholder="Ingresa nuevo nombre">
            </div>
        </div>

        <!-- Campo de Apellido -->
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellidos</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="apellido" name="apellidos" value="<?php echo $apellidos;?>"
                    placeholder="Ingresa tu apellido">
            </div>
        </div>

        <!-- Campo de Contraseña -->
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="contrasena" name="contrasena"
                    value="<?php echo $contrasena;?>" placeholder="Ingresa tu contraseña">
            </div>
        </div>

        <!-- Campo de Usuario -->
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario;?>"
                    placeholder="Ingresa tu usuario">
            </div>
        </div>

        <div class="p-2 mb-3">
            <!-- Botón de Envío -->
            <button type="submit" name="actualizar_profe" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>