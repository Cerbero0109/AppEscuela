<?php
include 'header.php';
include 'navbarV.php';
?>

<div class="container container-fluid mt-5">
    <h1>AGREGAR DOCENTES</h1>
    <form method="POST" action="../controlador/create_teacher.php" class="row">
        
        <div class="mb-3 col-md-6">
            <label for="nombres" class="form-label">Nombres</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese su nombre">
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="apellido" class="form-label">Apellidos</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese su apellido">
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="usuario" class="form-label">Usuario</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-person-circle"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa su usuario">
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="contrasena" class="form-label">Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingresa su contraseña">
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="especialidad" class="form-label">Especialidad</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-layers"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Ingrese su especialidad">
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="area_interes" class="form-label">Area de intereses</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-textarea-resize"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="area_interes" name="area_interes" placeholder="Ingrese sus áreas de interes">
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="correo" class="form-label">Correo</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="bi bi-envelope-at-fill"></i>
                    </span>
                </div>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo">
            </div>
        </div>

        <div class="col-12 mb-4">
            <button type="submit" name="crear_profe" class="btn btn-success">Agregar <i class="bi bi-person-fill-add"></i></button>
            <a href="../admin.php" class="btn btn-secondary ml-2">Regresar <i class="bi bi-arrow-return-left"></i></a>
        </div>

    </form>
</div>


<?php
include 'footer.php';
?>