<?php include '../Libs/Header.php' ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../Platillos/css/dataTables.bootstrap4.min.css">

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $Usur=$_SESSION['iIdUsuario'];
  $sql="select sNombre from Permisos where iIdPermiso=(select iIdPermiso from Usuarios where iIdUsuario=?)";
  $cmd=preparar_select($Conexion,$sql,[$Usur]);
  $res=$cmd->fetch_assoc();

  if ((''.$res["sNombre"].''!="Jefe de Cocina") and ($res['sNombre']!="Gerente") and  ($res['sNombre']!="Empleado")) {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
 }
?>

<?php
 $sql="SELECT v.iIdVenta,concat(u.sNombre, ' ',u.sApellido) AS sUsuario,dFecha,v.sDireccion,fTotal,sEstado,iIdApertura FROM Ventas v INNER JOIN Usuarios u ON v.iIdUsuario=u.iIdUsuario";
 $cmd=preparar_select($Conexion,$sql);
 $campos=$cmd->fetch_fields();
?>

<style><?php include 'css/Index.css';?></style>

<body>
<div class="hed">
 <div class="hed-cont">
  <?php if ($res['sNombre']=="Gerente") {?>
  <a id="atras" href="../Acceso/Admin/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <?php } else if (''.$res['sNombre'].''=="Jefe de Cocina") { ?>
  <a id="atras" href="../Acceso/JefeCocina/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <?php } else if ($res['sNombre']=='Empleado') {?>
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <?php } ?>
  <h1 class="Title-Admin">Ventas</h1>
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


<div class="ml-4">
<a href="Create.php" class="btn btn-success btn-sm py-2 mr-1"><i class="fas fa-plus-circle mr-2"></i>Agregar</a>
<button id="btn-reporte" class="btn btn-primary btn-sm py-2"><i class="fas fa-file-pdf mr-2"></i>Reporte PDF</button>
</div>

<br><br>
<div class="table-responsive">
 <table class="table table-hover" id="example">
  <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important">  
  	<th>ID Venta</th>
  	<th>Usuario</th>
  	<th>Fecha</th>
  	<th>Dirección</th>
  	<th>Total</th>
  	<th>Caja</th>
  	<th>Estado</th>
  	<th>Tiempo Restante</th>
  	<th>Acciones</th>
  </thead>
  <tbody class="table-bordered text-center">
   <?php if ($cmd->num_rows>0) {
    $vector=array();
    $con=0; 
    foreach($cmd as $fila) {
     echo "<tr>";
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['iIdVenta'].'</td>';
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['sUsuario'].'</td>';
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%" id="f'.$fila['iIdVenta'].'">'.$fila['dFecha'].'</td>';
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['sDireccion'].'</td>';
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['fTotal'].'</td>';
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['iIdApertura'].'</td>';

      echo '<td style="height: 70px">';
       echo '<div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
       echo '<input type="hidden" id=est'.$fila['iIdVenta'].' value='.$fila['sEstado'].'>';
       
      if($fila['sEstado']=="No Concretado") {
       echo '<div id=cb'.$fila['iIdVenta'].' class="btn btn-sm px-1 py-0 py-2 px-2 btn-naranja"><span><i id=ic'.$fila['iIdVenta'].' class="fas fa-exclamation-circle mr-2"></i><span id=txt'.$fila['iIdVenta'].'>'.$fila['sEstado'].'</span><span>';
      }
      else {
       echo '<div class="btn btn-sm px-1 py-0 py-2 px-2 btn-verde"><span><i class="fas fa-clipboard-check mr-2"></i>'.$fila['sEstado'].'<span>';
      }
      echo '</div>';

      echo '</td>';
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">
       <span id="ms'.$fila['iIdVenta'].'">--</span>
      </td>';
      
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
       echo '<div class="px-1"><a href="Detalle.php?iId='.$fila["iIdVenta"].'" class="btn btn-info btn-sm py-2"><i class="fas fa-clipboard mr-2"></i>Detalle</a></div>';
       if($fila['sEstado']=="Concretado")
       {
        echo '<div class="px-1"><a href="Factura.php?iId='.$fila['iIdVenta'].'" class="btn btn-warning btn-sm text-white py-2"><i class="fas fa-file-invoice-dollar mr-2"></i>Factura</a></div>';
       }
       
       echo '<div class="px-1"><a href="Delete.php?iId='.$fila["iIdVenta"].'" class="btn btn-danger btn-sm py-2"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div>';
       echo "</div>";
      echo '</td>';
     echo "</tr>";
     $vector[$con]=$fila['iIdVenta'];
     $con=$con+1; 
     } ?>
    <input type="hidden" id="Sumatoria" value="<?php echo $con; ?>">
  <?php  }
  ?>                          
  </tbody>
 </table>
</div>
</body>


<br><br><br><br><br><br><br><br><br>


<?php 
 include 'Modal-Reporte.php';
 include "../Libs/Footer.php";
?>

<script><?php include 'js/Index.js' ?></script>

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


<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script><?php include 'js/Reporte.js' ?></script>