<?php 
 require_once "../Libs/Conexion.php";
 require "../Libs/Funciones.php";
 session_start();
?>


<?php
 if ($_POST['Action']=='Ventas') {
  $Year=$_POST['Year'];

  $enero=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=1 AND YEAR(dFecha)='$Year'"));
  $febrero=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=2 AND YEAR(dFecha)='$Year'"));
  $marzo=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=3 AND YEAR(dFecha)='$Year'"));
  $abril=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=4 AND YEAR(dFecha)='$Year'"));
  $mayo=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=5 AND YEAR(dFecha)='$Year'"));
  $junio=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=6 AND YEAR(dFecha)='$Year'"));
  $julio=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=7 AND YEAR(dFecha)='$Year'"));
  $agosto=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=8 AND YEAR(dFecha)='$Year'"));
  $septiembre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=9 AND YEAR(dFecha)='$Year'"));
  $octubre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=10 AND YEAR(dFecha)='$Year'"));
  $noviembre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=11 AND YEAR(dFecha)='$Year'"));
  $diciembre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdVenta) AS Cantidad FROM ventas WHERE MONTH(dFecha)=12 AND YEAR(dFecha)='$Year'"));
  
  $data = array(0 => round($enero['Cantidad'],1),
                1 => round($febrero['Cantidad'],1),
                2 => round($marzo['Cantidad'],1),
                3 => round($abril['Cantidad'],1),
                4 => round($mayo['Cantidad'],1),
                5 => round($junio['Cantidad'],1),
                6 => round($julio['Cantidad'],1),
                7 => round($agosto['Cantidad'],1),
                8 => round($septiembre['Cantidad'],1),
                9 => round($octubre['Cantidad'],1),
                10 => round($noviembre['Cantidad'],1),
                11 => round($diciembre['Cantidad'],1),
  );

  echo json_encode($data);
 }
?>

<?php 

 if ($_POST['Action']=='Stats') {
  $Año=$_POST['Year'];
  $sql="SELECT COUNT(iIdVenta) AS cVentas, SUM(fTotal) AS Facturacion FROM VENTAS WHERE YEAR(dFecha)=?";
  $cmd=preparar_select($Conexion,$sql,[$Año]);
  $Datos=$cmd->fetch_assoc();
  echo json_encode($Datos);
 }

?>

<?php 

 if ($_POST['Action']=='Visit') {
  $sqlds="SELECT SUM(iCantidad) as Tot_Visit FROM visitas";
  $cmdds=preparar_select($Conexion,$sqlds);
  $pds=$cmdds->fetch_assoc();
  echo json_encode($pds);
 }

?>

<?php
 if ($_POST['Action']=='Compras') {
  $Yearcom=$_POST['Yearcom'];

  $enero=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=1 AND YEAR(dFecha)='$Yearcom'"));
  $febrero=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=2 AND YEAR(dFecha)='$Yearcom'"));
  $marzo=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=3 AND YEAR(dFecha)='$Yearcom'"));
  $abril=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=4 AND YEAR(dFecha)='$Yearcom'"));
  $mayo=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=5 AND YEAR(dFecha)='$Yearcom'"));
  $junio=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=6 AND YEAR(dFecha)='$Yearcom'"));
  $julio=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=7 AND YEAR(dFecha)='$Yearcom'"));
  $agosto=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=8 AND YEAR(dFecha)='$Yearcom'"));
  $septiembre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=9 AND YEAR(dFecha)='$Yearcom'"));
  $octubre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=10 AND YEAR(dFecha)='$Yearcom'"));
  $noviembre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=11 AND YEAR(dFecha)='$Yearcom'"));
  $diciembre=mysqli_fetch_array(mysqli_query($Conexion,"SELECT COUNT(iIdCompra) AS Cantidadc FROM compras WHERE MONTH(dFecha)=12 AND YEAR(dFecha)='$Yearcom'"));
  
  $datac = array(0 => round($enero['Cantidadc'],1),
                1 => round($febrero['Cantidadc'],1),
                2 => round($marzo['Cantidadc'],1),
                3 => round($abril['Cantidadc'],1),
                4 => round($mayo['Cantidadc'],1),
                5 => round($junio['Cantidadc'],1),
                6 => round($julio['Cantidadc'],1),
                7 => round($agosto['Cantidadc'],1),
                8 => round($septiembre['Cantidadc'],1),
                9 => round($octubre['Cantidadc'],1),
                10 => round($noviembre['Cantidadc'],1),
                11 => round($diciembre['Cantidadc'],1),
  );

  echo json_encode($datac);
 }
?>

<?php 

 if ($_POST['Action']=='Statsc') {
  $Añoc=$_POST['Yearc'];
  $sqlc="SELECT COUNT(iIdCompra) AS cCompra, SUM(fTotal) AS Facturacionc FROM COMPRAS WHERE YEAR(dFecha)=?";
  $cmdc=preparar_select($Conexion,$sqlc,[$Añoc]);
  $Datosc=$cmdc->fetch_assoc();
  echo json_encode($Datosc);
 }

?>

<?php
 if ($_POST['Action']=='Pv') {
  $Fecha=$_POST['Fecha'].'%';
  $cmdpv=mysqli_query($Conexion,"SELECT p.sNombre,SUM(dv.iCantidad) AS Cantidad FROM ventas v INNER JOIN detalle_venta dv INNER JOIN platillos p ON v.iIdVenta=dv.iIdVenta AND dv.iIdPlatillo=p.iIdPlatillo WHERE v.dFecha LIKE '$Fecha' GROUP BY p.sNombre ORDER BY Cantidad DESC LIMIT 6");

  while($Filasa=mysqli_fetch_assoc($cmdpv)) {
   $arra[]=$Filasa;
  }

  echo json_encode($arra);
 }
?>

<?php
 if ($_POST['Action']=='Pnv') {
  $Fecha=$_POST['Fecha'].'%';
  $cmdpnv=mysqli_query($Conexion,"SELECT p.sNombre,SUM(dv.iCantidad) AS Cantidad FROM ventas v INNER JOIN detalle_venta dv INNER JOIN platillos p ON v.iIdVenta=dv.iIdVenta AND dv.iIdPlatillo=p.iIdPlatillo WHERE v.dFecha LIKE '$Fecha' GROUP BY p.sNombre ORDER BY Cantidad LIMIT 6");

  while($Filasb=mysqli_fetch_assoc($cmdpnv)) {
   $arrab[]=$Filasb;
  }

  echo json_encode($arrab);
 }
?>