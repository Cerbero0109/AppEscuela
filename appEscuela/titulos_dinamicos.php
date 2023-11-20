<?php
// Define un arreglo asociativo que mapea las páginas a sus títulos correspondientes
$titulos = array(    
    'login.php' => 'Inicio de sesión - AppEscuela',   
    'admin.php' => 'Inicio - AppEscuela',
    'index.php' => 'Inicio - AppEscuela',
    
);


// Obtiene el nombre del archivo actual (la página actual)
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Determina el título correspondiente según la página actual
$titulo_actual = isset($titulos[$pagina_actual]) ? $titulos[$pagina_actual] : 'AppEscuela';

?>