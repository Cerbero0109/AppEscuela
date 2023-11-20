<?php
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include '../controlador/edit_student.php';

$trim1 = "TRIMESTRE I";
$trim2 = "TRIMESTRE II";
$trim3 = "TRIMESTRE III";

?>

<section class="bg-dark">
    <div class="container p-4">
        <h1 class="text-center text-white mb-5">Boleta de Notas</h1>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="boleta_generica.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group p-3">
                                    <p>Nombres</p>
                                    <input disabled type="text" name="nombre" value="<?php echo $nombre;?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group p-3">
                                    <p>Apellidos</p>
                                    <input disabled type="text" name="apellidos" value="<?php echo $apellidos;?>"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-3">
                            <p>Grado del alumno: </p>
                            <input disabled type="text" name="grado" value="<?php echo $grado;?>" class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <p>Trimestre cursado: </p>
                            <select required  class="form-select" name="miComboBox">
                                <option value="" disabled selected>Seleccione su opción</option>
                                <option value="TRIMESTRE I">Trimestre I</option>
                                <option value="TRIMESTRE II">Trimestre II</option>
                                <option value="TRIMESTRE III">Trimestre III</option>
                            </select>

                        </div>
                        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                        <input type="hidden" name="apellidos" value="<?php echo $apellidos; ?>">
                        <input type="hidden" name="grado" value="<?php echo $grado; ?>">
                        <input type="hidden" name="prueba" value="<?php echo $_GET['id']?>">



                        
                            <input class="btn btn-success text-center" type="submit" value="Guardar">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>