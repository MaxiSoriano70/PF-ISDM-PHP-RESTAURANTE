<?php include "../Libs/Header.php";?>

<?php 
 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="select * from Categorias where iIdCategoria=?";
  $datos=preparar_select($Conexion,$sql,[$iId]);

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 }

 else {
  if (!empty($_POST)) {
   $iIdCategoria=$_POST["iIdCategoria"];
   $sNombre=$_POST["txtsNombre"];
   $sDescripcion=$_POST["txtsDescripcion"];

   $actualizar="UPDATE Categorias SET sNombre=?,sDescripcion=?,dFechaAlta=now() WHERE iIdCategoria=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sNombre,$sDescripcion,$iIdCategoria]);

   if ($cmd) {
    echo '<script>
     location.href ="/dbRestaurant/Categorias/"; 
    </script>';
   }

   else {
    echo "Error en la Insercion";
   }
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
  <form method="POST" action="Update.php">
  <input type="hidden" name="iIdCategoria" value=<?php echo $fila["iIdCategoria"];?>>
	<img src="img/Categorias.svg">
	<h2 class="title">Modificar</h2>
   <div class="input-div one">
     <div class="i">
      <i class="fas fa-file-signature"></i>
     </div>
     <div class="div">
      <h5>Nombre</h5>
      <input type="text" class="input" name="txtsNombre" value="<?php echo $fila['sNombre']; ?>" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
      <i class="fas fa-file-signature"></i>
     </div>
     <div class="div">
      <h5>Descripcion</h5>
      <input type="text" class="input" name="txtsDescripcion" value="<?php echo $fila['sDescripcion']; ?>" required>
     </div>
   </div>
	<input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>

<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Update.js';?></script>