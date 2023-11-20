<?php 
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
?>
<section class="bg-primary p-5">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="me-5">
                        <h1 class="text-light">Listado de Materias</h1>
            </div>
         </div>
    </section>

    <div class="container mt-5 mb-5">
        <div class="container p-2">
            <a href="../index.php" class="btn text-white fw-bold btn-dark">Regresar</a>
        </div>
         <!--Seccion Tabla de Datos-->
         <div class="col-md-12">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM materias";
                        $resultado = mysqli_query($conexion,$query);

                        while($row = mysqli_fetch_array($resultado)){ ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td>
                        <a href="lista_de_notas.php?id=<?php echo $row['id_materia']?>" name="save" class="btn btn-success">
                        <i class="fa fa-check-square" aria-hidden="true"><span class="ms-1">Ir</span></i>
                        </a>    
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
<?php
include ('footer.php');
?>