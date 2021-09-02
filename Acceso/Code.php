<?php
 include '../Libs/Conexion.php';
 include '../Libs/Funciones.php'; 
?>

<?php include '../Libs/Head.html'; ?>
<link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style><?php include 'css/RecoverPassword.css' ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <div class="Title-Admin">Verificación</div>
 </div>
</div>

<div class="Cont-Card">
 <div class="card">
  <div class="card-content">
   <form method="POST" action="Code.php">
    <input type="hidden" id="iIdUsuario" name="iIdUsuario" value="">
    <ul data-method="GET" class="stepper linear">
     <li class="step active">
      <div class="step-title waves-effect waves-dark">Paso 4</div>
      <div class="step-content">
       <div class="row">
        <div class="input-field col s12">
         <input id="Codigo" name="Ingresado" type="text" class="validateda" required>
         <label for="Codigo">Ingresa Codigo</label>
        </div>
       </div>
       <div class="step-actions">
        <button id="code" class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Verificar</button>
       </div>
      </div>
     </li>
     <li class="step">
      <div class="step-title waves-effect waves-dark">Paso 5</div>
      <div class="step-content">
       <div class="row">
        <div class="input-field col s12">
         <input id="NuevaCla" name="NuevaClave" type="password" class="validatedb" required>
         <label for="NuevaCla">Ingrese su nueva Clave</label>
        </div>
       </div>
      </div>
      <div class="step-content">
       <div class="row">
        <div class="input-field col s12">
         <input id="RepetirCla" name="RepetirClave" type="password" class="validatedb" required>
         <label for="RepetirCla">Repetir la nueva Clave</label>
        </div>
       </div>
       <div class="step-actions">
        <button class="waves-effect waves-dark btn blue next-step" id="btsVal" data-feedback="anyThing">Verificar</button>
       </div>
      </div>
     </li>
     <li class="step">
      <div class="step-title waves-effect waves-dark">Finalizar</div>
       <div class="step-content">
       <div class="step-actions">
        <button class="btn btn-primary" type="submit">Enviar</button>
       </div>
      </div>
     </li>
    </ul>
   </form>
  </div>
 </div>
</div>


<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php include '../Libs/Footer.php'; ?>
<script src="js/Code.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
 if (!empty($_POST['NuevaClave'])) {
  $Clave=$_POST['NuevaClave'];
  $hash=password_hash("$Clave", PASSWORD_DEFAULT);
  $Usuario=$_POST['iIdUsuario'];
  $sql="UPDATE Usuarios SET sClave=? WHERE iIdUsuario=?";
  $cmd=preparar_query($Conexion,$sql,[$hash,$Usuario]);

  if ($cmd) {
   echo '<script>
   swal({
    title: "Clave Actualizada!",
    text: "Se actualizo su Clave Correctamente!",
    icon: "success",
    button: "Aceptar",
   })
   .then((value) => {
    switch (value) {
     default:
      location.href ="/dbRestaurant/Acceso/Login.php"; 
    }
   });
   </script>';
  }
 }
?>

