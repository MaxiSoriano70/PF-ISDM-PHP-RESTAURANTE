<?php
 require '../PDF/vendor/autoload.php';
 require '../PDF/Compras/index.php';
 require_once '../Libs/Conexion.php';
 require '../Libs/Funciones.php';
 $css = file_get_contents('../PDF/Compras/css/style.css');
 
 if (!empty($_GET['iId'])) {
    $iIdCompra = $_GET['iId'];
    $sql="SELECT c.iIdCompra,dFecha,p.sNombre,sApellido,iTelefono,sEmail,pa.sDescripcion,iIdApertura FROM Compras c iNNER JOIN PROVEEDORES p INNER JOIN pagos pa ON c.iIdProveedor=p.iIdProveedor and c.iIdPago=pa.iIdPago WHERE c.iIdCompra=?";
    $cmd=preparar_select($Conexion,$sql,[$iIdCompra]);
    $compra=$cmd->fetch_assoc();

    $sqlb="select dc.*,i.sNombre from detalle_compra dc INNER JOIN Insumos i ON dc.iIdInsumo=i.iIdInsumo where iIdCompra=?";
    $detalle=preparar_select($Conexion,$sqlb,[$iIdCompra]);

 }

 $mpdf = new \Mpdf\Mpdf([]);

 $Plantilla = get_Plantilla($compra,$detalle);
 $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
 $mpdf->writeHTML($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 $mpdf->Output();
?>