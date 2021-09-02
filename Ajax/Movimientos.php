<?php 
      require_once "../Libs/Conexion.php";
      require "../Libs/Funciones.php";
      session_start();
?>

<?php
if ($_POST['Action']=='Movimiento') {
 $iIdApertura = $_POST['Apetura_id'];
 $cmdpv=mysqli_query($Conexion,"SELECT te.sDescripcion AS Descripcion,SUM(eg.fTotal) AS Total FROM egresos eg INNER JOIN tipo_egreso te ON eg.iIdTipo_Egreso=te.iIdTipo_Egreso WHERE eg.iIdApertura='$iIdApertura' GROUP BY Descripcion UNION SELECT tos.sDescripcion AS Descripcion, SUM(c.fTotal) FROM compras c INNER JOIN tipo_operacion tos ON c.iIdTipo_Operacion=tos.iIdTipo_Operacion WHERE iIdApertura='$iIdApertura' GROUP BY DESCRIPCION UNION SELECT tos.sDescripcion AS Descripcion,SUM(v.fTotal) FROM ventas v INNER JOIN tipo_operacion tos ON tos.iIdTipo_Operacion=v.iIdTipo_Operacion WHERE iIdApertura='$iIdApertura' GROUP BY DESCRIPCION");

 while($Filasa=mysqli_fetch_assoc($cmdpv)) {
  $arra[]=$Filasa;
 }

 echo json_encode($arra);
}
?>