<?php 
 include '../Libs/Header.php';
 $sql="SELECT * FROM PAGOS";
 $cmd=preparar_select($Conexion,$sql);
?>

<?php 
 if (!empty($_GET['iId'])) {
  $iIdPedido = $_GET['iId'];
 }
?>


<?php
 if(!empty($_POST['pago_id'])) { 

  $sqlcj="SELECT iIdApertura,fMontoTotal FROM Caja WHERE sEstado='Abierto'";
  $cmdcj=preparar_select($Conexion,$sqlcj);
  $rcj=$cmdcj->fetch_assoc();

  if ($cmdcj->num_rows>0) {

  $iIdPedido = $_POST['iId'];
  $iIdPago = $_POST['pago_id'];

  $sql_pedidos="SELECT iIdProveedor,fTotal FROM PEDIDOS WHERE iIdPedido=?";
  $cmd_pedidos=preparar_select($Conexion,$sql_pedidos,[$iIdPedido]);
  $pedidos=$cmd_pedidos->fetch_assoc();

   /*SUMAR EL IMPORTE DE LA VENTA*/
  if ($rcj['fMontoTotal']>=$pedidos['fTotal']) {

   $sql_a_caja="UPDATE caja SET fMontoTotal=fMontoTotal-? WHERE iIdApertura=?";
   $cmd_a_caja=preparar_query($Conexion,$sql_a_caja,[$pedidos['fTotal'],$rcj['iIdApertura']]);
       
   $sql="UPDATE PEDIDOS SET bFacturado='Si' WHERE iIdPedido=?";
   $cmd=preparar_query($Conexion,$sql,[$iIdPedido]);

   $insertcompras = "INSERT INTO COMPRAS (iIdProveedor,dFecha,fTotal,iIdPago,iIdApertura) VALUES (?,now(),?,?,?)";
   $cmd_insert_compras=preparar_query($Conexion,$insertcompras,[$pedidos['iIdProveedor'],$pedidos['fTotal'],$iIdPago,$rcj['iIdApertura']]);
   $iIdCompra = $cmd_insert_compras->insert_id;
         
   $sqldetalle="select * from detalle_pedido where iIdPedido=?";
   $cmd_detalle_compra=preparar_select($Conexion,$sqldetalle,[$iIdPedido]);

   $insert_detalle_compra = "INSERT INTO DETALLE_COMPRA (iIdCompra,iIdInsumo,iCantidad,fPrecio,fSubtotal) VALUES (?,?,?,?,?)";
   foreach ($cmd_detalle_compra as $detalle) {
    $cmd_insert_detalle_compra=preparar_query($Conexion,$insert_detalle_compra,[$iIdCompra,$detalle['iIdInsumo'],$detalle['iCantidad'],$detalle['fPrecio'],$detalle['fSubtotal']]); 
    echo '<script>
     location.href ="/dbRestaurant/Pedidos/"; 
    </script>';
   }
  }
  else {
   echo '<script>
   swal({
     title: "¡Saldo Insuficiente!",
     text: "¡La Caja no cubre el Total de la Compra!",
     icon: "warning",
     button: true,
     dangerMode: true,
    })
    .then((value) => {
     switch (value) {
      default:
       location.href ="/dbRestaurant/Pedidos/"; 
      }
    });
   </script>';
  }

 }
 else {
  echo '<script>
  swal({
    title: "¡Compra Incorrecta!",
    text: "¡Debe Abir la Caja para Comprar!",
    icon: "warning",
    button: true,
    dangerMode: true,
   })
   .then((value) => {
    switch (value) {
     default:
      location.href ="/dbRestaurant/Pedidos/"; 
     }
   });
  </script>';
 }
}
?>

<style><?php include 'css/Pagos.css' ?></style>

<div class="Amplio"></div>
<div id="Contenedor">
 <div id="Card">
  <div id="Encabezado">
   <h2>!Antes de Continuar!</h2>
  </div>
  <div id="Cuerpo">
   <div class="group"> 
    <h5>Ingresa Forma de Pago</h5>
    <form id="formCompras" method="POST" action="Pagos.php?iId=<?php echo $iIdPedido; ?>">
    <input type="hidden" name="iId" value="<?php echo $iIdPedido; ?>">
    <select class="sel_pago custom-select" name="pago_id" id="pago" class="form-control" required>
    <?php
     foreach($cmd as $pago)
        { 
    ?> 
      <option value="<?php echo $pago['iIdPago'];?>"><?php echo $pago['sDescripcion'];?></option>
    <?php 
        }
    ?>
    </select>
   </div>
  </div>
  <div id="Pie">
   <div class="Botones">
    <button type="submit" class="bot d-block btn btn-primary py-3">Guardar</button>
    <a href="Index.php" id="Cerrar" class="bot d-block btn btn-danger py-3">Atras</a>
   </div>
  </div>
  </form>
 </div>
</div>



<?php 
     include '../Libs/Footer.php';
?>