<?php
 require '../PDF/vendor/autoload.php';
 require '../PDF/Reporte-Ventas/index.php';
 require_once '../Libs/Conexion.php';
 require '../Libs/Funciones.php';
 $css = file_get_contents('../PDF/Reporte-Ventas/css/style.css');
 
 if (!empty($_POST)) {
  $User=$_POST['User'];
  $Fecha=$_POST['Fecha'];
  $dFecha=(string)$_POST['Fecha'].'%';
  $FechaActual=$_POST['FechaActual'];

  $year=substr($Fecha,0,-3);
  $mes=substr($Fecha,-2);

  switch ($mes) {
   case '01':
    $transcode='ENERO '.$year; 
    break; 
   case '02':
    $transcode='FEBRERO '.$year;
    break; 
   case '03':
    $transcode='MARZO '.$year;
    break; 
   case '04':
    $transcode='ABRIL '.$year;
    break; 
   case '05':
    $transcode='MAYO '.$year;
    break; 
   case '06':
    $transcode='JUNIO '.$year;
    break; 
   case '07':
    $transcode='JULIO '.$year;
    break; 
   case '08':
    $transcode='AGOSTO '.$year;
    break; 
   case '09':
    $transcode='SEPTIEMBRE '.$year;
    break; 
   case '10':
    $transcode='OCTUBRE '.$year;
    break; 
   case '11':
    $transcode='NOVIEMBRE '.$year;
    break; 
   case '12':
    $transcode='DICIEMBRE '.$year;
    break; 
   default:
  	$transcode='Error';
  	break;
  } 

  $sqlu="select sNombre,sApellido,sEmail,iContacto from Usuarios where iIdUsuario=?";
  $cmdu=preparar_select($Conexion,$sqlu,[$User]);
  $Usuario=$cmdu->fetch_assoc();

  $sqlt="SELECT SUM(fTotal) as Total FROM ventas WHERE dFecha LIKE ?";
  $cmdt=preparar_select($Conexion,$sqlt,[$dFecha]);
  $fTot=$cmdt->fetch_assoc();

  $sql="SELECT v.iIdVenta,dFecha,SUM(d.iCantidad) AS iCantidad,u.sNombre,sApellido,iContacto,sEmail,fTotal FROM Ventas v iNNER JOIN USUARIOS u INNER JOIN DETALLE_VENTA d ON v.iIdUsuario=u.iIdUsuario AND v.iIdVenta=d.iIdVenta WHERE dFecha like ? AND v.sEstado='Concretado' GROUP BY iIdVenta";
  $cmd=preparar_select($Conexion,$sql,[$dFecha]);
 }

 $mpdf = new \Mpdf\Mpdf(['debug' => true]);

 $Plantilla = get_Plantilla($Usuario,$FechaActual,$cmd,$transcode,$fTot);
 $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
 $mpdf->writeHTML($Plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
 $mpdf->Output();
?>