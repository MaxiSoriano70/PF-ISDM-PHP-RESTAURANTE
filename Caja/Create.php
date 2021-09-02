<?php include "../Libs/Header.php"; ?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $Usur=$_SESSION['iIdUsuario'];
  $sql="SELECT sNombre FROM Permisos WHERE iIdPermiso=(SELECT iIdPermiso FROM Usuarios WHERE iIdUsuario=?)";
  $cmd=preparar_select($Conexion,$sql,[$Usur]);
  $res=$cmd->fetch_assoc();

  if ((''.$res["sNombre"].''!="Gerente") AND (''.$res["sNombre"].''!="Empleado")) {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
  else {
 
   $sqlcj="SELECT iIdApertura FROM Caja WHERE sEstado='Abierto'";
   $cmdcj=preparar_select($Conexion,$sqlcj);
   $rcj=$cmdcj->fetch_assoc();
 
   if ($cmdcj->num_rows==0) {

   $sqlvd="SELECT CONCAT(sNombre,' ',sApellido) AS Empleado FROM Usuarios WHERE iIdUsuario=?";
   $cmdvd=preparar_select($Conexion,$sqlvd,[$Usur]);
   $resvd=$cmdvd->fetch_assoc();
   }

   else {
    echo '<script>
     location.href ="/dbRestaurant/Caja/Close.php"; 
    </script>';
   }

  }
 }
?>

<?php 
 if (!empty($_POST)) {
  $iIdEmpleado=$_POST['iIdEmpleado'];
  $Monto=$_POST["Monto"];

  $sqlnc="INSERT INTO Caja (iIdUsuario,dFechaApertura,fMontoInicial,fMontoTotal) values (?,now(),?,?)";          
  $cmdnc=preparar_query($Conexion,$sqlnc,[$iIdEmpleado,$Monto,$Monto]);

  if ($cmdnc) {
   $sqlop="SELECT sNombre FROM Permisos WHERE iIdPermiso=(SELECT iIdPermiso FROM Usuarios WHERE iIdUsuario=?)";
   $cmdop=preparar_select($Conexion,$sqlop,[$iIdEmpleado]);
   $resop=$cmdop->fetch_assoc();
 
   if (''.$res["sNombre"].''=="Gerente") {
    echo '<script>
     location.href ="/dbRestaurant/Caja/"; 
    </script>';
   } 
   else {
    echo '<script>
     location.href ="/dbRestaurant/"; 
    </script>';
   } 
  }
 }
?>


<style><?php include 'css/Create.css'?></style>

<div class="hed">
 <div class="hed-cont">
  <?php if (''.$res["sNombre"].''=="Gerente") { ?>
  <a id="atras" href="/dbRestaurant/Caja/"><i class="fas fa-arrow-left icb"></i></a>
  <?php } else { ?> 
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <?php } ?>
  <h1 class="Title-Admin">Caja</h1>
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

<div class="Cont-Regis">
 <div class="Cont-Izq">
  <div class="img"><img src="img/Apertura.svg"></div>
 </div>
 <div class="Cont-Der">
  <div class="Reg-Content">
   <form method="POST" action="Create.php">
   <input type="hidden" name="iIdEmpleado" value="<?php echo $Usur; ?>">
	<img src="img/Caja.svg">
	<h2 class="title">Apertura</h2>
	<div class="input-div one">
     <div class="i"><i class="fas fa-user"></i></div>
     <div class="div">
      <h5>Usuario</h5>
      <input type="text" class="input" value="<?php echo $resvd['Empleado']; ?>" required disabled>
     </div>
    </div>
    <div class="input-div one">
     <div class="i"><i class="fas fa-file-invoice-dollar"></i></div>
     <div class="div">
      <h5>Monto Inicial</h5>
      <input type="number" step="any" name="Monto" class="input" value="550" required>
     </div>
	</div>

	<br>
	<input type="submit" class="btn" value="Abrir Caja">
   </form>
  </div>
 </div>
</div>

<?php include '../Libs/Footer.php'; ?>
<script><?php include 'js/Create.js' ?></script>