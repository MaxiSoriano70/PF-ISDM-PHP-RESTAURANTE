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

  if (''.$res["sNombre"].''!="Gerente") {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
 }
?>

<?php
$sql="SELECT c.iIdApertura,CONCAT(u.sNombre,' ',u.sApellido) AS iUsuario,c.dFechaApertura,c.fMontoInicial,c.dFechaCierre,c.fMontoTotal,c.sEstado FROM Caja c INNER JOIN usuarios u ON c.iIdUsuario=u.iIdUsuario";
$cmd=preparar_select($Conexion,$sql);
$titulos=$cmd->fetch_fields();
?>


<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="../Acceso/Admin/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Caja</h1>
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
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['iIdApertura'].'</td>';
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['iUsuario'].'</td>';
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['dFechaApertura'].'</td>';
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">$'.$fila['fMontoInicial'].'</td>';

      if (empty($fila['dFechaCierre'])) {
       echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">No Disponible</td>';
      }
      else {
       echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['dFechaCierre'].'</td>';
      }
      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">$'.$fila['fMontoTotal'].'</td>';

      if ($fila['sEstado']=='Abierto') {
       echo '<td style="height:40px">';
        echo '<div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
        echo '<div class="btn btn-sm px-1 py-0 py-2 px-2 btn-verde"><span><i class="fas fa-clipboard-check mr-2"></i>'.$fila['sEstado'].'<span>';
        echo '</div>';
       echo '</td>';
      }
      else {
       echo '<td style="height:40px">';
        echo '<div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
         echo '<div class="btn btn-sm px-1 py-0 py-2 px-2 btn-rojo"><span><i class="fas fa-clipboard-check mr-2"></i>'.$fila['sEstado'].'<span>';
        echo '</div>';
       echo '</td>';
      }


      echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
      if($fila['sEstado']=='Abierto') {
       echo '<div class="px-1"><a href="Close.php" class="btn btn-danger btn-sm py-2"><i class="fas fa-cash-register mr-2"></i>Cerrar Caja</a></div>'; 
       echo '<div class="px-1"><a href="Extraccion.php" class="btn btn-info btn-sm py-2"><i class="fas fa-cash-register mr-2"></i>Extraccion</a></div>'; 
      }
      else {
       echo '<div class="px-1"><a href="Informe.php?iId='.$fila["iIdApertura"].'" class="btn btn-warning btn-sm py-2 text-white"><i class="fas fa-cash-register mr-2"></i>Informe</a></div>'; 
      } ?>

      <div class="px-1">
       <a href="Movimientos.php?iId=<?php echo $fila['iIdApertura']; ?>" type="button" id="btnCerrar" class="btn btn-primary btn-sm py-2" data-dismiss="modal"><i class="fas fa-hand-holding-usd mr-2"></i>Movimientos</a>
      </div>
      <?php 
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

<script><?php include 'js/Index.js'; ?></script>

<?php 
 include "../Libs/Footer.php"; 
?>

<script>
 $(document).ready(function() {
  $('#example').DataTable ({ 
   "lengthMenu": [5, 15, 30, 60],
   "order":[[0,"desc"]],
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
