<?php include "../Libs/Header.php"; ?>

<?php
 if (!empty($_GET["iId"])) {
  $iIdPago=$_GET["iId"];
  $sql="SELECT * FROM PAGOS WHERE iIdPago=?";
  $datos=preparar_select($Conexion,$sql,[$iIdPago]);

  if ($datos->num_rows>0) {
   $fila=$datos->fetch_assoc();
  }
 }
   
 else {
  if (!empty($_POST)) {
   $iIdPago=$_POST["iIdPago"];
   $sDescripcion=$_POST["txtsDescripcion"];

   $actualizar="UPDATE PAGOS SET sDescripcion=? WHERE iIdPago=?";
   $cmd=preparar_query($Conexion,$actualizar,[$sDescripcion,$iIdPago]);

   if ($cmd) {
    echo '<script>
     location.href ="/dbRestaurant/Pagos/"; 
    </script>';
   }

    else {
     echo "Error en la Insercion";
    }
  }
 }
?>


<style><?php include "css/Update.css"; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Pagos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Pagos</h1>
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
   <img src="img/Pagos.svg">
   <input type="hidden" name="iIdPago" value=<?php echo $fila["iIdPago"];?>>
   <h2 class="title">Modificar</h2>
   <div class="input-div one">
    <div class="i">
	 <i class="fas fa-file-signature"></i>
    </div>
    <div class="div">
     <h5>Descripcion</h5>
     <input type="text" class="input" name="txtsDescripcion" value="<?php echo $fila["sDescripcion"]; ?>" required>
    </div>
   </div>
   <input type="submit" class="btn" value="Modificar">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Update.js'?></script>