<?php 
 include '../libs/Conexion.php';
 include '../libs/Funciones.php';
 session_start();
 if (isset($_SERVER['HTTP_REFERER'])) {
  $ub=$_SERVER['HTTP_REFERER'];
  echo "<script>console.log( 'Ubicacion Anterior: " . $ub . "' );</script>";
 }
?>

<?php 
 $update="UPDATE Visitas SET iCantidad=iCantidad+1 WHERE iIdVisita=5";
 $cmdup=preparar_query($Conexion,$update);
?>

<?php 

 $mje="";

 if (isset($_POST['Usuario'])) {
  $Usuario=$_POST['Usuario'];     
  $Clave=$_POST['Clave'];
  $sql="select * from usuarios where sLogin=?";     
  $datos=preparar_select($Conexion,$sql,[$Usuario],"s");

  if ($datos->num_rows>0) {	
   $fila=$datos->fetch_assoc();
   $hashed_password=$fila['sClave'];
   if (password_verify($Clave, $hashed_password)) {
    $_SESSION['iIdUsuario']=$fila['iIdUsuario'];
    $_SESSION['sLogin']=$fila['sLogin'];
    $_SESSION['sApellido']=$fila['sApellido'];
    $_SESSION['sNombre']=$fila['sNombre'];
    header("Location:/dbRestaurant/");
   }

   else {
    $mje="Datos Incorrectos. Vuelve a Ingresarlos";
   }
  }

  else {
   $mje="Datos Incorrectos. Vuelve a Ingresarlos";
  }
 }


?>

<?php include '../Libs/Head.html'?>

<style><?php include 'css/login.css'?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Bienvenido</h1>
 </div>
</div>

<div class="Cont-Regis">
 <div class="Cont-Izq">
  <div class="img"><img src="img/Logueo.svg"></div>
 </div>
 <div class="Cont-Der">
  <div class="Reg-Content">
   <form method="POST" action="Login.php">
	<img src="img/avatar.svg">
	<h2 class="title">Iniciar Sesion</h2>
     <?php if (!empty($mje)) { ?>
     <div class="alert alert-danger mb-5" role="alert">
      <?php echo $mje?>
     </div>
     <?php  } ?>
	<div class="input-div one">
     <div class="i"><i class="fas fa-user"></i></div>
     <div class="div">
      <h5>Usuario</h5>
      <input type="text" name="Usuario" class="input" required>
     </div>
	</div>

	<div class="input-div pass">
     <div class="i"><i class="fas fa-lock"></i></div>
     <div class="div">
      <h5>Contraseña</h5>
      <input id="Contraseña" name="Clave" type="password" class="input" required>
	 </div>
	 <div id="vbc" class="i"><i id="icontra" class="far fa-eye Vis"></i></div>
	</div>

	<br>
	<a id="oc" href="RecoverPassword.php">¿Olvidaste tu Contraseña?</a>
	<input type="submit" class="btn" value="Iniciar Sesion">
	<span><p class="pp">¿No Tienes una Cuenta? <a id="nc" href="Register.php"> Registrarse</a></p></span>
   </form>
  </div>
 </div>
</div>

<?php include '../Libs/Footer.php'; ?>
<script><?php include 'js/Login.js' ?></script>