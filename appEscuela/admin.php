<?php
 include "header.php";
 include "nav_admin.php";
 session_start();

 if( !isset($_SESSION['usuario']) || $_SESSION['usuario'] != "admin") {
  header('Location: index.php');
 }
?>

<br>
<div class="container">
    <center>
        <h1 class="tipo-letra">¡Bienvenido, @<?= $_SESSION['usuario'] ?>!</h1>
    </center>
    <br>
    <div class="container-fluid d-flex align-items-center justify-content-between pelis">               
        <div class="ms-auto text-center col-4">
            <a href="vista/crear_profesor.php" class="btn btn-primary"><strong>+</strong><i class="bi bi-file-earmark-person-fill"></i> Añadir profesor </a>

            <a href="controlador/logout_controlador.php" class="btn btn-danger"><i class="bi bi-box-arrow-in-left"></i> Cerrar sesión </a>
        </div>
        
    </div>
    <br>
    <br>
    <div class="p-2 mb-3">
        <h1 >Tabla administrativa </h1>
        <h6 class="fst-italic fw-bold">(Docentes)</h6>
    </div>
    <table class="table table-hover table-striped-columns">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "./modelo/conexion.php";
            
            $query_login = "SELECT * FROM login WHERE usuario != 'admin'";

            $result_login = mysqli_query($conexion, $query_login);

            while($log = mysqli_fetch_array($result_login)) { ?>
            <tr>
                <!--  -->
                <td><?= $log['nombres'] ?></td>
                <td><?= $log['apellidos'] ?></td>
                <td><?= $log['usuario'] ?></td>
                <td><?= $log['contrasena'] ?></td>
                <td>
                    <div class="dropdown text-center">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acciones
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="vista/editar_teacher.php?id=<?= $log['id_login'] ?>"><i class="bi bi-pencil-square"></i> Editar</a></li>
                            <li><a class="dropdown-item"
                                    href="controlador/delete_teacher.php?id=<?= $log['id_login'] ?>"><i class="bi bi-trash"></i> Eliminar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
include "footer.php";
?>