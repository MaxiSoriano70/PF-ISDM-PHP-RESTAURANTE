<?php include '../Libs/Header.php' ?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $usuario=$_SESSION["iIdUsuario"];

  if(!empty($_POST)) {
   $sNombre=$_POST["txtsNombre"];
   $sLogin=$_POST["txtsLogin"];
   $sApellido=$_POST["txtsApellido"];
   $iDocumento=$_POST["txtiDocumento"];
   $iContacto=$_POST["txtiTelefono"];
   $sEmail=$_POST["txtsEmail"];
   $sNombreArchivo=$_FILES['archivoinput']['name'];
   $sPath=$_SERVER["DOCUMENT_ROOT"].'/dbRestaurant/Imagenes/Usuarios';
   move_uploaded_file($_FILES["archivoinput"]["tmp_name"],$sPath.'/'.$sNombreArchivo);

   if(empty($sNombreArchivo)) {
    $sql="UPDATE USUARIOS SET sLogin=?,sNombre=?,sApellido=?,iDocumento=?,sEmail=?,iContacto=? WHERE iIdUsuario=?";
    $cmd=preparar_query($Conexion,$sql,[$sLogin,$sNombre,$sApellido,$iDocumento,$sEmail,$iContacto,$usuario]); 
   }
   else {
    $sql="UPDATE USUARIOS SET sLogin=?,sNombre=?,sApellido=?,iDocumento=?,sEmail=?,iContacto=?,sPerfil=? WHERE iIdUsuario=?";
    $cmd=preparar_query($Conexion,$sql,[$sLogin,$sNombre,$sApellido,$iDocumento,$sEmail,$iContacto,$sNombreArchivo,$usuario]);
   }
  }
	
  $sql="SELECT * FROM USUARIOS WHERE iIdUsuario=?";
  $cmd=preparar_select($Conexion,$sql,[$usuario]);
  $resultado=$cmd->fetch_assoc();
 }
?>

<style> <?php include "css/UpdatePerfil.css"; ?> </style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="<?php echo $ub;?>"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Editar Perfil</h1>
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
  <form id="Form-Upp" name="foo" method="POST" action="UpdatePerfil.php" enctype="multipart/form-data">
  <input type="hidden" name="iIdUsuario">
  
    <div id="visorArchivo"><embed id="myImg" src="/dbRestaurant/Imagenes/Usuarios/<?php echo $resultado['sPerfil'];?>" width="200" height="200"></div>
    <h2 class="title">Mi Perfil</h2> 
     <input type="file" name="archivoinput" class="file" id="archivoInput" value="/dbRestaurant/Imagenes/Usuarios/<?php echo $resultado['sPerfil'];?>" onchange="return validarExt()">
     <label for="archivoInput">
     <i class="fas fa-photo-video"></i> &nbsp; 
      Elige Imagen
     </label>
     
    <div class="input-div one sma">
   	 <div class="i">
   	  <i class="fas fa-user"></i>
   	 </div>
   	 <div class="div">
   	  <h5>Usuario</h5>
   	  <input type="text" id="usnpo" name="txtsLogin" class="input" required value="<?php echo $resultado['sLogin'];?>" onblur="Usuariov(value);">
   	 </div>
	</div>
	<p class="pdi" id="pdia">Puedes usar letras y números</p>
	<input type="hidden" name="uoc" id="iuoc" value="0">
	<input type="hidden" id="nusa" value="<?php echo $resultado['sLogin']; ?>"> 
	
	<div class="input-div pass">
     <div class="i"> 
	  <i class="fas fa-user-circle"></i>
     </div>
	 <div class="div">
	  <h5>Nombre</h5>
	  <input id="Nombre" name="txtsNombre" type="text" class="input" required value="<?php echo $resultado['sNombre'];?>">
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-user-circle"></i>
	 </div>
	 <div class="div">
	  <h5>Apellido</h5>
	  <input id="Apellido" name="txtsApellido" type="text" class="input" required value="<?php echo $resultado['sApellido'];?>">
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-address-card"></i>
	 </div>
	 <div class="div">
	  <h5>Documento</h5>
	  <input id="DNI" name="txtiDocumento" type="number" class="input" required value="<?php echo $resultado['iDocumento'];?>">
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-at"></i>
	 </div>
	 <div class="div">
	  <h5>Email</h5>
	  <input id="Email" name="txtsEmail" type="email" class="input" required value="<?php echo $resultado['sEmail'];?>">
	 </div>
	</div>
	<div class="input-div pass">
	 <div class="i"> 
	  <i class="fas fa-mobile-alt"></i>
	 </div>
	 <div class="div">
	  <h5>Contacto</h5>
	  <input id="Celular" name="txtiTelefono" type="number" class="input" required value="<?php echo $resultado['iContacto'];?>">
	 </div>
    </div>
	<input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>

<?php include '../Libs/Footer.php'; ?>
<script><?php include 'js/UpdatePerfil.js' ?></script>