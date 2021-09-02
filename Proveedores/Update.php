<?php include "../Libs/Header.php"; ?>

<?php 
 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="select * from proveedores where iIdProveedor=?";
  $datos=preparar_select($Conexion,$sql,[$iId]);

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 } 

 else {  
  if (!empty($_POST)) {
   $iIdProveedor=$_POST["iIdProveedor"];
   $sNombre=$_POST["txtsNombre"];
   $sApellido=$_POST["txtsApellido"];
   $iDocumento=$_POST["txtiDocumento"];
   $dFecha_Nacimiento=$_POST["txtdFecha_Nacimiento"];
   $iTelefono=$_POST["txtiTelefono"];
   $sEmail=$_POST["txtsEmail"];

   $actualizar="update PROVEEDORES set sNombre=?,sApellido=?,iDocumento=?,dFecha_Nacimiento=?,iTelefono=?,sEmail=? WHERE iIdProveedor=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sNombre,$sApellido,$iDocumento,$dFecha_Nacimiento,$iTelefono,$sEmail,$iIdProveedor]);

   if ($cmd) {  
    echo '<script>
     location.href ="/dbRestaurant/Proveedores/"; 
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
  <form method="POST" action="Update.php">
  <input type="hidden" name="iIdProveedor" value=<?php echo $fila["iIdProveedor"];?>>
	<img src="img/proveedor.svg">
	<h2 class="title">Modificar</h2>
   <div class="input-div one">
     <div class="i">
	   <i class="fas fa-user-circle"></i>
     </div>
     <div class="div">
      <h5>Nombre</h5>
      <input type="text" class="input" name="txtsNombre" value="<?php echo $fila['sNombre'];?>" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
      <i class="fas fa-user-circle"></i>
     </div>
     <div class="div">
      <h5>Apellido</h5>
      <input type="text" class="input" name="txtsApellido" value="<?php echo $fila['sApellido'];?>" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
	  <i class="fas fa-id-card"></i>
     </div>
     <div class="div">
      <h5>Documento</h5>
      <input type="number" class="input" name="txtiDocumento" value="<?php echo $fila['iDocumento'];?>" required>
     </div>
   </div>
   <div class="input-div one" id="dat">
     <div class="i">
	  <i class="fas fa-calendar-alt"></i>
     </div>
     <div class="div">
      <h5>Nacimiento</h5>
      <input type="date" class="input" name="txtdFecha_Nacimiento" value="<?php echo $fila['dFecha_Nacimiento'];?>" required>
     </div>
   </div>
   <div class="input-div one">
     <div class="i">
	  <i class="fas fa-phone-alt"></i>
     </div>
     <div class="div">
      <h5>Telefono</h5>
      <input type="number" class="input" name="txtiTelefono" value="<?php echo $fila['iTelefono'];?>" required>
     </div>
	</div>
	<div class="input-div one">
     <div class="i">
     <i class="fas fa-at"></i>
     </div>
      <div class="div">
       <h5>Email</h5>
       <input type="email" class="input" name="txtsEmail" value="<?php echo $fila['sEmail'];?>" required>
      </div>
    </div>
	<input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Update.js' ?></script>
