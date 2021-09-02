<?php
 include '../Libs/Header.php';
?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 } 
   
 else {
  $Usuario=$_SESSION['iIdUsuario'];
  $sqlid="select iIdCarrito from carrito c where c.sEstado='En Curso' and c.iIdUsuario=?";
  $cmdid=preparar_select($Conexion,$sqlid,[$Usuario]);
  $rid=$cmdid->fetch_assoc();
  $iIdCarrito=$rid['iIdCarrito'];

  $sqltabla="SELECT p.sNombre,bMenu,dc.iIdPlatillo,iIdCarrito,iCantidad,iStock,dc.fPrecio,fSubtotal,i.sNombreArchivo FROM detalle_carrito dc INNER JOIN platillos p INNER JOIN Platillo_Imagen pi INNER JOIN Imagenes i ON p.iIdPlatillo=pi.iIdPlatillo AND pi.iIdImagen=i.iIdImagen where pi.iOrden=1 AND p.bEliminado=0 AND i.bEliminado=0 AND dc.iIdCarrito=? AND dc.iIdPlatillo=p.iIdPlatillo";
  $cmdtabla=preparar_select($Conexion,$sqltabla,[$iIdCarrito]);
  $titulos=$cmdtabla->fetch_fields();
 }
?>

<style><?php include 'css/Index.css';?></style>
<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Mi Carrito</h1>
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

  if ($cmdtabla->num_rows>0) { ?>
  <?php foreach($cmdtabla as $titulo) {  ?>
   <tr>
    <th scope="row" style="vertical-align:middle;">
     <img src="../Imagenes/<?php echo $titulo['sNombreArchivo'];?>" width='200px' height='200px' alt="..." class="implat">
    </th>
    <td style="vertical-align:middle;" scope="row"><?php echo $titulo['sNombre']?></td>
    <td style="vertical-align:middle;">$ <?php echo $titulo['fPrecio']?></td>
    <input type="hidden" id="p<?php echo $titulo['iIdPlatillo']?>" value="<?php echo $titulo['fPrecio']?>">
    <input type="hidden" id="sc<?php echo $titulo['iIdPlatillo']?>" value="<?php echo $titulo['iStock']; ?>">

    <td style="vertical-align:middle;">
     <div id="brs" class="input-group ml-auto mr-auto" style="width: 130px;">
      <div class="input-group-prepend">
       <button class="btn btn-outline-primary js-btn-minus" type="button" onblur="Subtotal(<?php echo $titulo['iIdPlatillo']?>);">&minus;</button>
      </div>
      <input type="number" class="form-control text-center" id="c<?php echo $titulo['iIdPlatillo']?>" min="1" name="Qc[]" value="<?php echo $titulo['iCantidad']?>" onblur="Subtotal(<?php echo $titulo['iIdPlatillo']?>);">
      <div class="input-group-append">
       <button class="btn btn-outline-primary js-btn-plus" type="button" onblur="Subtotal(<?php echo $titulo['iIdPlatillo']?>);">&plus;</button>
      </div>
     </div>
    </td>
    <td class="product" id="iSubtotal<?php echo $titulo['iIdPlatillo']?>" style="vertical-align:middle;">$ <?php echo $titulo['fSubtotal']?></td>
    <?php $t=$t+$titulo['fSubtotal']?>
   </tr>
   <tr id="Botones">
    <td colspan="100">
     <div id="Bts">
      <?php if (($titulo['bMenu'])==0) { ?>
      <div class="mr-3"><a href="/dbRestaurant/Platillos/Individual.php?iIdIndividual=<?php echo $titulo['iIdPlatillo']?>" class="btn btn-warning btn-sm" style="color:#fff"><i class="fas fa-pencil-alt"></i></a></div>
      <?php } else { ?>
      <div class="mr-3"><a href="/dbRestaurant/Menus/Individual.php?iIdMenu=<?php echo $titulo['bMenu']?>" class="btn btn-warning btn-sm" style="color:#fff"><i class="fas fa-pencil-alt"></i></a></div>
      <?php } ?>
      <div class="mr-3"><a href="Delete.php?iIdCarrito=<?php echo $iIdCarrito;?>&iIdPlatillo=<?php echo $titulo['iIdPlatillo']?>" class="btn btn-danger btn-sm" style="color:#fff"><i class="fas fa-times"></i></a></div>
     </div>
    </td>
   </tr> 
   <?php } ?>
  </tbody>
 </table>
</div>

<div class="Cart-Abajo">
 <div class="Cart-Izq">
  <div class="mr-3"><a href="Delete-Cart.php" class="bs btn btn-info btn-sm">VACIAR EL CARRITO</a></div>
  <div><a href="/dbRestaurant/" class="bs btn btn-outline-info btn-sm">SEGUIR COMPRANDO</a></div>
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
   <a href="Shipping.php" id="Conf-Vent" class="text-white tw btn btn-primary mb-2 px-2 py-3 w-100">Confirmar Compra</a>
  </div>
 </div>
</div>

<?php } else { ?>
<br><br><br>
 <tr>
  <td colspan="100">
   <div class="alert alert-success" role="alert">
    <h4><strong><i class="fas fa-exclamation-triangle mr-2"></i>¡ ATENCIÓN !<i class="fas fa-exclamation-triangle ml-2"></i></strong></h4> No tienes ningún artículo en tu carrito de compras
   </div>
  </td>
 </tr>
</table>
</div>
<br><br><br><br><br><br><br>

<?php } ?>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
  
<script src="js/owl.carousel.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

<?php include '../Libs/Footer.php'?>

<script><?php include 'js/Index.js' ?></script>