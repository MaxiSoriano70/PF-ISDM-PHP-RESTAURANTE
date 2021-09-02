<?php include '../Libs/Header.php' ?>

<?php 
 if (empty($_SESSION['iIdUsuario'])) {
  echo '<script>
   location.href ="/dbRestaurant/Acceso/Not-Found.php/"; 
  </script>';
 }
 else {
  $User=$_SESSION['iIdUsuario'];
  $sqlp="SELECT u.*, p.sNombre as NombrePermiso,p.sDescripcion FROM Usuarios u INNER JOIN Permisos p on u.iIdPermiso=p.iIdPermiso where iIdUsuario=?";
  $cmdp=preparar_select($Conexion,$sqlp,[$User]);
  $rap=$cmdp->fetch_assoc();
 }
?>


<style><?php include 'css/Perfil.css'; ?></style>

<div class="hed">
 <div class="hed-cont">
  <a id="atras" href="<?php echo $ub;?>"><i class="fas fa-arrow-left icb"></i></a>
  <h1 class="Title-Admin">Mi Perfil</h1>
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

<section class="Seccion">
 <div class="Panel-Portada">
  <div class="Avatar">
   <img src="/dbRestaurant/Imagenes/Usuarios/<?php echo $rap['sPerfil'] ?>" alt="" id="myImg" class="img-galeria">
  </div>
 </div>

 <section class="imagen-light">
  <img src="img/close.svg" alt="" class="close">
  <img src="" alt="" class="agregar-imagen">
 </section>

 <div class="About">
  <div class="Acerca">
   <div class="Our"><h1 class="Our">Informacion Personal</h1></div>
   <div class="Descript">Bienvenido <?php echo $rap['sNombre']." ".$rap['sApellido']?></div>
  </div>
 </div>

 <div class="Infor">
  <div class="cards" id="primer">
   <div class="C-card">
    <img src="img/Card1.svg" class="Im">
    <h1>Mis Datos</h1>
    <div class="NomUs">Usuario: <?php echo $rap['sLogin']?></div>
    <div id="Nom">Nombre: <?php echo $rap['sNombre']?></div>
    <div class="Ap">Apellido: <?php echo $rap['sApellido']?></div>
    <div class="Doc">Documento: <?php echo $rap['iDocumento']?></div>
    <div class="Em">Email: <?php echo $rap['sEmail']?></div>
    <div class="Cont">Contacto: <?php echo $rap['iContacto']?></div>
   </div>
  </div>

  <div class="cards">
   <div class="C-card">
    <img src="img/Card2.svg" class="Im">
    <h1>Permisos</h1>
    <div class="Np"><b>Permiso :</b> <?php echo $rap['NombrePermiso']?></div>
    <div class="Nd"><b>Descripcion :</b> <?php echo $rap['sDescripcion'] ?></div>
   </div>
  </div>
 </div>
</section>

<style><?php include 'css/Modal.css'?></style>

 <section class="imagen-light">
  <img src="img/close.svg" alt="" class="close">
  <img src="" alt="" class="agregar-imagen">
 </section>

<script><?php include 'js/Modal.js'; ?></script>

<?php include '../Libs/Footer.php' ?>