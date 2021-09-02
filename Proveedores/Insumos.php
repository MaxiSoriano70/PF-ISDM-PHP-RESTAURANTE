<?php  
 include "../libs/Header.php";
 
 if (!empty($_GET['iId'])) {
  $iIdProveedor=$_GET['iId'];
 }
 else {
  if (!empty($_POST)) {
   $iIdProveedor=$_POST['iIdProveedor'];       
   $sdp="delete from PROVXINS where iIdProveedor=?";
   $cdp=preparar_select($Conexion,$sdp,[$iIdProveedor]);
   $sqlb="insert into PROVXINS (iIdProveedor,iIdInsumo) values (?,?)";

   foreach($_POST['Ids'] as $IId) {
   $cmdb=preparar_query($Conexion,$sqlb,[$iIdProveedor,$IId]);
   }

   if ($cmdb) {
    echo '<script>
     location.href ="/dbRestaurant/Proveedores/";
    </script>';
   }
  }
 }

  $sql="SELECT iIdInsumo,sNombre,fPrecio FROM INSUMOS where bEliminado=0";
  $cmd=preparar_select($Conexion,$sql);
  $titulos=$cmd->fetch_fields();

  $sqla="SELECT iIdProveedor,sNombre,sApellido FROM PROVEEDORES WHERE iIdProveedor=?";
  $cmda=preparar_select($Conexion,$sqla,[$iIdProveedor]);
  $tit=$cmda->fetch_assoc();
?>

<style><?php include 'css/Insumos.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="Index.php"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin"><?php echo $tit['sNombre']." ".$tit['sApellido']?></h1>
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

<form id="insumos_proveedores" action="Insumos.php" method="POST">
<input type="hidden" name="iIdProveedor" value="<?php echo $iIdProveedor;?>">

<div class="table-responsive">
 <table class="table table-hover" id="example">
  <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important"> 
   <th>Seleccion</th>       
   <?php                             
   foreach($titulos as $titulo) {
    echo "<th>".substr($titulo->name,1)."</th>";                              
   }                
   ?>
  </thead>

  <tbody class="table-bordered text-center">
   <?php
    if ($cmd->num_rows>0) {
     foreach($cmd as $fila) {
      echo "<tr>";
       $f=$fila['iIdInsumo'];
       $sql="SELECT count(*) as Cantidad FROM PROVXINS WHERE iIdProveedor=? AND iIdInsumo=?";
       $cmdXCat=preparar_select($Conexion,$sql,[$iIdProveedor,$f]);
       $chek=$cmdXCat->fetch_assoc();

       if ($chek['Cantidad']==0) {
        echo "<td><input type='checkbox' name='Ids[]' value='".$fila['iIdInsumo']."'></td>";
       }
       else {
        echo "<td><input type='checkbox' name='Ids[]' value='".$fila['iIdInsumo']."' checked></td>";
       }

       foreach($titulos as $titulo) {
        echo "<td>".$fila[$titulo->name]."</td>";
       }
      echo "</tr>";
     }
    }
   ?>                          
  </tbody>
 </table>
</div>

<br>
<div class="text-center mt-5">
<input type="submit" class="btn btn-primary btn-sm py-2 text-center" value="Agregar / Actualizar">
</div>
</form>
<br><br><br><br><br><br><br>


<?php include "../Libs/Footer.php"; ?>