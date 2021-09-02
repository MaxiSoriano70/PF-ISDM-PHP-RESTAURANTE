<?php 
 include '../Libs/Conexion.php';
 include '../Libs/Funciones.php';
 if (isset($_SERVER['HTTP_REFERER'])) {
  $ub=$_SERVER['HTTP_REFERER'];
  echo "<script>console.log( 'Ubicacion Anterior: " . $ub . "' );</script>";
 }
?>

<?php 
 $update="UPDATE Visitas SET iCantidad=iCantidad+1 WHERE iIdVisita=4";
 $cmdup=preparar_query($Conexion,$update);
?>

<?php 
 if (!empty($_POST['Usuario'])) {
  $Usuario=$_POST['Usuario'];
  $Contraseña=$_POST['Contraseña'];
  $Nombre=$_POST['Nombre'];
  $Apellido=$_POST['Apellido'];
  $Documento=$_POST['Documento'];
  $Email=$_POST['Email'];
  $Contacto=$_POST['Contacto'];
  $hash=password_hash("$Contraseña", PASSWORD_DEFAULT);

  $sql="INSERT INTO Usuarios (sLogin,sClave,sNombre,sApellido,iDocumento,sEmail,iContacto) values (?,?,?,?,?,?,?)";
  $cmd=preparar_select($Conexion,$sql,[$Usuario,$hash,$Nombre,$Apellido,$Documento,$Email,$Contacto]);

  if ($cmd=true) {
  header('Location:/dbRestaurant/');
  }
 }
?>

<?php include '../Libs/Head.html'?>

<style><?php include 'css/Register.css'?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Bienvenido</h1>
 </div>
</div>

<div class="Cont-Regis">
 <div class="Cont-Izq">
  <div class="img"><img src="img/Registro.svg"></div>
 </div>
 <div class="Cont-Der">
  <div class="Reg-Content">
   <form id="Form-Regis" method="POST" action="Register.php">
	<img src="img/avatar.svg">
	<h2 class="title">Registrarse</h2>

	<div class="input-div one sma">
     <div class="i"><i class="fas fa-user"></i></div>
     <div class="div">
      <h5>Usuario</h5>
      <input type="text" name="Usuario" class="input" required onblur="Usuariov(value);">
     </div>
	</div>
     <p class="pdi" id="pdia">Puedes usar letras y números</p>
     <input type="hidden" name="uoc" id="iuoc" value="0">

	<div class="input-div pass sma">
     <div class="i"><i class="fas fa-lock"></i></div>
     <div class="div">
      <h5>Contraseña</h5>
      <input id="Contraseña" name="Contraseña" type="password" class="input" required onblur="Password(value);">
	 </div>
	 <div id="vbc" class="i"><i id="icontra" class="far fa-eye Vis"></i></div>
	</div>
     <p class="pdi" id="pdib">Usa 8 o más caracteres con una combinación de letras (Mayusculas y Minusculas) y números</p>
     <input type="hidden" name="coc" id="icoc" value="0">

	<div class="input-div one">
     <div class="i"><i class="fas fa-user-circle"></i></div>
     <div class="div">
	  <h5>Nombre</h5>
	  <input id="Nombre" name="Nombre" type="text" class="input" required>
     </div>
	</div>
	
	<div class="input-div one">
     <div class="i"><i class="fas fa-user-circle"></i></div>
     <div class="div">
	  <h5>Apellido</h5>
	  <input id="Apellido" name="Apellido" type="text" class="input" required>
     </div>
	</div>

	<div class="input-div one">
     <div class="i"><i class="fas fa-address-card"></i></div>
     <div class="div">
	  <h5>Documento</h5>
	  <input id="DNI" name="Documento" type="number" class="input" required>
     </div>
	</div>

	<div class="input-div one">
     <div class="i"><i class="fas fa-at"></i></div>
     <div class="div">
	  <h5>Email</h5>
	  <input id="Email" name="Email" type="email" class="input" required>
     </div>
	</div>

	<div class="input-div one">
     <div class="i"><i class="fas fa-mobile-alt"></i></div>
     <div class="div">
	  <h5>Contacto</h5>
	  <input id="Celular" name="Contacto" type="number" class="input" required>
     </div>
	</div>

	<br>
	<input type="submit" class="btn" value="Registrarse">
	<span><p class="pp">¿Ya tienes Cuenta? <a id="nc" href="Login.php"> Iniciar Sesion</a></p></span>
   </form>
  </div>
 </div>
</div>

<?php include '../Libs/Footer.php'; ?>
<script><?php include 'js/Register.js' ?></script>