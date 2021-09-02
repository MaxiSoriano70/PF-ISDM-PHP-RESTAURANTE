<?php 
 session_start(); 
 require_once "../Libs/Conexion.php";
 require_once "../Libs/Funciones.php";
?>

<?php 
 if ($_POST['Action']=='Cambiar') {

  $iIdPlatillo=$_POST['Platillo_id'];
  $Cantidad=$_POST['Cantidad'];
  $Subtotal=$_POST['Subtotal'];

  $Usuario=$_SESSION['iIdUsuario'];
  $sqlid="select iIdCarrito from carrito c where c.sEstado='En Curso' and c.iIdUsuario=?";
  $cmdid=preparar_select($Conexion,$sqlid,[$Usuario]);
  $rid=$cmdid->fetch_assoc();
  $iIdCarrito=$rid['iIdCarrito'];

  $sqlb="UPDATE detalle_carrito set iCantidad=?,fSubtotal=? where iIdPlatillo=? AND iIdCarrito=?";
  $cmdb=preparar_query($Conexion,$sqlb,[$Cantidad,$Subtotal,$iIdPlatillo,$iIdCarrito]);

  $sqlTotal="SELECT SUM(fSubtotal) AS Total FROM detalle_carrito WHERE iIdCarrito=?";
  $cmdTotal=preparar_select($Conexion,$sqlTotal,[$iIdCarrito]);
  $resTotal=$cmdTotal->fetch_assoc();

  $sqlTotalup="UPDATE carrito SET fTotal=? WHERE iIdCarrito=?";
  $cmd_Totalup=preparar_query($Conexion,$sqlTotalup,[$resTotal['Total'],$iIdCarrito]);

  echo json_encode($resTotal);
 }
?>