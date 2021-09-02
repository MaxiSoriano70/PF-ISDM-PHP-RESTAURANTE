<?php
      include "../Libs/Header.php";
?>

<?php
if (!empty($_GET['iId'])) {
 $iIdPlatillo=$_GET['iId'];
}

else {
 if (!empty($_POST)) {
  $iIdPlatillo=$_POST['iIdPlatillo'];

  $sdp="delete from insumo_platillo where iIdPlatillo=?";
  $cdp=preparar_select($Conexion,$sdp,[$iIdPlatillo]);

  $sqlb="insert into Insumo_Platillo (iIdPlatillo,iIdInsumo,iCantidad) values (?,?,?)";
                  
  $can=$_POST['quan'];
  $p=0;
  $vector=array();
  for ($i=0;$i<count($can);$i++) {
   if ($can[$i]!=0) {
    $vector[$p]=$can[$i];
    $p++;
   }
  }
  $res=count($vector);
                     
  $i=0;
  foreach($_POST['Ids'] as $IId) {     
     $aux=$vector[$i];         
     $cmdb=preparar_query($Conexion,$sqlb,[$iIdPlatillo,$IId,$aux]);
     $i++;
  }

  if ($cmdb) {
   echo '<script>
    location.href ="/dbRestaurant/Platillos/"; 
   </script>';
  }

 }
}

$sql="Select iIdInsumo,sNombre from insumos where bEliminado=0";
$cmd=preparar_select($Conexion,$sql);
$titulos=$cmd->fetch_fields();
?>

<?php
$sqla="select p.*,i.sNombreArchivo,sPath from platillos p inner join Platillo_Imagen pi on p.iIdPlatillo=pi.iIdPlatillo inner join Imagenes i on pi.iIdImagen=i.iIdImagen where pi.iOrden=1 and p.iIdPlatillo=?";
$cmda=preparar_select($Conexion,$sqla,[$iIdPlatillo]);
$tit=$cmda->fetch_assoc();
?>

<style><?php include 'css/Insumos.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Platillos/"><i class="fas fa-arrow-left icb"></i></a>
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

<form id="InsumoPlatillo" action="Insumos.php" method="POST">
 <input type="hidden" name="iIdPlatillo" value="<?php echo $iIdPlatillo;?>">
 <div class="table-responsive">
  <table class="table table-hover" id="example">
   <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important"> 
    <th>Seleccion</th>            
    <?php                             
    foreach($titulos as $titulo) {
     echo "<th>".substr($titulo->name,1)."</th>";                              
    }              
    ?>
    <th>Cantidad</th>  
   </thead>

   <tbody class="table-bordered text-center">

    <?php
     if ($cmd->num_rows>0) {
       $cont=1;
      foreach($cmd as $fila) {
       
       echo "<tr>";
       $f=$fila['iIdInsumo'];

       $sql="select count(*) as Cantidad from Insumo_Platillo ip where ip.iIdPlatillo=? and ip.iIdInsumo=?";
       $cmdXPla=preparar_select($Conexion,$sql,[$iIdPlatillo,$f]);
       $chek=$cmdXPla->fetch_assoc();

       if ($chek['Cantidad']==0) {
        echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><input class="cxs ch'.$cont.'" type="checkbox" name="Ids[]" value="'.$fila['iIdInsumo'].'" onclick="identificador('.$cont.');"></td>';
       }
       else {
        echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><input class="cxs ch'.$cont.'" type="checkbox" name="Ids[]" value="'.$fila['iIdInsumo'].'" checked onclick="identificador('.$cont.');"></td>';     
       }
                                                
       foreach($titulos as $titulo) {
        echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila[$titulo->name].'</td>';
       }
                                                

       $sqlc='select iCantidad from insumo_platillo where iIdPlatillo=? and iIdInsumo=?';
       $cmdc=preparar_select($Conexion,$sqlc,[$iIdPlatillo,$f]);
       $rc=$cmdc->fetch_assoc();
    ?>

      <td>
       <div id="brs" class="input-group ml-auto mr-auto" style="max-width: 120px;">
        <div class="input-group-prepend">
          <button class="btn btn-primary js-btn-minus in<?php echo $cont ?>" type="button">&minus;</button>
        </div>
        <input type="number" class="form-control text-center in<?php echo $cont ?>" min="1" value="<?php echo $rc['iCantidad'] ?>" name='quan[]'>
        <div class="input-group-append">
          <button class="btn btn-primary js-btn-plus in<?php echo $cont ?>" type="button">&plus;</button>
        </div>
        </div>
      </td>
                                       
      <?php 
        $cont++;
        echo "</tr>";
        }
       }
      ?>                          
   </tbody>
  </table>
 </div>

<br>

 <div class="ml-4 text-center mt-5">
 <input type="submit" class="btn btn-primary btn-sm py-2 text-center" value="Agregar / Actualizar">
 </div>

</form>
<br><br><br><br><br><br><br>


<?php
      include "../Libs/Footer.php";
?>

<script><?php include 'js/Insumos.js' ?></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/owl.carousel.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

