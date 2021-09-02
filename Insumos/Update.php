<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="select * from insumos where iIdInsumo=?";
  $datos=preparar_select($Conexion,$sql,[$iId]);

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 }     
 else { 
  if (!empty($_POST)) {
   $iIdInsumo=$_POST["iIdInsumo"];
   $sNombre=$_POST["txtsNombre"];
   $fPrecio=$_POST["txtfPrecio"];

   $actualizar="update Insumos set sNombre=?,fPrecio=? where iIdInsumo=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sNombre,$fPrecio,$iIdInsumo]);

   if ($cmd) {
    echo '<script>
     location.href ="/dbRestaurant/Insumos/"; 
    </script>';
   }

   else {
    echo "Error en la Insercion";
   }
  }
 }
?>

<style><?php include "css/Update.css"; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Insumos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Insumos</h1>
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
  <form method="POST" action="Update.php">
   <img src="img/Insumos.svg">
   <input type="hidden" name="iIdInsumo" value=<?php echo $fila["iIdInsumo"];?>>
   <h2 class="title">Modificar</h2>
   <div class="input-div one">
    <div class="i">
	  <i class="fas fa-file-signature"></i>
    </div>
    <div class="div">
     <h5>Nombre</h5>
     <input type="text" class="input" name="txtsNombre" value="<?php echo $fila['sNombre'];?>" required>
    </div>
	 </div>
   <div class="input-div one">
    <div class="i">
	  <i class="fas fa-dollar-sign"></i>
    </div>
    <div class="div">
     <h5>Precio</h5>
     <input type="number" step="any" class="input" name="txtfPrecio" value=<?php echo $fila['fPrecio'];?> required>
    </div>
   </div>
   <input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>

<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Update.js' ?></script>
