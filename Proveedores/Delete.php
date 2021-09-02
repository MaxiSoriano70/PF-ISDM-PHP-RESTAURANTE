<?php include "../Libs/Header.php"; ?>


<?php

 if (!empty($_GET)) {
  $iIdProveedor=$_GET["iId"];
  $sqla="DELETE FROM provxins WHERE iIdProveedor=?";
  $cmda=preparar_query($Conexion,$sqla,[$iIdProveedor]);

  if ($cmda) {

   $sql="DELETE FROM PROVEEDORES WHERE iIdProveedor=?";
   $cmd=preparar_query($Conexion,$sql,[$iIdProveedor]);

   if ($cmd) {
    echo '<script>
     location.href ="/dbRestaurant/Proveedores/"; 
    </script>';
   }

   else {
    echo "Error";
   }
 }
}

?>



<?php include "../Libs/Footer.php"; ?>



