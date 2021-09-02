<?php 
 session_start(); 
 require_once "../Libs/Conexion.php";
 require_once "../Libs/Funciones.php";
?>

<?php 
 if(($_GET['iIdPlatillo']) AND ($_GET['iIdCarrito'])) {
  $iIdPlatillo=$_GET['iIdPlatillo'];
  $iIdCarrito=$_GET['iIdCarrito'];
  $sql="delete from detalle_carrito where iIdPlatillo=? and iIdCarrito=?";
  $cmd=preparar_select($Conexion,$sql,[$iIdPlatillo,$iIdCarrito]);

  $tt="SELECT SUM(fSubtotal) AS Total FROM detalle_carrito WHERE iIdCarrito=?";
  $ctt=preparar_select($Conexion,$tt,[$iIdCarrito]);
  $ftt=$ctt->fetch_assoc();
 
  $sqltot="UPDATE carrito SET fTotal=? WHERE iIdCarrito=?";

  if ($ftt['Total']==0){
   $ctot=preparar_select($Conexion,$sqltot,[0,$iIdCarrito]);
  }

  else {
   $ctot=preparar_select($Conexion,$sqltot,[$ftt['Total'],$iIdCarrito]);
  }

  if ($cmd=true) {
   header("Location:/dbRestaurant/Carrito/"); 
  }
  else {
   echo "Error en la Insercion";
  }
 }
?>

<?php include "../Libs/Footer.php"; ?>