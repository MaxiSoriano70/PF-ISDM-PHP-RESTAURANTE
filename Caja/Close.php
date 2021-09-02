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
 
   $sqlcj="SELECT iIdApertura,fMontoInicial FROM Caja WHERE sEstado='Abierto'";
   $cmdcj=preparar_select($Conexion,$sqlcj);
   $rcj=$cmdcj->fetch_assoc();
 
   if ($cmdcj->num_rows>0) {

     $sqlvd="SELECT CONCAT(sNombre,' ',sApellido) AS Empleado FROM Usuarios WHERE iIdUsuario=?";
     $cmdvd=preparar_select($Conexion,$sqlvd,[$Usur]);
     $resvd=$cmdvd->fetch_assoc();

     $sqltv="SELECT IFNULL(SUM(fTotal),0) AS SubVentas FROM ventas where iIdApertura=?";
     $cmdtv=preparar_select($Conexion,$sqltv,[$rcj['iIdApertura']]);
     $rtv=$cmdtv->fetch_assoc();

     $sqltc="SELECT IFNULL(SUM(fTotal),0) AS SubCompras FROM compras where iIdApertura=?";
     $cmdtc=preparar_select($Conexion,$sqltc,[$rcj['iIdApertura']]);
     $rtc=$cmdtc->fetch_assoc();

     $sqlte="SELECT IFNULL(SUM(fTotal),0) AS SubEgresos FROM egresos WHERE iIdApertura=?";
     $cmdte=preparar_select($Conexion,$sqlte,[$rcj['iIdApertura']]);
     $rte=$cmdte->fetch_assoc();

     $Egresos=$rtc['SubCompras']+$rte['SubEgresos'];
     $Ingresos=$rtv['SubVentas'];

     $Total=($rcj['fMontoInicial']+$Ingresos)-$Egresos;
   }

   else {
    echo '<script>
     location.href ="/dbRestaurant/Caja/Create.php"; 
    </script>';
   }

  }
 }
?>
<?php 
 if (!empty($_POST)){
  $iIdEmpleado=$_POST['iIdEmpleado'];
  $Monto=$_POST["Monto"];
  $sqlcierre="UPDATE caja SET dFechaCierre=now(),fMontoTotal=?,sEstado='Cerrado' WHERE iIdApertura=?";
  $cmdcierre=preparar_query($Conexion,$sqlcierre,[$Monto,$rcj['iIdApertura']]);
  if ($cmdcierre) {
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
<style><?php include 'css/Close.css'?></style>

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
  <div class="img"><img src="img/Close.svg"></div>
 </div>
 <div class="Cont-Der">
  <div class="Reg-Content">
   <form method="POST" action="Close.php">
   <input type="hidden" name="iIdEmpleado" value="<?php echo $Usur; ?>">
	<img src="img/Caja.svg">
	<h2 class="title">Cierre</h2>
	<div class="input-div one">
     <div class="i"><i class="fas fa-user"></i></div>
     <div class="div">
      <h5>Usuario</h5>
      <input type="text" class="input" value="<?php echo $resvd['Empleado']; ?>" required disabled>
     </div>
   </div>
   <div class="input-div one">
     <div class="i"><i class="fas fa-comments-dollar"></i></div>
     <div class="div">
      <h5>Ingresos</h5>
      <input type="number" step="any" name="Ingresos" class="input" value="<?php echo $Ingresos; ?>" required disabled>
     </div>
   </div>
   <div class="input-div one">
     <div class="i"><i class="fas fa-comments-dollar"></i></div>
     <div class="div">
      <h5>Egresos</h5>
      <input type="number" step="any" name="Egresos" class="input" value="<?php echo $Egresos; ?>" required disabled>
     </div>
   </div>
   <div class="input-div one">
     <div class="i"><i class="fas fa-file-invoice-dollar"></i></div>
     <div class="div">
      <h5>Monto Final</h5>
      <input type="number" step="any" name="Monto-C" class="input" value="<?php echo $Total; ?>" required disabled>
      <input type="hidden" step="any" name="Monto" class="input" value="<?php echo $Total; ?>" >
     </div>
	</div>

	<br>
   <input type="submit" class="btns" value="Cerrar Caja">
   <button id="mov" type="button" class="btnmov">Movimientos</button>
   </form>
  </div>
 </div>
</div>


<?php 
 include 'Modal.php';
 include '../Libs/Footer.php'; 
?>
<script><?php include 'js/Close.js' ?></script>




