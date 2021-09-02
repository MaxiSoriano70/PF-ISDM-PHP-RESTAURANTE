<?php 
    include '../Libs/Header.php';
?>

<?php
  $sql="SELECT iIdProveedor,sNombre,sApellido FROM PROVEEDORES";
  $cmd=preparar_select($Conexion,$sql);

  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $day = date('d');
  $today = date('Y-m-');
  $hour = date('H:i:s');

  $fecha = $today.$day."T".$hour;
  if (substr($day,0,1)!=0) {$day++;} else {$day++; $day='0'.$day;} 

  $entrega = $today.$day."T".$hour;
?>

<style><?php include 'css/Create.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Pedidos/"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Pedidos</h1>
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

<form action="Create.php" name="formulario" id="formulario" method="POST">
<input type="hidden" name="Action" value="Formulario">
<div id="Container-Pedidos">
 <div class="Heade">
  <div class="Content-Heade">
  <div class="Elem">
   <label for="iIdproveedor">Proveedor</label>
   <select name="iIdproveedor" id="iIdproveedor" class="form-control selectpicker ide" data-live-search="true" required>
    <?php foreach($cmd as $proveedores) { ?>
     <option value="<?php echo $proveedores['iIdProveedor'];?>"><?php echo $proveedores['sNombre']." ".$proveedores['sApellido'];?></option>
    <?php } ?>
   </select>
  </div>
  <div class="Elem">
   <label for="fecha">Fecha</label>
   <input class="form-control ide" type="datetime-local" name="fecha" id="fecha" value="<?php echo $fecha ?>" required>
  </div>
  <div class="Elem">
   <label id="Entr" for="fecha_entrega">Entrega</label>
   <input class="form-control ide" type="datetime-local" name="fecha_entrega" id="fecha_entrega" value="<?php echo $entrega ?>" required>
  </div>
  </div>
 </div>

 <button id="btnAgregarIns" type="button" class="btn btn-success mt-5 mb-4 ml-3"><i class="fas fa-plus-circle mr-2"></i>Agregar</button>
 <div class="table-responsive">
  <table id="detalles" class="table table-bordered table-hover">
   <thead class="text-center text-white" style="background-color:#1C7DB9">
    <th>Insumo</th>
    <th>Precio Unitario</th>
    <th>Cantidad</th>
    <th>Subtotal</th>
    <th>Acciones</th>
   </thead>
   <tfoot>
    <th colspan="6" class="text-right"><h5 class="m-0"><b>TOTAL $<span id="total">0.00</span></b></h5></th>
   </tfoot>
   <tbody class="text-center">
         
   </tbody>
  </table>
 </div>
 <div class="form-group text-center py-5">
  <button class="btn btn-primary mx-2" type="submit" id="btnGuardar"><i class="fa fa-save mr-2"></i>Guardar</button>
  <a href="Index.php" class="btn btn-danger mx-2" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left mr-2"></i>Cancelar</a>
 </div>
 </form>
</div>

<br><br><br>

<?php 
     include 'Modales.php';
     include '../Libs/Footer.php';
?>

<script><?php include 'Scripts/Create.js' ?></script>