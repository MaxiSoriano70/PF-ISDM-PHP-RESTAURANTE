<?php include "../Libs/Header.php"; ?>

<?php 
 if (!empty($_POST)) {
  $sNombre=$_POST["txtsNombre"];
  $sDescripcion=$_POST["txtsDescripcion"];

  $sql="INSERT INTO Categorias (sNombre,sDescripcion,dFechaAlta) values (?,?,now())";          
  $cmd=preparar_query($Conexion,$sql,[$sNombre,$sDescripcion]);

  if ($cmd) {
   echo '<script>
    location.href ="/dbRestaurant/Categorias/"; 
   </script>';
  }
 }
?>

<style> <?php include "css/Create.css"; ?> </style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Categorias/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Categorias</h1>
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
	<img src="img/Categorias.svg">
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
	<input type="submit" class="btn" value="Crear">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Create.js' ?></script>
