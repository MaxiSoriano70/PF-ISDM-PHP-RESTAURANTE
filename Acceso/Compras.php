<?php include '../Libs/Header.php' ?>

<?php

 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 } 
 else {
  $iIdUsuario=$_SESSION['iIdUsuario'];
  $sqlg="SELECT iIdVenta,dFecha,sDireccion,fTotal,sEstado FROM ventas WHERE iIdUsuario=? AND bEliminado=0";
  $cmdg=preparar_select($Conexion,$sqlg,[$iIdUsuario]);

  $sqld="SELECT i.sNombreArchivo,p.sNombre,dv.iCantidad,dv.fPrecio,dv.fSubtotal FROM platillos p INNER JOIN platillo_imagen pi INNER JOIN imagenes i INNER JOIN ventas v INNER JOIN detalle_venta dv ON p.iIdPlatillo=pi.iIdPlatillo AND i.iIdImagen=pi.iIdImagen AND v.iIdVenta=dv.iIdVenta AND p.iIdPlatillo=dv.iIdPlatillo WHERE v.iIdVenta=? AND i.bEliminado=0 AND pi.iOrden=1 AND v.bEliminado=0";
 }
?>

<style><?php include 'css/Compras.css';?></style>
<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Mis Compras</h1>
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

<?php if ($cmdg->num_rows>0) { ?>
<div class="Bod">
<div class="Cont-Tv">
<?php $nv=1;
 foreach ($cmdg as $General) { ?>
<div class="Conten">
 <div class="Arrib">
  <h2 class="tv">Compra N° <?php echo $nv; ?></h2>
   <p class="pv">Realizado el <?php echo $General['dFecha']; ?></p>
 </div>
 <hr>
 <div class="Abaj">
  <div class="Det-Vnt">
   <?php $cmdd=preparar_select($Conexion,$sqld,[$General['iIdVenta']]); ?>
   <?php foreach ($cmdd as $Detalle) { ?>
   <div class="Produ">
    <div class="ImIzq">
     <img src="/dbRestaurant/Imagenes/<?php echo $Detalle['sNombreArchivo']; ?>" alt="Imagen" width="100px" height="100%" class="Im">
    </div>
    <div class="Desc">
    <div class="InfoDer">
     <p class="Titdet"><?php echo $Detalle['sNombre']; ?></p>
     <p class="prxcan">
      <?php 
       $can=$Detalle['iCantidad'];
       $Precio=$Detalle['fPrecio'];
       $C=-3;
       $Cant=strlen($Precio)-3;
       $Entero=substr($Precio,0,$C);
       $Decimal=substr($Precio,$Cant+1);
      ?>
      <?php echo '<b>$ ' .$Entero. '<sup>'.$Decimal.'</sup></b> X ' . $can.' ';
      if ($can>1) {echo 'Unidades';} else {echo 'Unidad';}?>
     </p>
     <div class="detsub">TOTAL : $ <?php echo $Detalle['fSubtotal']; ?></div>
    </div>
   </div>
   </div>
   <?php } ?>
  </div>
  <div class="Gral-Vnt">
   <div class="Cart-Der">
    <div class="Card-Detalle">
     <h3 class="card-title text-left">Resumen</h3>
     <div class="dropdown-divider"></div>
     <div class="p mt-5" style="height:30px">
      <span class="card-text float-left">Subtotal</span>
      <span class="card-text float-right">$ <?php echo $General['fTotal']; ?> </span>
     </div>
     <div class="dropdown-divider"></div>
     <div class="pi mt-4" style="height:30px">
      <b><span class="card-text float-left">TOTAL</span>
      <span class="card-text float-right">$ <?php echo $General['fTotal']; ?> </span></b>
     </div>
     <div class="dropdown-divider mb-5"></div>
     <a id="Conf-Vent" class="text-white tw btn btn-success mb-2 px-2 py-3 w-100" href="VerComprobante.php?iId=<?php echo $General["iIdVenta"]?>">Ver Comprobante</a>
     <a id="Conf-Vent" class="text-white tw btn btn-danger mb-2 px-2 py-3 w-100" href="Delete_logic.php?iId=<?php echo $General["iIdVenta"]?>">Eliminar</a>
    </div>
   </div>
  </div>
 </div>
</div>

<?php
  $nv++;
  } 
?>
</div>
</div>
<?php } else { ?>
  <div class="Cont-Alert w-100 h-50 d-flex justify-content-center align-items-center">
   <div class="alert alert-warning w-100 h-100 text-center d-flex justify-content-center align-items-center" role="alert">
     <div class="aux">
    <h4><strong><i class="fas fa-exclamation-triangle mr-2"></i>¡ ATENCIÓN !<i class="fas fa-exclamation-triangle ml-2"></i></strong></h4> No tienes ningún artículo en tu Pantalla de Compras
    </div>
   </div>
  </div>
<?php } ?>


<?php include '../Libs/Footer.php' ?>