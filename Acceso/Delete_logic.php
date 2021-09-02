<?php
	include '../Libs/Conexion.php';
	include '../Libs/Funciones.php';

	if(!empty($_GET["iId"]))
	{
		$iIdVenta=$_GET["iId"];
		$sql="UPDATE VENTAS SET bEliminado=1 WHERE iIdVenta=?";
		$cmd=preparar_query($Conexion,$sql,[$iIdVenta]);
		if($cmd)
		{
			header('location:Compras.php');
		}
		else
		{
			echo 'error:'.$sql.' '.$cmd->error;
		}
	}
?>