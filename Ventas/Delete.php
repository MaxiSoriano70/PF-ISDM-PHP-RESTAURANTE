<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_GET["iId"])) {
  $iIdVenta=$_GET["iId"];
  $sqlb="DELETE FROM DETALLE_VENTA WHERE iIdVenta=?";
  $cmdb=preparar_query($Conexion,$sqlb,[$iIdVenta]);
  if ($cmdb==true) {
   $sql="DELETE FROM VENTAS WHERE iIdVenta=?";
   $cmd=preparar_query($Conexion,$sql,[$iIdVenta]);
   echo '<script>
    location.href ="/dbRestaurant/Ventas/"; 
   </script>';
  }
 }
 else {
  echo "Error";
 }
?>

<?php include "../Libs/Footer.php"; ?>