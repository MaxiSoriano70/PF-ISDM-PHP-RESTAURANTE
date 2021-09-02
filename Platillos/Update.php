<?php include "../Libs/Header.php"; ?>

<?php

 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="select * from platillos where iIdPlatillo=?";
  $datos=preparar_select($Conexion,$sql,[$iId]);

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 }
       
 else {           
  if (!empty($_POST)) {
   $iIdPlatillo=$_POST["iIdPlatillo"];
   $sNombre=$_POST["txtsNombre"];
   $sDescripcion=$_POST["txtsDescripcion"];
   $fPrecio=$_POST["txtfPrecio"];
   $iStock=$_POST["txtiStock"];
   $iStockMinimo=$_POST["txtiStockMinimo"];

   $actualizar="update Platillos set sNombre=?,sDescripcion=?,fPrecio=?,iStock=?,iStockMinimo=? where iIdPlatillo=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sNombre,$sDescripcion,$fPrecio,$iStock,$iStockMinimo,$iIdPlatillo]);

   if ($cmd=true) {
    echo '<script>
     location.href ="/dbRestaurant/Platillos/"; 
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
  <a id="atras" href="/dbRestaurant/Platillos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Platillos</h1>
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
   <img src="img/plate.svg">
   <input type="hidden" name="iIdPlatillo" value="<?php echo $fila["iIdPlatillo"]; ?>"/>
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
	  <i class="fas fa-file-signature"></i>
    </div>
    <div class="div">
     <h5>Descripcion</h5>
     <input type="text" class="input" name="txtsDescripcion" value="<?php echo $fila['sDescripcion'];?>" required>
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
   <div class="input-div one">
    <div class="i">
	  <i class="fas fa-cubes"></i>
    </div>
    <div class="div">
     <h5>Stock</h5>
     <input type="number" class="input" name="txtiStock" value=<?php echo $fila['iStock'];?> required>
    </div>
   </div>
   <div class="input-div one">
    <div class="i">
    <i class="fas fa-cubes"></i>
    </div>
    <div class="div">
     <h5>Stock Minimo</h5>
     <input type="number" class="input" name="txtiStockMinimo" value=<?php echo $fila['iStockMinimo'];?> required>
    </div>
   </div>
   <input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>

<?php include "../Libs/Footer.php"; ?>
<script type="text/javascript" src="js/Update.js"></script>