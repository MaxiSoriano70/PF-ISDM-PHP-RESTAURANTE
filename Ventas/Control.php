<?php
 require 'D:\xampp\htdocs\dbRestaurant\Libs\Conexion.php';
 require 'D:\xampp\htdocs\dbRestaurant\Libs\Funciones.php';


 $sql="SELECT * FROM VENTAS";
 $cmd=preparar_select($Conexion,$sql);
 foreach ($cmd as $fecha) {
  $fechita=strtotime($fecha['dFecha']);//la funcion "strtotime()" transforma una fecha string a tiempo UNIX, aqui hacemos eso para comparar mas adelante.
  if((time()-$fechita)>=21600)//aqui comparamos la hora actual "time()" con la fecha de la base de datos, y si es igual o mayor a una hora cambiamos a concretado.
   {
    $iIdVenta=$fecha['iIdVenta'];
    $sql_update="UPDATE VENTAS SET sEstado='Concretado' WHERE iIdVenta=?";
    $cmd_update=preparar_query($Conexion,$sql_update,[$iIdVenta]);
   }
 }

	//$ayer= new datetime();
	//$ayer=$ayer-86400;
	//$diferencia=$ahora->diff($ayer);
	//var_dump($ahora)
	//$time=time();
	//$time=$time-300;
	//echo gmdate("Y-m-d\TH:i:s\Z", $time);
?>