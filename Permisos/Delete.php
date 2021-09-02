<?php
    include '../Libs/Header.php';
?>

<?php 
	if(!empty($_GET['iId'])){
		$iIdPermiso=$_GET['iId'];
		$sql="delete from permisos where iIdPermiso=?";
		$cmd=preparar_query($Conexion,$sql,[$iIdPermiso]);
		if($cmd){
		 echo '<script>
		  location.href ="/dbRestaurant/Permisos/"; 
		 </script>';
		}
		else{
			echo "Error: ".$sql." ".$cmd->error;
		}
    }
?>

<?php
    include '../Libs/Footer.php';
?>