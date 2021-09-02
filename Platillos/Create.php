<?php include "../Libs/Header.php"; ?>

<?php

if (!empty($_POST)) {
 $sNombre=$_POST["txtsNombre"];
 $sDescripcion=$_POST["txtsDescripcion"];
 $fPrecio=$_POST["txtfPrecio"];
 $iStock=$_POST["txtiStock"];
 $iStockMinimo=$_POST["txtiStockMinimo"];

 $sql="insert into platillos(sNombre,sDescripcion,fPrecio,iStock,iStockMinimo) values (?,?,?,?,?)";
 $cmd=preparar_query($Conexion,$sql,[$sNombre,$sDescripcion,$fPrecio,$iStock,$iStockMinimo]);

 if ($cmd) {
  echo '<script>
   location.href ="/dbRestaurant/Platillos/"; 
  </script>';
 }
}

?>

<style> <?php include "css/Create.css"; ?> </style>

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
  <form method="POST" action="Create.php">
	<img src="img/plate.svg">
	<h2 class="title">Agregar</h2>
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
   <div class="input-div one">
    <div class="i">
	  <i class="fas fa-cubes"></i>
    </div>
    <div class="div">
     <h5>Stock</h5>
     <input type="number" class="input" name="txtiStock" required>
    </div>
   </div>
   <div class="input-div one">
    <div class="i">
    <i class="fas fa-cubes"></i>
    </div>
    <div class="div">
     <h5>Stock Minimo</h5>
     <input type="number" class="input" name="txtiStockMinimo" required>
    </div>
   </div>
	<input type="submit" class="btn" value="Crear">
  </form>
 </div>
</div>

<?php include "../Libs/Footer.php"; ?>
<script> <?php include "js/Create.js"; ?> </script>