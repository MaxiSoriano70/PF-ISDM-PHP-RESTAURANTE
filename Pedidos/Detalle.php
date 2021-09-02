<?php
 require '../PDF/vendor/autoload.php';
 require '../PDF/Pedidos/index.php';
 require_once '../Libs/Conexion.php';
 require '../Libs/Funciones.php';
 $css = file_get_contents('../PDF/Pedidos/css/style.css');
 
 if (!empty($_GET['iId'])) {
    $iIdPedido = $_GET['iId'];
    $sql="SELECT p.iIdPedido,dFecha,dFecha_Entrega,pr.sNombre,sApellido,iTelefono,sEmail FROM Pedidos p iNNER JOIN PROVEEDORES pr ON p.iIdProveedor=pr.iIdProveedor WHERE p.iIdPedido=?";
    $cmd=preparar_select($Conexion,$sql,[$iIdPedido]);
    $pedido=$cmd->fetch_assoc();

    $sqlb="select dp.*,i.sNombre from detalle_pedido dp INNER JOIN Insumos i ON dp.iIdInsumo=i.iIdInsumo where iIdPedido=?";
    $detalle=preparar_select($Conexion,$sqlb,[$iIdPedido]);

 }

 $mpdf = new \Mpdf\Mpdf([]);

 $Plantilla = get_Plantilla($pedido,$detalle);
 $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
 $mpdf->writeHTML($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 $mpdf->Output();
?>