<?php
 session_start(); 
 require_once "Conexion.php";
 require_once "Funciones.php";

 if (isset($_SERVER['HTTP_REFERER'])) {
  $ub=$_SERVER['HTTP_REFERER'];
  echo "<script>console.log( 'Ubicacion Anterior: " . $ub . "' );</script>";
 }   
?>

<html>
 <head> 
  <?php include "Head.html"; ?>        
 </head>    
 <body>
  <?php include "Menu.php"; ?>
 </body>
</html>