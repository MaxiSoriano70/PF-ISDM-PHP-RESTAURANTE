<?php include "../Libs/Header.php"; ?>

<?php 
 if (!empty($_POST)) {
  $sNombre=$_POST["txtsNombre"];
  $fPrecio=$_POST["txtfPrecio"];

  $sql="insert into insumos(sNombre,fPrecio) values (?,?)";
  $cmd=preparar_query($Conexion,$sql,[$sNombre,$fPrecio]);

  if ($cmd) {
  echo '<script>
   location.href ="/dbRestaurant/Insumos/"; 
  </script>';
  }
 }
?>

<style> <?php include "css/Create.css"; ?> </style>

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
  <form method="POST" action="Create.php">
	<img src="img/insumos.svg">
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