<?php 
 $sqla="SELECT MIN(dFecha) AS Antigua FROM Ventas";
 $cmda=preparar_select($Conexion,$sqla);
 $ra=$cmda->fetch_assoc();
 $Ant=$ra['Antigua'];
 $Antigua = substr($Ant,0,7);
 
 $sql="SELECT MAX(dFecha) AS Actual FROM Ventas";
 $cmd=preparar_select($Conexion,$sql);
 $fa=$cmd->fetch_assoc();
 $Act=$fa['Actual'];
 $Actual=substr($Act,0,7);

 date_default_timezone_set('America/Argentina/Buenos_Aires');
 $Date=date('Y-m-d H:i:s');
 $Usuario=$_SESSION['iIdUsuario'];
?>

<style><?php include 'css/Modal-Reporte.css'; ?></style>

<div class="modal fade" id="CReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
   <div class="modal-header bg-info">
    <h5 class="modal-title mot" id="exampleModalLabel"><b class="text-white">Reporte de Ventas</b></h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <form id="formReporte" method="POST" action="Reporte.php"> 
    <input type="hidden" name="FechaActual" value="<?php echo $Date; ?>">
    <input type="hidden" name="User" value="<?php echo $Usuario; ?>">
    <div class="modal-body my-3">   
     <div class="form-row">
      <div class="col-sm-12 text-center my-4">
       <label for="Fecha"><b>Selecciona Fecha de Reporte</b></label><br><br>
       <div class="w-100 d-flex justify-content-center align-items-center">
       <input type="month" name="Fecha" id="Fecha" class="form-control itm hmg" value="Fecha" min="<?php echo $Antigua;?>" max="<?php echo $Actual;?>" required> 
       </div>
      </div>
     </div>         
    </div>
    <div class="modal-footer justify-content-center">
     <button type="submit" id="btnImprimir2" class="btn btn-primary py-2 px-3">Imprimir</button>
     <button type="button" id="btnCerrar" class="btn btn-danger py-2 px-3" data-dismiss="modal">Cerrar</button>
    </div>
  </form>
  </div>
 </div>
</div>