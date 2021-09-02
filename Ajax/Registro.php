<?php 
 require_once "../Libs/Conexion.php";
 require "../Libs/Funciones.php";
 session_start();
?>

<?php
 if ($_POST['Action']=='Usuaris') {
  $Usuario = $_POST['sNombreUsuario'];
  $sqlb = "SELECT count(sLogin) as Cantidad FROM usuarios WHERE sLogin=?";
  $cmdb=preparar_select($Conexion,$sqlb,[$Usuario]);
  $result = $cmdb->fetch_assoc();
  echo json_encode($result);
 }
?>