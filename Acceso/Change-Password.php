<?php include '../Libs/Header.php' ?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $Usuario=$_SESSION['iIdUsuario'];

  if (!empty($_POST['Nueva'])){
   $User=$_POST['Usuario'];
   $Vieja=$_POST['Vieja'];
   $Nueva=$_POST['Nueva'];
   $mje1="";
   $mje2="";   
   $sql="SELECT sClave FROM usuarios WHERE iIdUsuario=?";     
   $cmd_contra=preparar_select($Conexion,$sql,[$User]);
   $contra=$cmd_contra->fetch_assoc();/*Recupera un Valor*/
   $hashed_password=$contra["sClave"];

   if (password_verify($Vieja, $hashed_password)==TRUE) {
    $hash=password_hash($Nueva, PASSWORD_DEFAULT);
    $query="UPDATE Usuarios SET sClave=? WHERE iIdUsuario=?";
    $cmdcon=preparar_query($Conexion,$query,[$hash,$User]);
    $mje2="Contraseña Cambiada correctamente";
   }
   else {
    $mje1="La Contraseña no es correcta";
   }
  }
}
?>

<style> <?php include "css/Change-Password.css"; ?> </style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="<?php echo $ub;?>"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Clave</h1>
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
  <form method="POST" action="Change-Password.php">
   <input type="hidden" name="Usuario" value="<?php echo $Usuario; ?>">
   <img src="img/Password.svg">
   <h2 class="title">Modificar</h2>
   <?php if (!empty($mje1)) { ?>
     <div class="alert alert-danger mb-5" role="alert">
      <?php echo $mje1?>
     </div>
     <?php  } ?>
     <?php if (!empty($mje2)) { ?>
     <div class="alert alert-success mb-5" role="alert">
      <?php echo $mje2?>
     </div>
     <?php  } ?>
    <div class="input-div one">
     <div class="i">
	    <i class="fas fa-key" id="ic1"></i>
     </div>
     <div class="div">
      <h5>Clave Actual</h5>
      <input type="password" class="input" id="ca" name="Vieja" required>
     </div>
     <div class="i vbc" id="is"> 
	    <i id="icontra" class="far fa-eye Vis"></i>
	   </div>
    </div>
    <div class="input-div one sma">
     <div class="i">
	    <i class="fas fa-key" id="ic2"></i>
     </div>
     <div class="div">
      <h5>Nueva Clave</h5>
      <input type="password" class="input" id="nc" name="Nueva" required>
     </div>
    </div> 
    <p class="pdi" id="pdib">Usa 8 o más caracteres con una combinación de letras (Mayusculas y Minusculas) y números</p>
    <input type="hidden" name="coc" id="icoc" value="0">

    <div class="input-div one">
     <div class="i">
	    <i class="fas fa-key" id="ic3"></i>
     </div>
     <div class="div">
      <h5>Repetir Clave</h5>
      <input type="password" class="input" id="rc" name="Repetir" required>
     </div>
    </div>   
    <input type="submit" class="btn" value="Aplicar">
  </form>
 </div>
</div>

<?php include "../Libs/Footer.php"; ?>
<script><?php include "js/Change-Password.js"; ?></script>