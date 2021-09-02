<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="select * from Menus where iIdMenu=?";
  $datos=preparar_select($Conexion,$sql,[$iId]);

  $sqlPlatillo="SELECT p.iIdPlatillo FROM platillos p WHERE bMenu=?";
  $cmdPlatillo=preparar_select($Conexion,$sqlPlatillo,[$iId]);
  $iIdPlatillo=$cmdPlatillo->fetch_assoc();

  $sqlImagen="SELECT i.sNombreArchivo FROM imagenes i INNER JOIN platillo_imagen pi INNER JOIN platillos p ON p.iIdPlatillo=pi.iIdPlatillo AND pi.iIdImagen=i.iIdImagen WHERE p.iIdPlatillo=?";
  $cmdImagen=preparar_select($Conexion,$sqlImagen,[$iIdPlatillo['iIdPlatillo']]);
  $Imagen=$cmdImagen->fetch_assoc();

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 }       
 
 else {
  if (!empty($_POST)) {
   $iIdMenu=$_POST["iIdMenu"];
   $iIdPlatilloM=$_POST['iIdPlatilloM'];
   $sNombre=$_POST["txtsNombre"];
   $sDescripcion=$_POST["txtsDescripcion"];
   $fPrecio=$_POST["txtfPrecio"];
   $sNombreArchivo=$_FILES['archivoinput']['name'];
   $sTipoExtension=$_FILES['archivoinput']['type'];
   $sPath=$_SERVER["DOCUMENT_ROOT"].'/dbRestaurant/Imagenes';
   move_uploaded_file($_FILES["archivoinput"]["tmp_name"],$sPath.'/'.$sNombreArchivo);


   $actualizar="UPDATE Menus SET sNombre=?,sDescripcion=?,fPrecio=?,dFechaAlta=now() WHERE iIdMenu=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sNombre,$sDescripcion,$fPrecio,$iIdMenu]);

   $sql_platillos="UPDATE PLATILLOS SET sNombre=?,sDescripcion=?,fPrecio=? WHERE iIdPlatillo=?";
   $cmd_platillo=preparar_query($Conexion,$sql_platillos,[$sNombre,$sDescripcion,$fPrecio,$iIdPlatilloM]);

   if (!empty($sNombreArchivo)) {   
    $sql_idImagen="SELECT iIdImagen FROM Platillo_Imagen WHERE iIdPlatillo=?";
    $cmd_idImagen=preparar_select($Conexion,$sql_idImagen,[$iIdPlatilloM]);
    $rim=$cmd_idImagen->fetch_assoc();

    $sql_platillos_img="UPDATE IMAGENES SET sNombreArchivo=?,sTipoExtension=?,sPath=? WHERE iIdImagen=?";
    $cmd_platillo_img=preparar_query($Conexion,$sql_platillos_img,[$sNombreArchivo,$sTipoExtension,$sPath,$rim['iIdImagen']]);
   }
   else { }

   if ($cmd_platillo) {
    echo '<script>
     location.href ="/dbRestaurant/Menus/"; 
    </script>'; 
   }
   else {
    echo "Error en la Insercion";
   }
  }
 }
?>


<style> <?php include "css/Update.css"; ?> </style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Menus/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Menus</h1>
 </div>
 <div class="boxin">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
 </div>
</div>

<div class="container-modificar-permiso">
 <div class="login-content">
  <form method="POST" action="Update.php" enctype="multipart/form-data">
  <input type="hidden" name="iIdMenu" value=<?php echo $fila["iIdMenu"];?>>
  <input type="hidden" name="iIdPlatilloM" value=<?php echo $iIdPlatillo['iIdPlatillo']; ?>>

  <div id="visorArchivo"><embed id="myImg" src="/dbRestaurant/Imagenes/<?php echo $Imagen['sNombreArchivo'] ?>" width="200" height="200"></div>
  <h2 class="title">Modificar</h2> 
  <input type="file" name="archivoinput" class="file" id="archivoInput" onchange="return validarExt()">
  <label for="archivoInput">
  <i class="fas fa-photo-video"></i> &nbsp; 
   Elige Imagen
  </label>

   <div class="input-div one">
     <div class="i">
      <i class="fas fa-file-signature"></i>
     </div>
     <div class="div">
      <h5>Nombre</h5>
      <input type="text" class="input" name="txtsNombre" value="<?php echo $fila["sNombre"]; ?>" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
      <i class="fas fa-file-signature"></i>
     </div>
     <div class="div">
      <h5>Descripcion</h5>
      <input type="text" class="input" name="txtsDescripcion" value="<?php echo $fila["sDescripcion"]; ?>" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
	  <i class="fas fa-dollar-sign"></i>
     </div>
     <div class="div">
      <h5>Precio</h5>
      <input type="number" step="any" class="input" name="txtfPrecio" value="<?php echo $fila["fPrecio"]; ?>" required>
     </div>
   </div>
	<input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Update.js';?></script>
