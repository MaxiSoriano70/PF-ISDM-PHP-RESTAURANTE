<?php
 if (empty($_SESSION['iIdUsuario'])) {
  $k=0;
 } else {
 $k=1;
 }
?>

<?php 
if (isset($_SESSION['iIdUsuario'])) {
 
 $val=1;
 $Usuario=$_SESSION['iIdUsuario'];

 $sqlid="SELECT iIdCarrito FROM carrito cc WHERE cc.sEstado='En Curso' AND cc.iIdUsuario=?";
 $cmdid=preparar_select($Conexion,$sqlid,[$Usuario]);
 $rid=$cmdid->fetch_assoc();
 $iIdCarrito=$rid['iIdCarrito'];


 $sqlc="SELECT SUM(iCantidad) as Cantidad FROM Detalle_Carrito WHERE iIdCarrito=?";
 $cmdc=preparar_select($Conexion,$sqlc,[$iIdCarrito]);
 $rc=$cmdc->fetch_assoc();
 if ($rc['Cantidad']==0) {
  $res=0;
 }
 else {
  $res=$rc['Cantidad'];
 }

} 
else { $val=0; }
?>


<style><?php include 'css/MenuBuscar.css'?></style>
<form method="GET" action="Index.php">
<nav class="navbar p-0 m-0">
<div id="Contenedora">
 <div id="Imagen">
  <img src="/dbRestaurant/Libs/Fuentes/Iconos/Icon.png" width="80px;" height="80px;">
 </div>
 <div id="Buscador">
   <div class="Search-box">
    <input class="search-txt" type="text" name="Palabra" type="search" placeholder="Busca Platillos, Categorias y Más">
    <button class="search-btn"><i class="fas fa-search"></i></button>
   </div>
 </div>
 <div id="Carrito">
  <?php if ($val==1) { ?>
  <a id="btncarrito" class="btn py-4 px-4 text-white" onclick="Verificar(<?php echo $k; ?>);">
   <i class="fas fa-shopping-cart ic-c"></i> <span class="cra d-flex justify-content-center align-items-center badge badge-warning"><span class="csn"><?php echo $res ?></span></span>
   <span class="ml-1 txmc">Mi Carrito</span>
  </a>
  <?php } else { ?>
   <a id="btncarrito" class="btn py-4 px-4 text-white" onclick="Verificar(<?php echo $k; ?>);"><i class="fas fa-shopping-cart ic-c mr-3"></i>Mi Carrito</a>
  <?php } ?>
 </div>
</div>
</nav>
</form>

<script><?php include 'js/MenuBuscar.js'?></script>


