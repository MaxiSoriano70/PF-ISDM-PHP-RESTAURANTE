<?php include "../Libs/Header.php"; ?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../Platillos/css/dataTables.bootstrap4.min.css">

<style><?php include 'css/Index.css';?></style>

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

  if ((''.$res["sNombre"].''!="Jefe de Cocina") and ($res['sNombre']!="Gerente")) {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
 }
?>

<?php
 $sql="SELECT c.iIdCompra,concat(pv.sNombre, ' ',pv.sApellido) as sProveedor,c.dFecha,c.fTotal,p.sDescripcion,c.iIdApertura as sPago from Compras c INNER JOIN Proveedores pv INNER JOIN Pagos p ON c.iIdProveedor=pv.iIdProveedor AND c.iIdPago=p.iIdPago";
 $compras=preparar_select($Conexion,$sql);
 $campos=$compras->fetch_fields();
?>

<div class="hed">
 <div class="hed-cont">
  <?php if ($res['sNombre']=="Gerente") {?>
  <a id="atras" href="../Acceso/Admin/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <?php } else if (''.$res['sNombre'].''=="Jefe de Cocina") { ?>
  <a id="atras" href="../Acceso/JefeCocina/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <?php } ?>
  <h1 class="Title-Admin">Compras</h1>
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


<div class="table-responsive">
 <table class="table table-hover" id="example">
  <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important">  
    <th>ID Compra</th>
    <th>Proveedor</th>
    <th>Fecha</th>
    <th>Total</th>
    <th>Pago</th>
    <th>Caja</th>
    <th>Acciones</th>
  </thead>  
  <tbody class="table-bordered text-center">
   <?php foreach($compras as $fila){
    echo '<tr>';
     foreach ($campos as $campo) {
      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila[$campo->name].'</td>';
     }
     echo '<td style="height:60px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">

     <div class="px-1"><a href="Factura.php?iId='.$fila['iIdCompra'].'" class="btn btn-warning btn-sm text-white py-2"><i class="fas fa-file-invoice-dollar mr-2"></i>Factura</a></div>';
     echo '<div class="px-1"><a href="Delete.php?iId='.$fila['iIdCompra'].'" class="btn btn-danger btn-sm py-2"><i class="fas fa-trash-alt mr-2"></i>Eliminar</a></div>';

      echo'
      </div>
     </td>
    </tr>';
   } ?>
 </tbody>
</table>
</div>

<br><br><br><br><br><br><br><br><br>

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