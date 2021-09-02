<?php 
 include "../Libs/Header.php";

 if (!empty($_GET['iId'])) {
  $iIdPlatillo=$_GET['iId'];
 }

 else {
  if (!empty($_POST)) {
   $iIdPlatillo=$_POST["iIdPlatillo"];
   $iOrden=$_POST['txtiOrden'];
   $sNombreArchivo=$_FILES['fileImagen']['name'];
   $sTipoExtension=$_FILES['fileImagen']['type'];
   $sPath=$_SERVER['DOCUMENT_ROOT'].'/dbRestaurant/Imagenes';

   move_uploaded_file($_FILES['fileImagen']['tmp_name'],$sPath."/".$sNombreArchivo);

   $sql="insert into imagenes(sNombreArchivo,sTipoExtension,sPath) values (?,?,?)";
   $cmd=preparar_query($Conexion,$sql,[$sNombreArchivo,$sTipoExtension,$sPath]);

   if ($cmd=true) {
    $iIdImagen=$Conexion->insert_id;
    $sql="insert into Platillo_Imagen(iIdPlatillo,iIdImagen,iOrden) values (?,?,?)";
    $cmd=preparar_query($Conexion,$sql,[$iIdPlatillo,$iIdImagen,$iOrden]);

    if ($cmd) {
     echo '<script>
      location.href ="/dbRestaurant/Platillos/"; 
     </script>';
    }  
   } 
  }
 }

 $mostrar="select pi.*,i.sNombreArchivo from platillo_imagen pi inner join Imagenes i on i.iIdImagen=pi.iIdImagen where pi.iIdPlatillo=?";
 $imagenes=preparar_select($Conexion,$mostrar,[$iIdPlatillo]);
?>



<style><?php include 'css/Imagenes.css' ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Platillos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Platillos</h1>
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
  <form name="Crear" enctype="multipart/form-data" method="POST" action="Imagenes.php">
  <input type="hidden" name="iIdPlatillo" value=<?php echo $iIdPlatillo;?>>
	<img src="img/Img.svg">
  <h2 class="title">Agregar</h2>
  <input type="file" name="fileImagen" class="file" id="archivoInput" required onchange="return validarExt()">
   <label for="archivoInput">
    <i class="fas fa-photo-video"></i> &nbsp; 
    Elige Imagen
   </label>
  <div id="visorArchivo"></div>
	<div class="input-div one">
   <div class="i">
    <i class="fas fa-sort-amount-up-alt"></i>
   </div>
   <div class="div">
    <h5>Orden</h5>
    <input type="number" name="txtiOrden" class="input" required>
   </div>
  </div>
	<input type="submit" id="btn" value="Aplicar">
  </form>
 </div>
</div>


 
<div class="table-responsive">
  <table class="table table-hover" id="example">
    <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important">
     <tr style="text-align:center">                                    
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Orden</th>
      <th>Acciones</th>                                        
     </tr> 
    </thead>

    <tbody class="table-bordered text-center">
     <?php
      if ($imagenes->num_rows>0) {                    
       foreach($imagenes as $imagen) {
        echo "<tr style='text-align:center height:60px'>";
         echo "<td><img src='/dbRestaurant/Imagenes/". $imagen['sNombreArchivo'] . "' width='50px' height='50px'></td>";
         echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$imagen["sNombreArchivo"].'</td>';                       
         echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$imagen["iOrden"].'</td>';
                                                                
         echo '<td style="height:60px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';

         if ($imagen['bEliminado']==0) {
          echo '<div class="px-1"><a href="Delete.php?iIdPlaIm='.$imagen['iIdPlatillo_Imagen'].'&iIdIm='.$imagen['iIdImagen'].'&iId='.$imagen['iIdPlatillo'].'" class="btn btn-danger btn-sm py-2"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div>';
         }
         
         else {
          echo '<div class="px-1"><a href="Recuperar.php?iIdPlaIm='.$imagen['iIdPlatillo_Imagen'].'&iIdIm='.$imagen['iIdImagen'].'&iId='.$imagen['iIdPlatillo'].'" class="btn btn-secondary btn-sm py-2" style="color:#fff"><i class="fas fa-trash-restore-alt mr-2"></i>Restore</a></div>';
         }
                                                                           
       echo "</div>";
       echo '</td>';
                      
       echo "</tr>";

       }
      }                                       
   ?>
                                                                                      
   </tbody>                    
  </table>
 </div>

          
<br><br><br><br><br><br><br><br>

<?php include "../Libs/Footer.php"; ?>

<script><?php include 'js/Imagenes.js' ?></script>
