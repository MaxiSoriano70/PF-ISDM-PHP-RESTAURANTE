<?php include "../Libs/Header.php"; ?>


<?php
 if (!empty($_GET['iId'])) {
  $iIdCategoria=$_GET['iId'];
 }

 else {
  if (!empty($_POST)) {
   $iIdCategoria=$_POST['iIdCategoria'];
            
   $sdp="delete from platillo_categoria where iIdCategoria=?";
   $cdp=preparar_select($Conexion,$sdp,[$iIdCategoria]);

   $sqlb="insert into Platillo_Categoria (iIdPlatillo,iIdCategoria) values (?,?)";

   foreach($_POST['Ids'] as $IId) {
    $cmdb=preparar_query($Conexion,$sqlb,[$IId,$iIdCategoria]);
   }

   if ($cmdb) {
    echo '<script>
     location.href ="/dbRestaurant/Categorias/"; 
    </script>';
   }
  }
 }

  $sql="select iIdPlatillo,sNombre,sDescripcion,fPrecio from Platillos where bEliminado=0";
  $cmd=preparar_select($Conexion,$sql);
  $titulos=$cmd->fetch_fields();
?>

<?php
  $sqla="select iIdCategoria,sNombre from Categorias where iIdCategoria=?";
  $cmda=preparar_select($Conexion,$sqla,[$iIdCategoria]);
  $tit=$cmda->fetch_assoc();
?>



<style><?php include 'css/Platillos.css'; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Categorias/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin"><?php echo $tit['sNombre']?></h1>
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

<form id="PlatilloCategoria" action="Platillos.php" method="POST">
 <input type="hidden" name="iIdCategoria" value="<?php echo $iIdCategoria;?>">

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
      $f=$fila['iIdPlatillo'];

      $sql="select count(*) as Cantidad from platillo_categoria pc where pc.iIdCategoria=? and pc.iIdPlatillo=?";
      $cmdXCat=preparar_select($Conexion,$sql,[$iIdCategoria,$f]);
      $chek=$cmdXCat->fetch_assoc();

       if ($chek['Cantidad']==0) {
        echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><input type="checkbox" name="Ids[]" value="'.$fila['iIdPlatillo'].'"></td>';                      
       }

       else {
        echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><input type="checkbox" name="Ids[]" value="'.$fila['iIdPlatillo'].'" checked></td>'; 
       }

       foreach($titulos as $titulo) {
        echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila[$titulo->name].'</td>';
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


<?php
      include "../Libs/Footer.php";
?>