<?php
 $sql="select * from Menus";
 $cmd=preparar_select($Conexion,$sql);
?>

<style><?php include 'css/Menus.css';?></style>
<div class="Container-Menus">
 <h1 class="Title-Menus">Menus</h1>
 <div class="Content-Menus">
 <?php  

 $sqlPlatillo="SELECT p.iIdPlatillo FROM platillos p WHERE bMenu=?";

 $sqlImagen="SELECT i.sNombreArchivo FROM imagenes i INNER JOIN platillo_imagen pi INNER JOIN platillos p ON p.iIdPlatillo=pi.iIdPlatillo AND pi.iIdImagen=i.iIdImagen WHERE p.iIdPlatillo=?";

 foreach ($cmd as $Menus) { ?>
  <?php
  $cmdPlatillo=preparar_select($Conexion,$sqlPlatillo,[$Menus['iIdMenu']]);
  $iIdPlatillo=$cmdPlatillo->fetch_assoc();

  $cmdImagen=preparar_select($Conexion,$sqlImagen,[$iIdPlatillo['iIdPlatillo']]);
  $Imagen=$cmdImagen->fetch_assoc();
  ?>

  <a href="Menus/Individual.php?iIdMenu=<?php echo $Menus['iIdMenu']?>" class="Menu-Individual">
  	<img id="img-Menu" src="/dbRestaurant/Imagenes/<?php echo $Imagen['sNombreArchivo'] ?>" width="90px" height="100%">	
    <p class="p-Menu"><?php echo $Menus['sNombre']?></p> 
  </a>
  <?php } ?>

 </div>
</div>
