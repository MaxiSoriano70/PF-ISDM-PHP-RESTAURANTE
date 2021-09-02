<?php include "../Libs/Header.php"; ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<style><?php include "css/dataTables.bootstrap4.min.css" ?></style>
<style><?php include "css/Index.css" ?></style>


<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $Usur=$_SESSION['iIdUsuario'];
  $sql="SELECT sNombre FROM Permisos WHERE iIdPermiso=(SELECT iIdPermiso FROM Usuarios WHERE iIdUsuario=?)";
  $cmd=preparar_select($Conexion,$sql,[$Usur]);
  $res=$cmd->fetch_assoc();

  if ((''.$res["sNombre"].''!="Jefe de Cocina") and ($res['sNombre']!="Gerente")) {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
 }
?>


<?php
$sql="SELECT iIdPlatillo,sNombre,sDescripcion,fPrecio,iStock,iStockMinimo,bEliminado FROM platillos WHERE bMenu=0";
$cmd=preparar_select($Conexion,$sql);
$titulos=$cmd->fetch_fields();
?>


<div class="hed">
 <div class="hed-cont">
  <?php if ($res['sNombre']=="Gerente") {?>
  <a id="atras" href="../Acceso/Admin/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <?php } else if (''.$res['sNombre'].''=="Jefe de Cocina") { ?>
  <a id="atras" href="../Acceso/JefeCocina/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <?php } ?>
  <h1 class="Title-Admin">Platillos</h1>
 </div>
 <div class="boxin">
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
  <div></div>
 </div>
</div>

<div class="ml-4"><a href="Create.php" class="btn btn-success btn-sm py-2"><i class="fas fa-plus-circle mr-2"></i>Agregar</a></div>
<br><br>
<div class="table-responsive">
 <table class="table table-hover" id="example">
  <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important">  
   <?php foreach($titulos as $titulo) {
    echo "<th>".substr($titulo->name,1)."</th>";                              
   }  
   echo "<th>Acciones</th>";               
  ?>
  </thead>

  <tbody class="table-bordered text-center">
   <?php if ($cmd->num_rows>0) {
    foreach($cmd as $fila) {
     echo "<tr>";   
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['iIdPlatillo'].'</td>';
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['sNombre'].'</td>';
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['sDescripcion'].'</td>';
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['fPrecio'].'</td>';
      if ($fila['iStock']>$fila['iStockMinimo']) {
      echo '<td style="height:40px">';
       echo '<div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
       echo '<div class="btn btn-sm px-1 py-0 py-2 px-2 btn-verde"><span><i class="fas fa-clipboard-check mr-2"></i>'.$fila['iStock'].'<span>';
       echo '</div>';
      echo '</td>';
      }
      else {
      echo '<td style="height:40px">';
       echo '<div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
        echo '<div class="btn btn-sm px-1 py-0 py-2 px-2 btn-rojo"><span><i class="fas fa-exclamation-circle mr-2"></i>'.$fila['iStock'].'<span>';
       echo '</div>';
      echo '</td>';
      }
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['iStockMinimo'].'</td>';
      if($fila['bEliminado']==0) {
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"> No </td>';
      } 
      else {
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%"> Si </td>';
      } 

      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
       echo '<div class="px-1"><a href="Update.php?iId='.$fila["iIdPlatillo"].'" class="btn btn-primary btn-sm py-2"><i class="far fa-edit mr-2"></i>Modificar</a></div>'; 
       if ($fila['bEliminado']==0) {
        echo '<div class="px-1"><a href="Delete.php?iId='.$fila["iIdPlatillo"].'" class="btn btn-danger btn-sm py-2"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div>';
       }
                                             
       else { 
        echo '<div class="px-1"><a href="Recuperar.php?iId='.$fila["iIdPlatillo"].'" class="btn btn-secondary btn-sm py-2" style="color:#fff"><i class="fas fa-trash-restore-alt mr-2"></i>Restore</a></div>';
       }
       echo '<div class="px-1"><a href="Insumos.php?iId='.$fila["iIdPlatillo"].'" class="btn btn-info btn-sm py-2"><i class="fas fa-folder-plus mr-2"></i>Insumos</a></div>';
       echo '<div class="px-1"><a href="../Platillo_Imagen/Imagenes.php?iId='.$fila["iIdPlatillo"].'" class="btn btn-warning btn-sm py-2" style="color:#fff"><i class="far fa-images mr-2"></i>Imagenes</a></div>'; 


       echo "</div>";
      echo '</td>';
    echo "</tr>";

      }
     }
     ?>                          
  </tbody>
 </table>
</div>



<br><br><br><br><br><br><br><br><br>


<?php include "../Libs/Footer.php"; ?>


<script>
 $(document).ready(function() {
  $('#example').DataTable ({ 
   "lengthMenu": [5, 15, 30, 60],
   "order":[[0,"asc"]],
   "language":{
   "lengthMenu": "Registros _MENU_",
   "sInfo":           "Mostrando Pagina _PAGE_ de _PAGES_",
   "sInfoEmpty":      "Mostrando 0 registros de un total de 0 registros",
   "sInfoFiltered":   "",
   "sInfoPostFix":    "",
   "sSearch":         "Buscar ",
   "zeroRecords":"No se Encontraron Resultados",
   "sUrl":            "",
   "sInfoThousands":  ",",
   "sLoadingRecords": "Cargando...",
   "oPaginate": {
     "sFirst":    "Primero",
     "sLast":     "Último",
     "sNext":     "Siguiente",
     "sPrevious": "Anterior"
    },
   }               
  });
 });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
