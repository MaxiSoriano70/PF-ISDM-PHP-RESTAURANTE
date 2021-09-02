<?php include "../../Libs/Header.php"; ?>

<?php
 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="SELECT iIdUsuario,sLogin,sNombre,sApellido,iDocumento,sEmail,iContacto FROM usuarios WHERE iIdusuario=?";
  $datos=preparar_select($Conexion,$sql,[$iId]);

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 } 

 else {  
  if (!empty($_POST)) {
   $iIdUsuario=$_POST["iIdUsuario"];
   $sNombre=$_POST["txtsNombre"];
   $sLogin=$_POST["txtsLogin"];
   $sApellido=$_POST["txtsApellido"];
   $iDocumento=$_POST["txtiDocumento"];
   $iContacto=$_POST["txtiTelefono"];
   $sEmail=$_POST["txtsEmail"];

   $actualizar="UPDATE USUARIOS SET sLogin=?,sNombre=?,sApellido=?,iDocumento=?,sEmail=?,iContacto=? WHERE iIdUsuario=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sLogin,$sNombre,$sApellido,$iDocumento,$sEmail,$iContacto,$iIdUsuario]);

   if ($cmd=true) {
	echo '<script>
	location.href ="/dbRestaurant/Usuarios/Clientes/"; 
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
  <a id="atras" href="/dbRestaurant/Usuarios/Clientes/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Clientes</h1>
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
  <input type="hidden" name="iIdUsuario" value=<?php echo $fila["iIdUsuario"];?>>
	<img src="img/Clientes.svg">
    <h2 class="title">Modificar</h2> 
    <div class="input-div one">
   	 <div class="i">
   	  <i class="fas fa-user"></i>
   	 </div>
   	 <div class="div">
   	  <h5>Usuario</h5>
   	  <input type="text" name="txtsLogin" class="input" value="<?php echo $fila['sLogin']?>" required>
   	 </div>
   	</div>
	<div class="input-div pass">
     <div class="i"> 
	  <i class="fas fa-user-circle"></i>
     </div>
	  <div class="div">
	   <h5>Nombre</h5>
	   <input id="Nombre" name="txtsNombre" type="text" class="input" value="<?php echo $fila['sNombre']?>" required>
	  </div>
	 </div>
	 <div class="input-div pass">
	  <div class="i"> 
	   <i class="fas fa-user-circle"></i>
	  </div>
	  <div class="div">
	   <h5>Apellido</h5>
	   <input id="Apellido" name="txtsApellido" type="text" class="input" value="<?php echo $fila['sApellido']?>" required>
	  </div>
	 </div>
	 <div class="input-div pass">
	  <div class="i"> 
	   <i class="fas fa-address-card"></i>
	  </div>
	  <div class="div">
	   <h5>Documento</h5>
	   <input id="DNI" name="txtiDocumento" type="number" class="input" value="<?php echo $fila['iDocumento']?>" required>
	  </div>
	 </div>
	 <div class="input-div pass">
	  <div class="i"> 
	   <i class="fas fa-at"></i>
	  </div>
	  <div class="div">
	   <h5>Email</h5>
	   <input id="Email" name="txtsEmail" type="email" class="input" value="<?php echo $fila['sEmail']?>" required>
	  </div>
	 </div>
	 <div class="input-div pass">
	  <div class="i"> 
	   <i class="fas fa-mobile-alt"></i>
	  </div>
	  <div class="div">
	   <h5>Contacto</h5>
	   <input id="Celular" name="txtiTelefono" type="number" class="input" value="<?php echo $fila['iContacto']?>" required>
	  </div>
	 </div>
	<input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>


<?php include "../../Libs/Footer.php"; ?>
<script><?php include 'js/Update.js' ?></script>
