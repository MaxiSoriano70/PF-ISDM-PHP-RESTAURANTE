<?php
      include "../../Libs/Header.php";
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">

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

  if ($res['sNombre']!="Gerente") {
   echo '<script>
    location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
   </script>';
  }  
 }
?>

<?php
$sql="SELECT iIdUsuario,sLogin,sNombre,sApellido,iDocumento,sEmail,iContacto FROM usuarios WHERE iIdPermiso=2;";
$cmd=preparar_select($Conexion,$sql);
$clientes=$cmd->fetch_fields();
?>


<style><?php include 'css/Index.css';?></style>
<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="../../Acceso/Admin/Administracion.php"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Clientes</h1>
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


<br><br>

<div class="table-responsive">
 <table class="table table-hover" id="example">
  <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important">  
   <?php foreach($clientes as $cliente) {
    echo "<th>".substr($cliente->name,1)."</th>";                              
   }  
   echo "<th>Acciones</th>";    
   ?>
  </thead>
  <tbody class="table-bordered text-center">
  <?php
                            //Este codigo es el encargado de rellenar la tabla con los datos.
                                  if ($cmd->num_rows>0)
                                  {
                                       foreach($cmd as $fila)
                                          {
                                             echo "<tr>";
                                               foreach($clientes as $datos)
                                                  {
                                                      echo '<td style="height:70px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila[$datos->name].'</td>';
                                                  }
                                                  
                                             echo '<td style="height:60px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';

                                             echo '<div class="px-1"><a href="Update.php?iId='.$fila["iIdUsuario"].'" class="btn btn-primary btn-sm py-2"><i class="far fa-edit mr-2"></i>Modificar</a></div>'; //Este es el boton de actualizar
                                             echo '<div class="px-1"><a href="Delete.php?iId='.$fila["iIdUsuario"].'" class="btn btn-danger btn-sm py-2"><i class="far fa-trash-alt mr-2"></i>Eliminar</a></div>';//Este es el boton de borrar


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


<?php
      include "../../Libs/Footer.php";
?>


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