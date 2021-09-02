<?php include "../Libs/Header.php"; ?>

<?php 
 if (!empty($_POST)) {
  $sDescripcion=$_POST["txtsDescripcion"];

  $sql="INSERT INTO Pagos (sDescripcion) values (?)";          
  $cmd=preparar_query($Conexion,$sql,[$sDescripcion]);

  if ($cmd=true) {
   echo '<script>
    location.href ="/dbRestaurant/Pagos/"; 
   </script>';
  }
 }
?>

<style> <?php include "css/Create.css"; ?> </style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Pagos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Pagos</h1>
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
	<img src="img/Pagos.svg">
	<h2 class="title">Agregar</h2>
	<div class="input-div one">
     <div class="i">
	  <i class="fas fa-file-signature"></i>
     </div>
      <div class="div">
       <h5>Descripcion</h5>
       <input type="text" class="input" name="txtsDescripcion" required>
      </div>
    </div>
	<input type="submit" class="btn" value="Crear">
  </form>
 </div>
</div>

<?php include "../Libs/Footer.php"; ?>
<script><?php include "js/Create.js"; ?></script>