<?php 
include 'header.php';
include 'navbarV.php';
include '../modelo/conexion.php';
include 'titulos_dinamicos.php';


if (isset($_POST['nombre']) ){
    $nombre = $_POST['nombre']; 
    $apellidos = $_POST['apellidos'];
    $grado = $_POST['grado'];    
    $id_estudiante = $_GET['id'];
}


if (isset($_POST['miComboBox'])) {
    $trimestre = $_POST['miComboBox'];
}

?>
<!DOCTYPE html>
<html lang="es">

    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .boletin {
        width: 80%;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    @media print {
            .btn-izquierda {
                display: none;
            }
            
    }
    </style>
</head>

<body>

    <div class="boletin">
        <h1><strong>Boletín de Notas</strong></h1>
        <h1 class="fw-bold"><?php echo $trimestre ?></h1>
        <h3><strong>Nombre:</strong> <?php echo $nombre;?> <?php echo $apellidos; ?></h3>
        <h3><strong>Grado:</strong> <?php echo $grado;?> grado </h3>
        <table>
            <tr>
                <th>Materia</th>
                <th>Promedio</th>
                <th>Estado</th>
            </tr>
            <tr>
                <?php
                    $query = "SELECT materia, promedio, estado FROM `notas` WHERE  trimestre = '$trimestre' AND id_estudiantes= $id_estudiante;";
                    $result = mysqli_query($conexion, $query);
                
                    while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['materia'] ?></td>
                <td><?= $row['promedio'] ?></td>
                <td><?= $row['estado'] ?></td>
            </tr>

            <?php endwhile; ?>


            </tr>

        </table>        

        <div class="mt-2 p-3 text-start">
            <button class="btn btn-primary btn-izquierda" onclick="imprimirPagina()">Imprimir Boleta</button>
            <a href="../index.php" class="btn btn-danger">Ir al Inicio</a>
        </div>
    </div>
    <script>
        // Función para imprimir la página
        function imprimirPagina() {
            window.print();
        }
    </script>
</body>

</html>