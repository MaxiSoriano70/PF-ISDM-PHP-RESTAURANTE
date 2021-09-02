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

  if ((''.$res["sNombre"].''!="Gerente")) {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
  else {
 
   $sqlcj="SELECT iIdApertura FROM Caja WHERE sEstado='Abierto'";
   $cmdcj=preparar_select($Conexion,$sqlcj);
   $rcj=$cmdcj->fetch_assoc();
 
   if ($cmdcj->num_rows>0) {
    $sqlsel="SELECT * FROM tipo_egreso";
    $cmdsel=preparar_select($Conexion,$sqlsel); 
   }

   else {
    echo '<script>
     location.href ="/dbRestaurant/Caja/"; 
    </script>';
   }
  }
 }
?>

<?php 
 if (!empty($_POST)) {

  $idApert=$_POST['Apert'];
  $Monto=$_POST['txtiMonto'];

  $sqlcj="SELECT fMontoTotal FROM Caja WHERE sEstado='Abierto'";
  $cmdcj=preparar_select($Conexion,$sqlcj);
  $rcj=$cmdcj->fetch_assoc();

  if ($rcj['fMontoTotal']>=$Monto) {

   if ($_POST["select"]=='Otros') {

    $Descripcion=$_POST['txtsDescripcion'];

    $sqlins="INSERT INTO tipo_egreso (sDescripcion) values (?)";
    $cmdins=preparar_query($Conexion,$sqlins,[$Descripcion]);

    $iIdTipo_Egreso=$cmdins->insert_id;

     $sqlib="INSERT INTO egresos (iIdTipo_Egreso,dFecha,fTotal,iIdApertura) values (?,now(),?,?)";
     $cmdib=preparar_query($Conexion,$sqlib,[$iIdTipo_Egreso,$Monto,$idApert]);
    }

    else {
     $select=$_POST['select'];
     $sqlnootros="INSERT INTO egresos (iIdTipo_Egreso,dFecha,fTotal,iIdApertura) values (?,now(),?,?)";
     $cmdnootros=preparar_query($Conexion,$sqlnootros,[$select,$Monto,$idApert]);
    }

    $sqlrt="UPDATE Caja SET fMontoTotal=fMontoTotal-? WHERE iIdApertura=?";
    $cmdrt=preparar_query($Conexion,$sqlrt,[$Monto,$idApert]);

    echo '<script>
     location.href ="/dbRestaurant/Caja/"; 
    </script>';
   }

   else {
    echo '<script>
    swal({
      title: "¡Saldo Insuficiente!",
      text: "¡La Caja no cubre el Total de la Extracción!",
      icon: "warning",
      button: true,
      dangerMode: true,
     })
     .then((value) => {
      switch (value) {
       default:
        location.href ="/dbRestaurant/Caja/"; 
       }
     });
    </script>';
   }
  }
?>


<style><?php include "css/Extraccion.css"; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Caja"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Extracción</h1>
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
  <form id="Form-Ext" method="POST" action="Extraccion.php">
  <input type="hidden" name="Apert" value="<?php echo $rcj['iIdApertura']; ?>">
  <img src="img/Extraccion.svg">
    <h2 class="title">Selección</h2>
  <select id="Seleciona" name="select" class="selectpicker" onchange="Textarea();" required>
   <option>Seleciona una Opción</option>

   <?php 
   foreach ($cmdsel as $selec) { 
    echo '<option value='.$selec["iIdTipo_Egreso"].'>'.$selec["sDescripcion"].'</option>';
   } 
   ?>
   <option value="Otros">Otros</option>
  </select>

  <div id="Cont-Aux">
  <div class="input-div pass" id="Titulo">
   <div class="i">
    <i class="fas fa-file-signature"></i>
   </div>
   <div class="div">
    <h5>Descripción</h5>
    <input type="text" id="Text-area" name="txtsDescripcion" class="input">
   </div>
  </div>
  </div>

  <div class="input-div pass">
   <div class="i"> 
    <i class="fas fa-dollar-sign"></i>
   </div>
   <div class="div">
    <h5>Monto</h5>
    <input id="DNI" name="txtiMonto" type="number" step="any" class="input" required>
   </div>
  </div>

  <input type="submit" class="btn" value="Extraer Dinero">
  </form>
 </div>
</div>


<?php include "../Libs/Footer.php"; ?>
<script><?php include 'js/Extraccion.js' ?></script>