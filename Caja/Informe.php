<?php
 require '../PDF/vendor/autoload.php';
 require_once '../Libs/Conexion.php';
 require '../Libs/Funciones.php';
 require '../PDF/Caja/index.php';
 $css = file_get_contents('../PDF/Caja/css/style.css');
 
 if (!empty($_GET['iId'])) {
    $iIdCaja = $_GET['iId'];
    
    $sqlg="SELECT CONCAT(u.sNombre,' ',u.sApellido) AS Usuario,u.sEmail,c.dFechaApertura,fMontoInicial,dFechaCierre,fMontoTotal FROM caja c INNER JOIN usuarios u ON c.iIdUsuario=u.iIdUsuario WHERE c.iIdApertura=?";
    $cmdg=preparar_select($Conexion,$sqlg,[$iIdCaja]);
    $Generales=$cmdg->fetch_assoc();

    $sql="SELECT eg.dFecha AS Fecha,te.sDescripcion AS Descripcion,eg.fTotal AS Total FROM egresos eg INNER JOIN tipo_egreso te ON eg.iIdTipo_Egreso=te.iIdTipo_Egreso WHERE eg.iIdApertura=? UNION SELECT c.dFecha,tos.sDescripcion,c.fTotal FROM compras c INNER JOIN tipo_operacion tos ON c.iIdTipo_Operacion=tos.iIdTipo_Operacion WHERE iIdApertura=? UNION SELECT v.dFecha,tos.sDescripcion,v.fTotal FROM ventas v INNER JOIN tipo_operacion tos ON tos.iIdTipo_Operacion=v.iIdTipo_Operacion WHERE iIdApertura=? ORDER BY Fecha ASC";
    $cmd=preparar_select($Conexion,$sql,[$iIdCaja,$iIdCaja,$iIdCaja]);

 }

$mpdf = new \Mpdf\Mpdf(['debug' => true]);

 $Plantilla = get_Caja($Generales,$cmd,$iIdCaja);
 $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
 $mpdf->writeHTML($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 $mpdf->Output();
?>