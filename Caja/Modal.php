<?php 
$sql="SELECT eg.dFecha AS Fecha,te.sDescripcion AS Descripcion,eg.fTotal AS Total FROM egresos eg INNER JOIN tipo_egreso te ON eg.iIdTipo_Egreso=te.iIdTipo_Egreso WHERE eg.iIdApertura=? UNION SELECT c.dFecha,tos.sDescripcion,c.fTotal FROM compras c INNER JOIN tipo_operacion tos ON c.iIdTipo_Operacion=tos.iIdTipo_Operacion WHERE iIdApertura=? UNION SELECT v.dFecha,tos.sDescripcion,v.fTotal FROM ventas v INNER JOIN tipo_operacion tos ON tos.iIdTipo_Operacion=v.iIdTipo_Operacion WHERE iIdApertura=? ORDER BY Fecha ASC";
$cmd=preparar_select($Conexion,$sql,[$rcj['iIdApertura'],$rcj['iIdApertura'],$rcj['iIdApertura']]);
?>

<style><?php include 'css/Modal.css'; ?></style>


<div class="modal fade mc" id="Movimientos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
   <div class="modal-header bg-info">
    <h5 class="modal-title mot" id="exampleModalLabel"><b class="text-white">Movimientos</b></h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <div class="modal-body my-3">   
    <div class="form-row">
     <div class="col-sm-12 text-center">

     
     <div class="table-responsive">
      <table class="table table-hover" id="example">
       <thead class="table-bordered text-white text-center" style="background-color:#1C7DB9 !important"> 
        <th>N°</th>
        <th>Fecha - Hora</th> 
        <th>Concepto</th>   
        <th>Monto</th>                          
       </thead>

       <tbody class="table-bordered text-center">
       <?php if ($cmd->num_rows>0) {
        $k=1;
        foreach($cmd as $fila) {
         echo "<tr>";   
          echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$k.'</td>';
          echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['Fecha'].'</td>';
          echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">'.$fila['Descripcion'].'</td>';
          echo '<td style="height:40px"><div class="d-flex flex-row" style="justify-content:center; align-items:center !important; height:100%">';
           if ($fila['Descripcion']!='Venta') {
            echo '<span class="text-danger"><b>-$'.$fila['Total'].'</b></span>';
           }
           else {
            echo '<span class="text-success"><b>+$'.$fila['Total'].'</b></span>';
           }
          echo '</td>';
         echo "</tr>";
         $k++;
        }
       } else { ?>
        <tr>
         <td colspan="100">
          <div class="alert alert-success w-100 alr" role="alert">
           <h4><strong><i class="fas fa-exclamation-triangle mr-2"></i>¡ ATENCIÓN !<i class="fas fa-exclamation-triangle ml-2"></i></strong></h4> Sin Movimientos de Caja 
          </div>
         </td>
        </tr>
       <?php } ?>                          
       </tbody>
      </table>
     </div>

     </div>
    </div>
   </div>
   <div class="modal-footer justify-content-center">
    <button type="button" id="btnCerrar" class="btn btn-primary py-2 px-3" data-dismiss="modal">Listo</button>
   </div>
  </div>
 </div>
</div>

