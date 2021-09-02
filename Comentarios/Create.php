<?php 
 session_start(); 
 require_once "../Libs/Conexion.php";
 require_once "../Libs/Funciones.php";
?>

<?php
if (!empty($_POST)) {
	$iIdUsuario=$_SESSION['iIdUsuario'];
	$iIdPlatillo=$_POST['iIdPlatillo'];
	$sTitulo=$_POST['sTitulo'];
	$sTexto=$_POST['sTexto'];
	$iCalificacion=$_POST['iPuntuacion'];
	
	$sqlinsertcoment="INSERT INTO Comentarios (iIdUsuario,iIdPlatillo,sTitulo,sTexto,iCalificacion,dFecha) VALUES (?,?,?,?,?,now())";
	$cmd_coment=preparar_query($Conexion,$sqlinsertcoment,[$iIdUsuario,$iIdPlatillo,$sTitulo,$sTexto,$iCalificacion]);

	$sqlplatillo="SELECT iCal_Contador,iCal_Suma,iCal_Total FROM platillos WHERE iIdPlatillo=?";
	$cmdplatillo=preparar_select($Conexion,$sqlplatillo,[$iIdPlatillo]);
	$datos=$cmdplatillo->fetch_assoc();
	$Contador=$datos['iCal_Contador']+1;
	$Suma=$datos['iCal_Suma']+$iCalificacion;
	$iCal_Total=($Suma/$Contador);

	$sqlupdate="UPDATE platillos SET iCal_Contador=?,iCal_Suma=?,iCal_Total=? WHERE iIdPlatillo=?";
	$cmdupdate=preparar_query($Conexion,$sqlupdate,[$Contador,$Suma,$iCal_Total,$iIdPlatillo]);

	$sqlm="SELECT bMenu FROM Platillos WHERE iIdPlatillo=?";
	$cmdm=preparar_select($Conexion,$sqlm,[$iIdPlatillo]);
	$rm=$cmdm->fetch_assoc();
	$bMenu=$rm['bMenu'];
	
	if ($bMenu==0) {
	 header("location:/dbRestaurant/Platillos/Individual.php?iIdIndividual=".$iIdPlatillo);
	}
	else {
	 header("location:/dbRestaurant/Menus/Individual.php?iIdMenu=".$bMenu); 
	}
}
?>