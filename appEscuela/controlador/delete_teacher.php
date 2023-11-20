<?php
   if ( isset($_GET['id']) ) {
      include('../modelo/conexion.php'); // $conexion
      $id_login = $_GET['id'];

      $query = "DELETE FROM login WHERE id_login = '$id_login';";

      echo $query;

      $result = mysqli_query($conexion, $query);

      if(!$result) {
         die("Ocurrió un error al intentar eliminar.");
      }
   }
   header('Location: ../admin.php');
?>
