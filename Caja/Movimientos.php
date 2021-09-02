<?php include "../Libs/Header.php"; ?>

<?php
if (!empty($_GET['iId'])) {
 $iIdApertura=$_GET['iId'];
 $sql="SELECT eg.dFecha AS Fecha,te.sDescripcion AS Descripcion,eg.fTotal AS Total FROM egresos eg INNER JOIN tipo_egreso te ON eg.iIdTipo_Egreso=te.iIdTipo_Egreso WHERE eg.iIdApertura=? UNION SELECT c.dFecha,tos.sDescripcion,c.fTotal FROM compras c INNER JOIN tipo_operacion tos ON c.iIdTipo_Operacion=tos.iIdTipo_Operacion WHERE iIdApertura=? UNION SELECT v.dFecha,tos.sDescripcion,v.fTotal FROM ventas v INNER JOIN tipo_operacion tos ON tos.iIdTipo_Operacion=v.iIdTipo_Operacion WHERE iIdApertura=? ORDER BY Fecha ASC";
 $cmd=preparar_select($Conexion,$sql,[$iIdApertura,$iIdApertura,$iIdApertura]);


 $sqlcj="SELECT iIdApertura,fMontoInicial FROM Caja WHERE iIdApertura=?";
 $cmdcj=preparar_select($Conexion,$sqlcj,[$iIdApertura]);
 $rcj=$cmdcj->fetch_assoc();
 
 if ($cmdcj->num_rows>0) {
 
  $sqltv="SELECT IFNULL(SUM(fTotal),0) AS SubVentas FROM ventas where iIdApertura=?";
  $cmdtv=preparar_select($Conexion,$sqltv,[$rcj['iIdApertura']]);
  $rtv=$cmdtv->fetch_assoc();

  $sqltc="SELECT IFNULL(SUM(fTotal),0) AS SubCompras FROM compras where iIdApertura=?";
  $cmdtc=preparar_select($Conexion,$sqltc,[$rcj['iIdApertura']]);
  $rtc=$cmdtc->fetch_assoc();

  $sqlte="SELECT IFNULL(SUM(fTotal),0) AS SubEgresos FROM egresos WHERE iIdApertura=?";
  $cmdte=preparar_select($Conexion,$sqlte,[$rcj['iIdApertura']]);
  $rte=$cmdte->fetch_assoc();

  $Egresos=$rtc['SubCompras']+$rte['SubEgresos'];
  $Ingresos=$rtv['SubVentas'];

  $Total=($rcj['fMontoInicial']+$Ingresos)-$Egresos;
 }

}
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<style><?php include "css/dataTables.bootstrap4.min.css" ?></style>
<style><?php include "css/Movimientos.css" ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Caja/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Movimientos</h1>
 </div>
 <div class="boxin">
  <div></div>
  <div></div>
  <div></div>
 </div>
</div>

<input type="hidden" id="iIdApertura" value="<?php echo $iIdApertura; ?>">
<div class="Contenedor-Div">
<div class="Izquierda-i">
  <img src="img/Movimientos.svg">
</div>
<div class="Derecha-d">
 <div class="table-responsive">
 <table class="table table-hover" id="example">
  <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important">
   <th>N°</th>
   <th>Fecha - Hora</th>
   <th>Concepto</th>
   <th>Total</th>
  </thead>

  <tbody class="table-bordered text-center bg-white">
   <?php
    $cant=1;
    foreach ($cmd as $movimiento) { ?>
     <tr>
      <td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><?php echo $cant; ?></td>
      <td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><?php echo $movimiento["Fecha"]; ?></td>
      <td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"><?php echo $movimiento["Descripcion"]; ?></td>
      <?php if ($movimiento['Descripcion']!='Venta') {?>
       <td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%; color: "><span class="text-danger"><b>-$<?php echo $movimiento["Total"]; ?></b></span></td>
      <?php } else { ?>
       <td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%; color: "><span class="text-success"><b>+$<?php echo $movimiento["Total"]; ?></b></span></td>
      <?php } ?>
     </tr> 
     
    <?php
      $cant++;
     } ?>                  
  </tbody>
 </table>
</div>
</div>
</div>

<div class="Titul">
 <h2>Grafico</h2>
</div>

<div class="Cont-Opns">
 <div class="Contenido-ps">

  <nav class="Arriba-ops">
   <div id="marker"></div>
   <button id="Opns1" class="Opns">Saldo Inicial</button>
   <button id="Opns2" class="Opns">Ingresos</button>
   <button id="Opns3" class="Opns">Egresos</button>
   <button id="Opns4" class="Opns">Total</button>
  </nav>

  <div class="InforOps">
   <div class="Rs1">El Saldo inicial de esta caja fue de <span class="bol text-primary">$<?php echo $rcj['fMontoInicial']; ?></span></div>
   <div class="Rs2">Los Ingresos Registrados hasta el momento en esta caja son de <span class="bol text-success">$<?php echo $Ingresos; ?></span></div>
   <div class="Rs3">Los Egresos que se Registraron hasta el momento en esta caja son de <span class="bol text-danger">$<?php echo $Egresos; ?></span></div>
   <div class="Rs4">El Total registrado en esta Caja es de  <span id="purple" class="bol"> $<?php echo $Total; ?></span></div>
  </div>
 </div>
</div>

<div class="Contenedor-Grafico">
  <div class="Grafico-Estadistica">
    <canvas id="Graf-Mov"></canvas>
  </div>
</div>

<br><br>


<?php 
 include "../Libs/Footer.php"; 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script><?php include 'js/Movimientos.js'; ?></script>

<script>
 $(document).ready(function() {
  $('#example').DataTable ({ 
   "lengthMenu": [5, 15, 30, 60],
   "order":[[0,"asc"]],
   "language":{
   "lengthMenu": "Registros _MENU_",
   "sInfo":           "Mostrando Pagina _PAGE_ de _PAGES_",
   "sInfoEmpty":      "Mostrando 0 registros de un total de 0 registros",
   "sInfoFiltered":   "",
   "sInfoPostFix":    "",
   "sSearch":         "Buscar ",
   "zeroRecords":"No se Encontraron Resultados",
   "sUrl":            "",
   "sInfoThousands":  ",",
   "sLoadingRecords": "Cargando...",
   "oPaginate": {
     "sFirst":    "Primero",
     "sLast":     "Último",
     "sNext":     "Siguiente",
     "sPrevious": "Anterior"
    },
   }               
  });
 });
</script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>