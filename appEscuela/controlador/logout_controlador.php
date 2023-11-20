<?php
    // Inicia la sesión (si aún no se ha iniciado)
    session_start();

    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión

    // Redirige al usuario a la página de inicio de sesión
    header('Location: ../login.php');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    exit;
?>