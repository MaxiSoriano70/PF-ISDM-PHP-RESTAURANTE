<?php include "../Libs/Header.php"; ?>

<?php 
 if (!empty($_POST)) {
  $sNombre=$_POST["txtsNombre"];
  $sApellido=$_POST["txtsApellido"];
  $iDocumento=$_POST["txtiDocumento"];
  $dFecha_Nacimiento=$_POST["txtdFecha_Nacimiento"];
  $iTelefono=$_POST["txtiTelefono"];
  $sEmail=$_POST["txtsEmail"];

  $sql="insert into PROVEEDORES(sNombre,sApellido,iDocumento,dFecha_Nacimiento,iTelefono,sEmail) values (?,?,?,?,?,?)";
  $cmd=preparar_query($Conexion,$sql,[$sNombre,$sApellido,$iDocumento,$dFecha_Nacimiento,$iTelefono,$sEmail]);

   if ($cmd) {
    echo '<script>
     location.href ="/dbRestaurant/Proveedores/"; 
    </script>';
   }
 }
?>

<style> <?php include "css/Create.css"; ?> </style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Proveedores/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Proveedores</h1>
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
	<img src="img/proveedor.svg">
	<h2 class="title">Agregar</h2>
   <div class="input-div one">
     <div class="i">
	   <i class="fas fa-user-circle"></i>
     </div>
     <div class="div">
      <h5>Nombre</h5>
      <input type="text" class="input" name="txtsNombre" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
      <i class="fas fa-user-circle"></i>
     </div>
     <div class="div">
      <h5>Apellido</h5>
      <input type="text" class="input" name="txtsApellido" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
	  <i class="fas fa-id-card"></i>
     </div>
     <div class="div">
      <h5>Documento</h5>
      <input type="number" class="input" name="txtiDocumento" required>
     </div>
   </div>
   <div class="input-div one" id="dat">
     <div class="i">
	  <i class="fas fa-calendar-alt"></i>
     </div>
     <div class="div">
      <h5>Nacimiento</h5>
      <input type="date" class="input" name="txtdFecha_Nacimiento" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
	  <i class="fas fa-phone-alt"></i>
     </div>
     <div class="div">
      <h5>Telefono</h5>
      <input type="number" class="input" name="txtiTelefono" required>
     </div>
	</div>
	<div class="input-div one">
     <div class="i">
     <i class="fas fa-at"></i>
     </div>
      <div class="div">
       <h5>Email</h5>
       <input type="email" class="input" name="txtsEmail" required>
      </div>
    </div>
	<input type="submit" class="btn" value="Crear">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Create.js' ?></script>
