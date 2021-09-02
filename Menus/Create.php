<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_POST)) {
  $sNombre=$_POST["txtsNombre"];
  $sDescripcion=$_POST["txtsDescripcion"];
  $fPrecio=$_POST["txtfPrecio"];
  $aux=$_FILES['archivoinput']['name'];
  if (empty($aux)) {
  $sNombreArchivo="Default-Menu.jpeg";
  $sTipoExtension="image/jpeg";
  }
  else {
   $sNombreArchivo=$_FILES['archivoinput']['name'];
   $sTipoExtension=$_FILES['archivoinput']['type'];
  }
  $sPath=$_SERVER["DOCUMENT_ROOT"].'/dbRestaurant/Imagenes';
  move_uploaded_file($_FILES["archivoinput"]["tmp_name"],$sPath.'/'.$sNombreArchivo);

  $sql="INSERT INTO Menus (sNombre,sDescripcion,fPrecio,dFechaAlta) values (?,?,?,now())";          
  $cmd=preparar_query($Conexion,$sql,[$sNombre,$sDescripcion,$fPrecio]);
  $iIdMenu=$cmd->insert_id;

  if ($cmd) {
   $sql_platillos="INSERT INTO PLATILLOS (sNombre,sDescripcion,fPrecio,bMenu) values (?,?,?,?)";
   $cmd_platillo=preparar_query($Conexion,$sql_platillos,[$sNombre,$sDescripcion,$fPrecio,$iIdMenu]);
   $iIdPlatillo=$cmd_platillo->insert_id;

   $sql_platillos_img="INSERT INTO IMAGENES (sNombreArchivo,sTipoExtension,sPath) values (?,?,?)";
   $cmd_platillo_img=preparar_query($Conexion,$sql_platillos_img,[$sNombreArchivo,$sTipoExtension,$sPath]);

   if ($cmd_platillo_img) {
    $iIdImagen=$cmd_platillo_img->insert_id;
    $sql_p_img="INSERT INTO PLATILLO_IMAGEN (iIdPlatillo,iIdImagen,iOrden) values (?,?,1)";
    $cmd_p_img=preparar_query($Conexion,$sql_p_img,[$iIdPlatillo,$iIdImagen]);
   }
   echo '<script>
    location.href ="/dbRestaurant/Menus/"; 
   </script>';
  }
 }
?>


<style> <?php include "css/Create.css"; ?> </style>

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
  <form method="POST" action="Create.php" enctype="multipart/form-data">

   <div id="visorArchivo"><embed id="myImg" src="img/Default-Menu.jpeg" width="200" height="200"></div>
   <h2 class="title">Agregar</h2> 
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
      <input type="text" class="input" name="txtsNombre" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
      <i class="fas fa-file-signature"></i>
     </div>
     <div class="div">
      <h5>Descripcion</h5>
      <input type="text" class="input" name="txtsDescripcion" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
	  <i class="fas fa-dollar-sign"></i>
     </div>
     <div class="div">
      <h5>Precio</h5>
      <input type="number" step="any" class="input" name="txtfPrecio" required>
     </div>
   </div>
	<input type="submit" class="btn" value="Crear">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Create.js';?></script>


