<?php

include "header.php";
include "modelo/conexion.php";
session_start();

if(isset($_SESSION['usuario'])) {
    if($_SESSION['usuario'] === 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: index.php');
    }
} else { ?>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg w-100 navbar-light bg-light" id="navDesignLogin">

    <div class="col-8 ps-5">
        <a class="navbar-brand" href="login.php">
            <img src="vista/img/mined.png" style="width: 200px; height: 90px;" alt="">
        </a>
    </div>    
</nav>

<section class="container-fluid" style="background-color: #fff;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-10">
                <div class="card rounded-3 text-black" style="background-color: #E7E7E7;">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center img-fluid">
                                    <img src="vista/img/mined.png" style="width: 350px;"  alt="logo">

                                </div>
                                <?php

if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Borra el mensaje de error después de mostrarlo
}
?>

                                <form action="controlador/login_controlador.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo electrónico</label>
                                        <input type="email" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Ingresa un correo electronico" name="correo" required>

                                    </div>
                                    <div class="form-group my-3">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" placeholder="Ingresa tu contraseña"
                                            name="contrasena" required>
                                        <small class="form-text text-muted">Tú contraseña nunca será
                                            compartida</small>
                                    </div>
                                    <button type="submit" class="btn btn-secondary my-3">Iniciar
                                        sesión</button>
                                </form>

                            </div>
                        </div>
                        <div class=" col-lg-6 d-flex align-items-center bloqueInfo" id="sBloqueLogin">
                            <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4 text-white fw-bold text-center">CENTRO ESCOLAR <br>CASERÍO LAS COLINAS</h4>
                                <p class="fs-4 mb-0 text-center text-white">En nuestra escuela, creemos en el poder de la educación para transformar vidas. Nuestros maestros apasionados están comprometidos en guiar y nutrir las mentes jóvenes, inspirándolas a alcanzar sus sueños más audaces. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
}
include 'footer.php';

?>