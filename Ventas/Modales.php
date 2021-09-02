<?php 
$sql="SELECT iIdPlatillo,sNombre FROM PLATILLOS";
$cmd=preparar_select($Conexion,$sql);
?>

<style><?php include 'css/Modales.css'; ?></style>

<div class="modal fade mc" id="CPlatillos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  <div class="modal-content">
   <div class="modal-header bg-info">
    <h5 class="modal-title mot" id="exampleModalLabel"><b class="text-white">Agregar Productos</b></h5>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <form id="formPlatillos"> 
    <div class="modal-body my-3">   
     <div class="form-row">
      <div class="col-sm-12 text-center">
       <label for="platillos" style><b>Productos</b></label><br><br>
       <select class="sel_platillos" name="platillo_id" id="platillos" class="form-control" required>
        <option value="0" selected>Selecciona un Producto</option>     
        <?php foreach($cmd as $platillos) { ?>
        <option value="<?php echo $platillos['iIdPlatillo'];?>"><?php echo $platillos['sNombre'];?></option>
        <?php } ?>
       </select>
      </div>
     </div>
     <br><br><br>
     <div class="form-row text-center">
      <div class="col-sm-4">
       <label><b>Cantidad<span class="cant"></span></b></label>
       <input type="number" name="cantidad" id="cantidad" class="form-control text-center hmg" style="border-radius:5px;" onchange="Sub(this.value,document.getElementById('dispon').value)" required/>
      </div>      
      <div class="col-sm-4">
       <label><b>Precio Unitario</b></label>
       <input type="text" id="precio" name="precio" class="form-control text-center hmg" style="border-radius:5px" readonly/>
      </div>
      <div class="col-sm-4">
       <label><b><i>Subtotal</i></b></label>
       <input type="text" name="subtotal" id="subtotal_modal" class="form-control text-center hmg" style="border-radius:5px" readonly required/>
      </div>
     </div>
     <br>       
    </div>
    <div class="modal-footer justify-content-center">
     <button type="submit" id="btnGuardar2" class="btn btn-primary py-2 px-3">Guardar</button>
     <button type="button" id="btnCerrar" class="btn btn-danger py-2 px-3" data-dismiss="modal">Cerrar</button>
    </div>
    <input type="hidden" id="platillo" name="platillo" value="">
    <input type="hidden" id="dispon" value="">
   </form>
  </div>
 </div>
</div>

