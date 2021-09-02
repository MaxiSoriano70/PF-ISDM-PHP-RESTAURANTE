<?php include "../Libs/Header.php"; ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../Platillos/css/dataTables.bootstrap4.min.css">

<?php 
 if (!empty($_GET['iId'])) {
  $iIdVenta=$_GET['iId'];

  $sqltabla="SELECT p.sNombre,i.sNombreArchivo, dv.iCantidad, dv.fPrecio, dv.fSubtotal FROM platillos p INNER JOIN platillo_imagen pi INNER JOIN imagenes i INNER JOIN ventas v INNER JOIN detalle_venta dv ON p.iIdPlatillo=pi.iIdPlatillo AND i.iIdImagen=pi.iIdImagen AND p.iIdPlatillo=dv.iIdPlatillo AND v.iIdVenta=dv.iIdVenta WHERE v.iIdVenta=? AND p.bEliminado=0 AND pi.iOrden=1";
  $cmdtabla=preparar_select($Conexion,$sqltabla,[$iIdVenta]);
  $titulos=$cmdtabla->fetch_fields();
 }
?>

<style><?php include 'css/Detalle.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Ventas/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Venta N° <?php echo $iIdVenta?></h1>
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

<div class="table-responsive px-5">
 <table class="table">
  <thead class="text-center">
   <tr>
    <th class="mx-5" colspan="2" scope="col">Producto</th>
    <th class="mx-5 px-5" scope="col">Precio</th>
    <th class="mx-5" scope="col">Cantidad</th>
    <th class="mx-5" scope="col">Subtotal</th>
   </tr>
  </thead>
  <tbody class="text-center">
  <?php                             
  $t=0;

  foreach($cmdtabla as $titulo) {  ?>
   <tr id="Botones">
    <th scope="row" style="vertical-align:middle;">
     <img src="../Imagenes/<?php echo $titulo['sNombreArchivo'];?>" width='200px' height='200px' alt="..." class="implat">
    </th>
    <td style="vertical-align:middle;" scope="row"><?php echo $titulo['sNombre']?></td>
    <?php 
     $Precio=$titulo['fPrecio'];
     $C=-3;
     $Cant=strlen($Precio)-3;
     $Entero=substr($Precio,0,$C);
     $Decimal=substr($Precio,$Cant+1);
    ?>
    <td style="vertical-align:middle;">$ <?php echo $Entero. '<sup>'.$Decimal.'</sup>' ?></td>
    <?php $can=$titulo['iCantidad'];?>
    <td style="vertical-align:middle;"><?php echo $titulo['iCantidad']; if ($can>1) {echo ' Unidades';} else {echo ' Unidad';}?></td>
    <td class="product" style="vertical-align:middle;">$ <?php echo $titulo['fSubtotal']?></td>
    <?php $t=$t+$titulo['fSubtotal']?>
   </tr>
   <?php } ?>
  </tbody>
 </table>
</div>

<div class="Cart-Abajo">
 <div class="Cart-Izq">
 </div>
 <div class="Cart-Der">
  <div class="Card-Detalle">
   <h3 class="card-title text-left mt-5">Resumen</h3>
   <div class="dropdown-divider"></div>
   <div class="p mt-5" style="height:30px">
    <span class="card-text float-left">Subtotal</span>
    <span class="card-text float-right fResultado">$ <?php echo $t;?></span>
   </div>
   <div class="dropdown-divider"></div>
   <div class="pi mt-4" style="height:30px">
    <b><span class="card-text float-left">TOTAL</span>
    <span class="card-text float-right fResultado">$ <?php echo $t;?></span></b>
   </div>
   <div class="dropdown-divider mb-5"></div>
  </div>
 </div>
</div>

<br>
<?php include '../Libs/Footer.php' ?>