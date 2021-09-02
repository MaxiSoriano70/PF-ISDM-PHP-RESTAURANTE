<?php 
 include '../Libs/Conexion.php';
 include '../Libs/Funciones.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require '../Mail/vendor/autoload.php';
?>

<?php include '../Libs/Head.html'; ?>
<link rel="stylesheet" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style><?php include 'css/RecoverPassword.css' ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="/dbRestaurant/"><i class="fas fa-arrow-left icb"></i></a>
  <div class="Title-Admin">Recuperar Clave</div>
 </div>
</div>

<div class="Cont-Card">
 <div class="card">
  <div class="card-content">
   <form method="POST" id="Form" action="RecoverPassword.php">
    <ul data-method="GET" class="stepper linear">
     <li class="step active">
      <div class="step-title waves-effect waves-dark">Paso 1</div>
      <div class="step-content">
       <div class="row">
        <div class="input-field col s12">
         <input id="email" name="Email" type="email" class="validate" required>
         <label for="email">Ingresa Email</label>
        </div>
       </div>
       <div class="step-actions">
        <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Continuar</button>
       </div>
      </div>
     </li>
     <li class="step">
      <div class="step-title waves-effect waves-dark">Paso 2</div>
      <div class="step-content">
       <div class="row">
        <div class="input-field col s12">
         <input id="Documento" name="Documento" type="Number" class="validate" required>
         <label for="password">Ingresa Documento</label>
        </div>
       </div>
       <div class="step-actions">
        <button class="waves-effect waves-dark btn blue next-step">Continuar</button>
        <button class="waves-effect waves-dark btn-flat previous-step">Atras</button>
       </div>
      </div>
     </li>
     <li class="step">
      <div class="step-title waves-effect waves-dark">Finalizar</div>
      <div class="step-content">
       <div class="step-actions">
        <button class="btn btn-primary" type="submit">Comprobar Datos</button>
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
<script src="js/RecoverPassword.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php 
 if(!empty($_POST["Email"])) {
  $Email=$_POST["Email"];
  $Documento=$_POST["Documento"];
  $sql="SELECT * FROM USUARIOS WHERE sEmail=? and iDocumento=?";
  $cmd=preparar_select($Conexion,$sql,[$Email,$Documento]);

  if($cmd->num_rows>0) {
      
   $resultado=$cmd->fetch_assoc();

   if(($Email=$resultado["sEmail"]) && ($Documento=$resultado["iDocumento"])) {
    
    $bytes = random_bytes(4);
    $codigo=(bin2hex($bytes));
    $cifr=$resultado["iIdUsuario"].$codigo;

    $sql="UPDATE USUARIOS SET sGenerado=? where sEmail=? AND iDocumento=?";
    $cmd=preparar_query($Conexion,$sql,[$cifr,$Email,$Documento]);

    if($cmd) {

    $mail = new PHPMailer(true);
    $message  = '<html>
    <body>
     <div style="width: 100%; height: 40px; background-color: #1C7DB9;"></div>
     <div style="width: 100%; height: 100px; border-bottom: 2px solid #1C7DB9; display: flex; justify-content: center; align-items: center;">
      <div style="width:50%; height: 100px; margin: auto; padding: 8px;">
       <img src="https://images.vexels.com/media/users/3/136264/isolated/preview/485f67bacd0d565a6d8732d3441059d9-icono-redondo-de-picadores-de-cocina-by-vexels.png" style="width: 90px; height: 90px; display: flex; justify-content: center; align-items: center;">
      </div>
      <div style="width: 50%; height: 100px; text-align:right; font-size: 15px; color: #999999; padding-top: 40px; padding-right: 20px;"> Mensajes y Avisos</div>
     </div>
     <div style="width: 100%; MIN-height: 100px; display: flex; justify-content: center; align-items: center;  margin-top: 20px; margin-bottom: 20px;">
      <p style="width: 100%; font-size: 13px; padding: 10px; color: #999999;">Hola <b>'.$resultado["sNombre"].'</b>,<br><br>
        Solicitaste restablecer tu contraseña. Para realizarlo, hacé click en "Recuperar contraseña".<br>
        En caso que no hayas solicitado restablecer tu clave, ignorá este e-mail. Tu contraseña no sufrirá ningún cambio.
        <br><br>Tu Codigo es<br><br>
        <b style="font-size: 20px; color: #808080">'.$cifr.'</b>
      </p>
     </div>
     <div style="width: 100%; height: 50px; margin-top:20px; margin-bottom: 20px;">
      <a href="http://186.123.151.213/dbRestaurant/Acceso/Code.php" style="font-size: 13px; text-decoration: none; color: #dddddd; border: 0; padding: 20px 50px; border-radius: 5px; cursor: pointer; background-color: #1C7DB9;">Recuperar Clave</a>
     </div>
     <div style="width: 100%; height: 25px; padding-top:10px; padding-bottom:10px; text-align: center; font-size: 13px; color: #999999; border: 1px solid #ffffff">
      ¡Gracias!<br>
      Tu Restaurante
     </div>
     <div style="width: 100%; height: 40px; background-color: #1C7DB9; margin-top: 40px;"></div>
     <div style="width: 100%; min-height: 100px; display: flex; justify-content: center; align-items: center; background-color: #F1F1F1;">
      <p style="font-size: 9px; padding: 10px; color: #7A7A7A; width:100%;">
       NO RESPONDAS A ESTE MENSAJE YA QUE EL REMITENTE ES UNA CASILLA AUTOMATICA. PARA COMUNICARTE CON NOSOTROS INICIA SESION EN TU CUENTA Y HACE CLICK EN "ENVIAR MENSAJE" DENTRO DE LA SECCION DE CONTACTANOS. PARA DEJAR DE RECIBIR MENSAJES VIA E-MAIL CON NOVEDADES Y AVISOS DE VENCIMIENTO, INGRESA EN WWW.DBRESTAURANT.COMIDENTIFICANDOTE CON USUARIO Y CLAVE EN LA SECCION "MI PERFIL".. BOTON DE PAGO S.A. ARGENTINA 444, SALTA, CUIT:<br> 30-71789865-8.
      </p>
     </div>
    </body>
    </html>';

    try {
     $mail->SMTPDebug = 0;                      
     $mail->isSMTP();                                            
     $mail->Host       = 'smtp.gmail.com';                   
     $mail->SMTPAuth   = true;                                   
     $mail->Username   = 'turestaurante592@gmail.com';                    
     $mail->Password   = '839C8DB4CB';                               
     $mail->SMTPSecure = 'tls';         
     $mail->Port       = 587;                                          
      
     $mail->setFrom('turestaurante592@gmail.com', 'Administracion Tu Restaurante');
     $mail->addAddress($resultado['sEmail']);        
            
     $mail->isHTML(true);                                
     $mail->Subject = 'Reestablecer Tu Clave';
     $mail->Body = $message;
     $mail->AltBody = $message;
        
     $mail->send();
     echo '<script>
     swal({
      title: "¡Codigo Enviado!",
      text: "¡Revisa tu Imbox de Email!",
      icon: "success",
      button: "Aceptar",
     })
     .then((value) => {
      switch (value) {
       default:
        location.href ="/dbRestaurant/"; 
      }
     });
     </script>';
     }

     catch (Exception $e) {
      echo "<script>console.log( 'Mensaje No Enviado: " . $mail->ErrorInfo . "' );</script>";
     }
    }
  }
 }

 else {
  echo '<script>
  swal({
   title: "!Datos Incorrectos!",
   text: "Por Favor, escribe nuevamente los Datos!",
   icon: "warning",
   button: true,
   dangerMode: true,
  })
  .then((value) => {
   switch (value) {
    default:
     location.href ="/dbRestaurant/"; 
   }
  });
  </script>';
 }
}
?>