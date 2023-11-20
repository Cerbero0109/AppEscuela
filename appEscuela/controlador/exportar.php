<?php
include '../modelo/conexion.php';
// Consulta SQL para obtener el horario desde la base de datos
$query = "SELECT d.nombre_dia, h.clase, h.hora_inicio, hora_fin FROM horario_escolar h INNER JOIN dias_semana d on h.horario_id = d.dia_id";
// Ejecuta la consulta
$resultado = $conexion->query($query);

// Nombre del archivo CSV de salida
$archivo_csv = 'horario_clases.csv';

// Abre el archivo CSV en modo escritura
$fp = fopen($archivo_csv, 'w');

// Escribe el encabezado en el archivo CSV
fputcsv($fp, array(' Dia ', ' Hora de inicio ', ' Hora de fin ', ' Materia '));

// Escribe los datos del horario en el archivo CSV
while ($fila = $resultado->fetch_assoc()) {
    // Combina los valores con tabulaciones
    $fila_csv = implode("\t", $fila);
    // Escribe la fila en el archivo CSV
    fputs($fp, $fila_csv . "\n");
}

// Cierra el archivo CSV
fclose($fp);

// Descarga el archivo CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="' . $archivo_csv . '"');
readfile($archivo_csv);
?>
