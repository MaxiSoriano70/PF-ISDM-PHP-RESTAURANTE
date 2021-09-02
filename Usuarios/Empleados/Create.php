<?php include "../../Libs/Header.php"; ?>

<?php 
 if (!empty($_POST['sUsuario'])) {
  $sLogin=$_POST['sUsuario'];
  $sContraseña=$_POST['sContraseña'];
  $sNombre=$_POST['sNombre'];
  $sApellido=$_POST['sApellido'];
  $iDocumento=$_POST['iDocumento'];
  $sEmail=$_POST['sEmail'];
  $iContacto=$_POST['iContacto'];
  $select=$_POST["select"];

  $sql="INSERT INTO Usuarios (sLogin,sClave,sNombre,sApellido,iDocumento,sEmail,iContacto,iIdPermiso) values (?,?,?,?,?,?,?,?)";
  $cmd=preparar_select($Conexion,$sql,[$sLogin,$sContraseña,$sNombre,$sApellido,$iDocumento,$sEmail,$iContacto,$select]);

  if ($cmd) {
   echo '<script>
    location.href ="/dbRestaurant/Usuarios/Empleados/"; 
   </script>';
  }
 }

$sql="SELECT * FROM permisos";
$datos=preparar_select($Conexion,$sql);
?>

<style> <?php include "css/Create.css"; ?> </style>

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
  <form id="Form-Create" method="POST" action="Create.php">
	<img src="img/Empleados.svg">
	<h2 class="title">Agregar</h2>
	 <select name="select" class="selectpicker" required>
	  <option selected style="display:none;">Permiso</option>
	  <?php 
	   foreach($datos as $dato) { ?>
		<option value='<?php echo $dato["iIdPermiso"]; ?>'><?php echo $dato["sNombre"]?></option>
	  <?php } ?>
	 </select>
	 <?php 
	  foreach ($datos as $dat) { ?>
	   <input type="hidden" id="<?php echo 'idn'.$dat['iIdPermiso']?>" value="<?php echo $dat['sDescripcion']?>">
	 <?php }
	 ?>
	
	<div class="alert alert-warning" role="alert" id="datos"></div>

    <div class="input-div one sma">
   	 <div class="i">
   	  <i class="fas fa-user"></i>
   	 </div>
   	 <div class="div">
   	  <h5>Usuario</h5>
   	  <input type="text" name="sUsuario" class="input" required onblur="Usuariov(value);">
   	 </div>
	</div>
	<p class="pdi" id="pdia">Puedes usar letras y números</p>
    <input type="hidden" name="uoc" id="iuoc" value="0">

    <div class="input-div one sma">
     <div class="i"> 
      <i class="fas fa-lock"></i>
     </div>
     <div class="div">
      <h5>Contraseña</h5>
      <input id="Contraseña" name="sContraseña" type="password" class="input" required onblur="Password(value);">
	 </div>
	 <div class="i vbc" id="is"> 
	  <i id="icontra" class="far fa-eye Vis"></i>
	 </div>
	</div>
	<p class="pdi" id="pdib">Usa 8 o más caracteres con una combinación de letras (Mayusculas y Minusculas) y números</p>
    <input type="hidden" name="coc" id="icoc" value="0">

	<div class="input-div pass">
     <div class="i"> 
	  <i class="fas fa-user-circle"></i>
     </div>
	 <div class="div">
	   <h5>Nombre</h5>
	   <input id="Nombre" name="sNombre" type="text" class="input" required>
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-user-circle"></i>
	 </div>
	 <div class="div">
	  <h5>Apellido</h5>
	  <input id="Apellido" name="sApellido" type="text" class="input" required>
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-address-card"></i>
	 </div>
	 <div class="div">
	  <h5>Documento</h5>
	  <input id="DNI" name="iDocumento" type="number" class="input" required>
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-at"></i>
	 </div>
	 <div class="div">
	  <h5>Email</h5>
	  <input id="Email" name="sEmail" type="email" class="input" required>
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-mobile-alt"></i>
	 </div>
	 <div class="div">
	  <h5>Contacto</h5>
	  <input id="Celular" name="iContacto" type="number" class="input" required>
	 </div>
	</div>
	<input type="submit" class="btn" value="Crear">
  </form>
 </div>
</div>


<?php include "../../Libs/Footer.php"; ?>
<script><?php include 'js/Create.js' ?></script>
