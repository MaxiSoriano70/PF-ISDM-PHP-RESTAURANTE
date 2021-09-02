<?php include '../Libs/Header.php'; ?>

<?php
  $sql="SELECT iIdUsuario,sNombre,sApellido FROM USUARIOS";
  $cmd=preparar_select($Conexion,$sql);

  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $today = date('Y-m-d');
  $hour = date('H:i:s');

  $fecha = $today."T".$hour;
  $entrega = $today."T".$hour;
?>

<style><?php include 'css/Create.css';?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/Ventas/"><i class="fas fa-arrow-left icb"></i></a>
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

<form action="Create.php" name="formulario" id="formulario" method="POST">
<input type="hidden" name="Action" value="Formulario">
<div id="Container-Pedidos">
 <div class="Heade">
  <div class="Content-Heade">
  <div class="Elem">
   <label for="iIdUsuario">Usuario</label>
   <select name="iIdUsuario" id="iIdUsuario" class="form-control selectpicker ide" data-live-search="true" required>
    <?php foreach($cmd as $Usuario) { ?>
     <option value="<?php echo $Usuario['iIdUsuario'];?>"><?php echo $Usuario['sNombre']." ".$Usuario['sApellido'];?></option>
    <?php } ?>
   </select>
  </div>
  <div class="Elem">
   <label for="fecha">Fecha</label>
   <input class="form-control ide" type="datetime-local" name="fecha" id="fecha" value="<?php echo $fecha ?>" required>
  </div>
  </div>
 </div>

 <button id="btnAgregarPla" type="button" class="btn btn-success mt-5 mb-4 ml-3"><i class="fas fa-plus-circle mr-2"></i>Agregar</button>
 <div class="table-responsive">
  <table id="detalles" class="table table-bordered table-hover">
   <thead class="text-center text-white" style="background-color:#1C7DB9">
    <th>Producto</th>
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

<script><?php include 'js/Create.js' ?></script>