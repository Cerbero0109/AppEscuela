<?php 
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
if(isset($_GET['id'])){
    $id_estudiante = $_GET['id'];
    $query = "SELECT * FROM estudiantes WHERE id_estudiantes = $id_estudiante";
    $reultado = mysqli_query($conexion,$query);

    if(mysqli_num_rows($reultado)==1){
        $row = mysqli_fetch_array($reultado);
        $nombre = $row['nombre'];
    }
}

if (isset($_GET['nombre_materia'])) {
    $nombre_materia = urldecode($_GET['nombre_materia']);
}


function imprimirValoresTrimestres() {
    if (isset($_GET['trim1'])) {
        $trim1 = urldecode($_GET['trim1']);
        echo $trim1;
    }
    if (isset($_GET['trim2'])) {
        $trim2 = urldecode($_GET['trim2']);
        echo  $trim2;
    }
    if (isset($_GET['trim3'])) {
        $trim3 = urldecode($_GET['trim3']);
        echo $trim3;
    }
}

?>


<form action="../controlador/guardar_notas_controlador.php" method="POST">

    <section class="bg-primary">
        <div class="text-center">
            <div class="p-3">
                <h1><?php imprimirValoresTrimestres(); ?></h1>
            </div>
        </div>
    </section>



    <section>
        <div class="container mt-3 pb-3">
            <h5 class="text-dark">NIE: <?php echo $row['id_estudiantes'] ?> </h5>
            <h5 class="text-dark">Estudiante: <?php echo $row['nombre'] ?> <?php echo $row['apellidos'] ?></h5>
            <h5 class="text-dark">Materia: <?php echo $nombre_materia ?></h5>
            <h5 id="fecha"></h5>
        </div>

        <div class="container">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>
                            <h5>Porcentaje</h5>
                        </th>
                        <th>
                            <h5>Nota</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            <h5>20%</h5>
                        </td>
                        <td>
                            <input type="number" min="0" max="10" step="0.01" id="valor1">
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <h5>20%</h5>
                        <td>
                            <input type="number" min="0" max="10" step="0.01" id="valor2">
                        </td>
                    </tr>

                    <tr class="text-center">
                        <td>
                            <h5>25%</h5>
                        </td>
                        <td>
                            <input type="number" min="0" max="10" step="0.01" id="valor3">
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <h5>35%</h5>
                        </td>
                        <td>
                            <input type="number" min="0" max="10" step="0.01" id="valor4">
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <h5>Promedio</h5>
                        </td>
                        <td>
                            <h5><span id="resultado"></span></h5>
                        </td>
                    </tr>
                </tbody>
            </table>


            <h5 class="mt-4 mb-3">Estado: <span id="estado"></span></h5>

            <input class="btn btn-success mt-3 mb-5" type="button" value="Calcular Promedio"
                onclick="calcularPromedio()">


            <input class="btn btn-warning mt-3 mb-5" type="submit" value="Registrar">                    

            <input type="hidden" name="promedio" id="promedio">
            <input type="hidden" name="estados" id="estados">
            <input type="hidden" name="id_estudiante" value="<?php echo $id_estudiante; ?>">
            <input type="hidden" name="materia" value="<?php echo $nombre_materia; ?>">
            <input type="hidden" name="trimestre" value="<?php echo imprimirValoresTrimestres(); ?>">



        </div>
    </section>
</form>

<script>
function calcularPromedio() {
    // Obtener los valores de los input
    var valor1 = parseFloat(document.getElementById("valor1").value);
    var valor2 = parseFloat(document.getElementById("valor2").value);
    var valor3 = parseFloat(document.getElementById("valor3").value);
    var valor4 = parseFloat(document.getElementById("valor4").value);

    // Verificar que los valores sean números válidos
    if (!isNaN(valor1) && !isNaN(valor2) && !isNaN(valor3) && !isNaN(valor4)) {
        // Calcular el promedio
        var promedio = (valor1 * 0.20) + (valor2 * 0.20) + (valor3 * 0.25) + (valor4 * 0.35);
        document.getElementById("promedio").value = promedio.toFixed(2);
        document.getElementById("resultado").textContent = promedio.toFixed(2);

        if (promedio >= 5.0) {
            document.getElementById("estado").textContent = "Aprobado";
            document.getElementById("estados").value = "Aprobado";
        } else {
            document.getElementById("estado").textContent = "Reprobado";
            document.getElementById("estados").value = "Aprobado";
        }
    } else {
        alert("Por favor, ingrese valores numéricos válidos.");
    }
}
</script>


<script>
function mostrarFecha() {
    // Obtén la fecha actual
    var fechaActual = new Date();

    // Formatea la fecha como desees
    var opcionesFecha = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var fechaFormateada = fechaActual.toLocaleDateString('es-ES', opcionesFecha);

    document.getElementById('fecha').innerHTML = 'Fecha Actual: ' + fechaFormateada;
}

mostrarFecha();
</script>
<?php
include ('footer.php');
?>