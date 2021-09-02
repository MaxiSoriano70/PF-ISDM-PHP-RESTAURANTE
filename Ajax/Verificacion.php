<?php 
 require_once "../Libs/Conexion.php";
 require "../Libs/Funciones.php";
 session_start();
?>

<?php
 if ($_POST['Action']=='Verificacion') {
  $Codigo=$_POST['sCodigo'];
  $sqla="SELECT iIdUsuario FROM USUARIOS where sGenerado=?";
  $cmda=preparar_select($Conexion,$sqla,[$Codigo]);
  $resultado=$cmda->fetch_assoc();

  if(!empty($resultado['iIdUsuario'])) {
   echo json_encode($resultado);
  }
  
  else {
   $resultado='Vacio';
   echo json_encode($resultado);
  }
 }

?>
