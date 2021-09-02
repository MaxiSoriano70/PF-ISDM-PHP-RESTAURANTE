<?php include "../../Libs/Header.php"; ?>

<?php
 if (!empty($_GET["iId"])) {
  $iId=$_GET["iId"];
  $sql="SELECT u.iIdUsuario,sLogin,u.sNombre,sApellido,iDocumento,sEmail,iContacto,u.iIdPermiso,p.sNombre as NomPer FROM usuarios u INNER JOIN permisos p on u.iIdPermiso=p.iIdPermiso WHERE iIdusuario=?";
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
   $select=$_POST["select"];

   $actualizar="UPDATE USUARIOS SET sLogin=?,sNombre=?,sApellido=?,iDocumento=?,sEmail=?,iContacto=?,iIdPermiso=? WHERE iIdUsuario=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sLogin,$sNombre,$sApellido,$iDocumento,$sEmail,$iContacto,$select,$iIdUsuario]);

   if ($cmd) {
    echo '<script>
     location.href ="/dbRestaurant/Usuarios/Empleados/"; 
    </script>';
   }

   else {
    echo "Error en la Insercion";
   }
  }
 }
 
 $sqlg="SELECT * FROM permisos";
 $datos=preparar_select($Conexion,$sqlg);
?>

<style><?php include "css/Update.css"; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Usuarios/Empleados/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Empleados</h1>
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
  <form id="Form-Upd" method="POST" action="Update.php">
  <input type="hidden" name="iIdUsuario" value=<?php echo $fila["iIdUsuario"];?>>
	<img src="img/Empleados.svg">
    <h2 class="title">Modificar</h2> 
	<select name="select" class="selectpicker" required>
	 <option selected style="display:none;" value="<?php echo $fila['iIdPermiso']?>"><?php echo $fila['NomPer']?></option>
	 <?php 
	  foreach($datos as $dato) { ?>
	   <option value='<?php echo $dato["iIdPermiso"]; ?>'><?php echo $dato["sNombre"]?></option>
	 <?php } ?>
	</select>
	<?php 
	  foreach ($datos as $dat) { ?>
	   <input type="hidden" id="<?php echo 'idn'.$dat['iIdPermiso']?>" value="<?php echo $dat['sDescripcion']?>">
	 <?php } ?>	

	<div class="alert alert-warning" role="alert" id="datos"></div>

    <div class="input-div one sma">
   	 <div class="i">
   	  <i class="fas fa-user"></i>
   	 </div>
   	 <div class="div">
   	  <h5>Usuario</h5>
	  <input type="text" id="usnpo" name="txtsLogin" class="input" value="<?php echo $fila['sLogin']?>" required onblur="Usuariov(value);">
   	 </div>
	</div>
	<p class="pdi" id="pdia">Puedes usar letras y números</p>
	<input type="hidden" name="uoc" id="iuoc" value="0">
	<input type="hidden" id="nusa" value="<?php echo $fila['sLogin']?>">
	   
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
