<?php include "../Libs/Header.php"; ?>

<?php

if(!empty($_GET["iId"])) {
  $iIdPermisoActual=$_GET['iId'];
  $sql="select * from permisos where iIdPermiso=?";
  $datos=preparar_select($Conexion,$sql,[$iIdPermisoActual]);
  if($datos->num_rows>0){
	$fila=$datos->fetch_assoc();
  }
  else{
	echo "Error: ".$sql." ".$cmd->error;
  }
}

else {
  if(!empty($_POST)) {
	$iIdPermiso=$_POST["iIdPermiso"];
	$Nombre=$_POST["Nombre"];
	$Descripcion=$_POST["Descripcion"];
	$sql="update permisos set sNombre=?,sDescripcion=? where iIdPermiso=?";
	$cmd=preparar_query($Conexion,$sql,[$Nombre,$Descripcion,$iIdPermiso]);
	if ($cmd)
	{
   echo '<script>
    location.href ="/dbRestaurant/Permisos/"; 
   </script>';
	}
	else {
	echo "Error: ".$sql." ".$cmd->error;
	}
  }
}

?>


<style><?php include "css/Update.css"; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Permisos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Permisos</h1>
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
   <img src="img/log.svg">
   <input type="hidden" name="iIdPermiso" value="<?php echo $fila["iIdPermiso"]; ?>"/>
   <h2 class="title">Modificar</h2>
   <div class="input-div one">
    <div class="i">
	 <i class="fas fa-file-signature"></i>
    </div>
    <div class="div">
     <h5>Nombre</h5>
     <input type="text" class="input" name="Nombre" value="<?php echo $fila["sNombre"]; ?>" required>
    </div>
   </div>
   <div class="input-div one">
    <div class="i">
	 <i class="fas fa-file-signature"></i>
    </div>
    <div class="div">
     <h5>Descripcion</h5>
     <input type="text" class="input" name="Descripcion" value="<?php echo $fila["sDescripcion"]; ?>" required>
    </div>
   </div>
   <input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>
<?php
      include "../Libs/Footer.php";
?>
<script type="text/javascript" src="js/Update.js"></script>