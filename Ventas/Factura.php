<?php
 require '../PDF/vendor/autoload.php';
 require '../PDF/Ventas/index.php';
 require_once '../Libs/Conexion.php';
 require '../Libs/Funciones.php';
 $css = file_get_contents('../PDF/Ventas/css/style.css');
 
 if (!empty($_GET['iId'])) {
    $iIdVenta = $_GET['iId'];
    /*La consulta le agregamos i cantidad*/
    $sql="SELECT v.iIdVenta,dFecha,fTotal,SUM(d.iCantidad) AS iCantidad,u.sNombre,sApellido,iContacto,sEmail,iIdApertura FROM Ventas v 
		iNNER JOIN USUARIOS u ON v.iIdUsuario=u.iIdUsuario 
		INNER JOIN DETALLE_VENTA d ON v.iIdVenta=d.iIdVenta
		WHERE v.iIdVenta=?";
    $cmd=preparar_select($Conexion,$sql,[$iIdVenta]);
    $venta=$cmd->fetch_assoc();

    $sqlb="select dv.*,p.sNombre from detalle_venta dv INNER JOIN Platillos p ON dv.iIdPlatillo=p.iIdPlatillo where iIdVenta=?";
    $detalle=preparar_select($Conexion,$sqlb,[$iIdVenta]);

 }

$mpdf = new \Mpdf\Mpdf(['debug' => true]);

 $Plantilla = get_Plantilla($venta,$detalle);
 $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
 $mpdf->writeHTML($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 $mpdf->Output();
?>