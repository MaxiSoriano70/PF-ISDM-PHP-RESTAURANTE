<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_GET)) {
  $iIdCategoria=$_GET["iId"];

  $sqla="DELETE FROM platillo_categoria WHERE iIdCategoria=?";
  $cmda=preparar_query($Conexion,$sqla,[$iIdCategoria]);

  if ($cmda) {
   $sql="delete from Categorias where iIdCategoria=?";
   $cmd=preparar_query($Conexion,$sql,[$iIdCategoria]);

   if ($cmd=true) {
    echo '<script>
     location.href ="/dbRestaurant/Categorias/"; 
    </script>';
   }
  }
  else {
   echo "Error";
  }
 }

 else {
  echo "Error";
 }

?>

<?php
include "../Libs/Footer.php";
?>
