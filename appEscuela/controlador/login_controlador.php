<?php 
session_start();


if (isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../modelo/conexion.php');  // $conexion

    // Obtiene los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Verifica las credenciales de inicio de sesión
    $query = "SELECT * FROM login WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = mysqli_query($conexion, $query);
    $usuario = mysqli_fetch_assoc($result);

    // Después de verificar las credenciales y antes de redirigir
if ($usuario['contrasena'] == $contrasena) {
  $_SESSION['id_login'] = $usuario['id_login'];
  header('Location: ../admin.php');
} else {
  $_SESSION['error_message'] = "Datos de inicio de sesión incorrectos";
  header('Location: ../login.php');
  exit();
}

   
    if ($usuario['contrasena'] == $contrasena) {
      $_SESSION['usuario'] = $usuario['usuario'];
      header('Location: ../admin.php?id_login=' . $usuario['id_login']);

    } else {
      $_SESSION['error_message'] = "Datos de inicio de sesión incorrectos";
    header('Location: ../login.php'); // Redirige de nuevo a la página de inicio de sesión
    exit();
    }
   }
?>