<?php 
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
?>

<div class="container-fluid mt-5 horario">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mt-3 text-white mb-4">CREA TU HORARIO</h2>
            <hr class="text-white fw-bold">
            <!-- Formulario -->
            <form method="POST" action="../controlador/agregar_Horario.php" class=" text-white fw-bold">
                <!-- Días de la semana -->
                <div class="form-group">
                    <label for="day">Día de la Semana</label>
                    <select class="form-control" required id="day" name="dia_id">
                        <option value="" selected>-- Seleccione un día --</option>
                        <?php 
                                    $query_dia = "SELECT * FROM dias_semana;";
                                    $result_dias = mysqli_query($conexion, $query_dia);
                                    while ($dias = mysqli_fetch_array($result_dias)) {
                                 ?>
                        <option value="<?= $dias['dia_id'] ?>"><?= $dias['nombre_dia'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Hora de inicio y final -->
                <div class="form-group">
                    <label for="startTime">Hora de Inicio</label>
                    <input required name="hInicio" type="time" class="form-control" id="startTime">
                </div>
                <div class="form-group">
                    <label for="endTime">Hora de Finalización</label>
                    <input required name="hFin" type="time" class="form-control" id="endTime">
                </div>
                <!-- Materia y aula -->
                <div class="form-group">
                    <label for="subject">Materia</label>
                    <input required name="clase" type="text" class="form-control" id="subject">
                </div>

                <!-- Botón para agregar clase -->
                <div class="mt-4">
                    <button class="btn btn-warning" name="crear_horario" value="ok" type="submit">Guardar
                        Horario</button>
                </div>
            </form>


            <!-- Tabla para mostrar el horario -->
            <div class=" mt-4 text-white">
                <h3>Horario</h3>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Hora de Inicio</th>
                            <th>Hora de Finalización</th>
                            <th>Materia</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTable">
                        <?php
                    $query_horario = "SELECT * FROM horario_escolar h INNER JOIN dias_semana d on h.horario_id = d.dia_id";
                    $result_horario = mysqli_query($conexion, $query_horario);

                    while($horarios = mysqli_fetch_array($result_horario)) { ?>
                        <tr>
                            <!-- Tabla contenido -->
                            <td>
                                <?= $horarios['nombre_dia'] ?>
                            </td>
                            <td><?= $horarios['hora_inicio'] ?></td>
                            <td><?= $horarios['hora_fin'] ?></td>
                            <td><?= $horarios['clase'] ?></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Botón para imprimir horario -->
            <div class="p-2 mb-3">
                <a href="../controlador/exportar.php" class="btn btn-primary">Descargar Horario CSV</a>
            </div>
        </div>
    </div>
</div>

<?php
include ('footer.php');
?>