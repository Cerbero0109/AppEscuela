<?php
$titulos = array(        
    'crear_alumno.php' => 'Agregar - AppEscuela',
    'editar_alumno.php' => 'Listado - AppEscuela',
    'form_edit.php' => 'Editar - AppEscuela',
    'trimestre.php' => 'Notas - AppEscuela',
    'lista_de_notas.php' => 'Registro - AppEscuela',
    'listado_materias.php' => 'Materias - AppEscuela',
    'vista_alumnos.php' => 'Inicio - App Escuela',
    'horario.php' => 'Horario - AppEscuela',
    'boleta_generica.php' => 'Boleta de Notas - App Escuela',
    'form_boleta.php' => 'Generar Boleta - App Escuela',
    'crear_profesor.php' => 'Añadir - AppEscuela',
    'editar_teacher.php' => 'Modificar - AppEscuela',
    
);
$pagina_actual = basename($_SERVER['PHP_SELF']);
$titulo_actual = isset($titulos[$pagina_actual]) ? $titulos[$pagina_actual] : 'AppEscuela';

?>