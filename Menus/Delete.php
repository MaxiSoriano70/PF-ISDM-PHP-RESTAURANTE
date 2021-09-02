<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_GET)) {
  $iIdMenu=$_GET["iId"];
  
  $sqla="DELETE FROM Platillo_Menu WHERE iIdMenu=?";
  $cmda=preparar_query($Conexion,$sqla,[$iIdMenu]);

  $sqlp="SELECT iIdPlatillo FROM Platillos WHERE bMenu=?";
  $cmdp=preparar_select($Conexion,$sqlp,[$iIdMenu]);
  $resp=$cmdp->fetch_assoc();

  $sql_idImagen="SELECT iIdImagen FROM Platillo_Imagen WHERE iIdPlatillo=?";
  $cmd_idImagen=preparar_select($Conexion,$sql_idImagen,[$resp['iIdPlatillo']]);
  $rim=$cmd_idImagen->fetch_assoc();

  $dpi="DELETE FROM Platillo_Imagen WHERE iIdImagen=?";
  $dcpi=preparar_query($Conexion,$dpi,[$rim['iIdImagen']]); 

  $dim="DELETE FROM Imagenes WHERE iIdImagen=?";
  $cdim=preparar_query($Conexion,$dim,[$rim['iIdImagen']]);

  $dpl="DELETE FROM Platillos WHERE iIdPlatillo=?";
  $dcpl=preparar_query($Conexion,$dpl,[$resp['iIdPlatillo']]);

  $sql="DELETE FROM Menus WHERE iIdMenu=?";
  $cmd=preparar_query($Conexion,$sql,[$iIdMenu]);

  if ($cmd) {
   echo '<script>
    location.href ="/dbRestaurant/Menus/"; 
   </script>';
  }
  else {
   echo "Error";
  }
 }
?>

<?php include "../Libs/Footer.php"; ?>