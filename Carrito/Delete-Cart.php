<?php 
 session_start(); 
 require_once "../Libs/Conexion.php";
 require_once "../Libs/Funciones.php";
?>

<?php 
 $Usuario=$_SESSION['iIdUsuario'];

 $sql="SELECT iIdCarrito FROM carrito c WHERE c.sEstado='En Curso' AND c.iIdUsuario=?";
 $cmd=preparar_select($Conexion,$sql,[$Usuario]);
 $control=$cmd->fetch_assoc();
 $iIdCarrito=$control['iIdCarrito'];

 $sql_delete="DELETE FROM DETALLE_CARRITO WHERE iIdCarrito=?";
 $cmd_delete=preparar_query($Conexion,$sql_delete,[$iIdCarrito]);

 if($cmd_delete) {
  $sql_delete_2="DELETE FROM CARRITO WHERE iIdCarrito=?";
  $cmd_delete_2=preparar_query($Conexion,$sql_delete_2,[$iIdCarrito]);
  
  if($cmd_delete_2) {
   header('location:/dbRestaurant/Carrito/');
  }
 }
?>