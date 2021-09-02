<?php include '../Libs/Header.php' ?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
?>


<style><?php include 'css/Config.css' ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="<?php echo $ub;?>"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Configuracion</h1>
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

<div class="Bod-Conf">
<div class="Container-Config">
 <div class="Icon-Config">
  <div class="iconBx active" data-id="Content1">
   <img src="img/Perfil.svg">
  </div>
  <div class="iconBx" data-id="Content2">
   <img src="img/Update.svg">
  </div>
  <div class="iconBx" data-id="Content3">
   <img src="img/Contraseña.svg">
  </div>
  <div class="iconBx" data-id="Content4">
   <img src="img/Security.svg">
  </div>
 </div>
 <div class="Content-Config">
  <div class="ContentBx active" id="Content1">
   <div>
    <div class="Text">
     <h2>Mi Perfil</h2>
     <p>Visualiza en Tiempo Real tu Perfil dentro de la Empresa de Tu Restaurante Online.</p>
     <a href="/dbRestaurant/Acceso/Perfil.php" class="btn btn-primary">Ver Más</a>
    </div>
   </div>
  </div>
  <div class="ContentBx" id="Content2">
   <div>
    <div class="Text">
     <h2>Editar Perfil</h2>
     <p>Edita y Visualiza en Tiempo Real tu Perfil dentro de la Empresa de Tu Restaurante Online. Cambia tus Preferencias y más.</p>
     <a href="/dbRestaurant/Acceso/UpdatePerfil.php" class="btn btn-primary">Ver Más</a>
    </div>
   </div>
  </div>
  <div class="ContentBx" id="Content3">
   <div>
    <div class="Text">
     <h2>Modificar Clave</h2>
     <p>Cambia de Clave a tu Perfil para una Mayor seguridad de este dentro del Sistema y ayudanos a mejorar tu seguridad.</p>
     <a href="/dbRestaurant/Acceso/Change-Password.php" class="btn btn-primary">Ver Más</a>
    </div>
   </div>
  </div>
  <div class="ContentBx" id="Content4">
   <div>
    <div class="Text">
     <h2>Seguridad de datos</h2>
     <p>En pocas Palabras, la seguridad de datos se refiere a medidas de protección de la privacidad digital que se aplican para evitar el acceso no autorizado a los datos, los cuales pueden encontrarse en ordenadores, bases de datos, sitios web, etc. La seguridad de datos también protege los datos de una posible corrupción.</p>
    </div>
   </div>
  </div>
 </div>
</div>
</div>
<script><?php include 'js/Config.js' ?></script>

<?php include '../Libs/Footer.php' ?>

