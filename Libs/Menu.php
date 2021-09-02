<style><?php include 'css/Menu.css'?></style>

<nav class="navbar navbar-expand-lg navbar-light" id="Principal" style="z-index:6;">
 <a class="navbar-brand" href="/dbRestaurant/" id="link">
  <div class="d-none d-sm-block">Restaurante Mawey<img src="https://images.vexels.com/media/users/3/136264/isolated/preview/485f67bacd0d565a6d8732d3441059d9-icono-redondo-de-picadores-de-cocina-by-vexels.png" id="opta"></div>

  <div class="d-block d-sm-none" style="font-size:15px">Restaurante Mawey<img src="https://images.vexels.com/media/users/3/136264/isolated/preview/485f67bacd0d565a6d8732d3441059d9-icono-redondo-de-picadores-de-cocina-by-vexels.png" id="optb"></div>
 </a>

 <button class="navbar-toggler" id="Botonc" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="outline:none !important;">
  <i class="fas fa-bars" style="color:#fff;"></i>
 </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">

 <?php if (!isset($_SESSION['iIdUsuario'])) {?>
 <ul class="navbar-nav navbar-right w-100 h-100 d-flex justify-content-end" style="z-index:2">
  <li class="nav-item lio active py-3">
   <a class="nav-link hov" href="/dbRestaurant/Index.php" style="color:#fff;"><i class="fas fa-home mr-2"></i>Inicio</a>
  </li>
  <li class="nav-item lio active py-3">
   <a class="nav-link hov" href="/dbRestaurant/Acceso/Login.php" style="color:#fff;"><i class="far fa-user mr-2"></i>Iniciar Sesion</a>
  </li>
  <li class="nav-item lio active py-3">
   <a class="nav-link hov" href="/dbRestaurant/Acceso/Register.php" style="color:#fff;"><i class="far fa-user mr-2"></i>Create una Cuenta</a>
  </li>
 </ul>

 <?php } else { ?>

 <?php 
  $secc=$_SESSION['iIdUsuario'];
  $sql="select sNombre from Permisos where iIdPermiso=(select iIdPermiso from Usuarios where iIdUsuario=?)";
  $cmd=preparar_select($Conexion,$sql,[$secc]);
  $res=$cmd->fetch_assoc();
  $Permiso=$res['sNombre'];

  $sqlb="SELECT * FROM Usuarios where iIdUsuario=?";
  $cmdb=preparar_select($Conexion,$sqlb,[$secc]); 
  $rb=$cmdb->fetch_assoc();
 ?>
 
 <?php if ($Permiso=="Gerente") { ?>

  <ul class="navbar-nav navbar-right w-100 h-100 d-flex justify-content-end" id="drop">
   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/" style="color:#fff;"><i class="fas fa-home mr-2"></i>Inicio</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Acceso/Admin/Administracion.php" style="color:#fff;"><i class="fas fa-clipboard-list mr-2"></i>Administracion</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Acceso/Compras.php" style="color:#fff;"><i class="fas fa-store mr-2"></i>Mis Compras</a>
   </li>

   <li class="nav-item dropdown lio active py-3">
    <a class="nav-link dropdown-toggle hov text-white text-center" id="men" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <i class="fas fa-user-tie pr-2" widht="40px" style="text-align:center"></i><?php echo $rb['sLogin'];?>
    </a>

    <div class="dropdown-menu dmn" aria-labelledby="navbarDropdown">
     <div class="dropdown-item pt-3 pb-3" style="text-align:center"><img id="perfil" src="/dbRestaurant/Imagenes/Usuarios/<?php echo $rb['sPerfil'];?>"><span class="pl-2 tn" style="cursor:default">Hola <?php echo $rb['sNombre'];?> </span></div>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Perfil.php"><i class="fas fa-user-alt mr-2"></i>Ver Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/UpdatePerfil.php"><i class="fas fa-user-edit mr-2"></i>Editar Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Admin/Administracion.php"><i class="fas fa-clipboard-list mr-2"></i>Administracion</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Config.php"><i class="fas fa-user-cog mr-2"></i>Configuracion</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Logout.php" style="text-align:center"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesion</a>
    </div>
   </li>
  </ul>

 <?php } ?>

 <?php if ($Permiso=="Empleado") { ?>

  <ul class="navbar-nav navbar-right w-100 h-100 d-flex justify-content-end" id="drop">
   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/" style="color:#fff;"><i class="fas fa-home mr-2"></i>Inicio</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Ventas/" style="color:#fff;"><i class="fas fa-dollar-sign mr-2"></i>Ventas</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Acceso/Compras.php" style="color:#fff;"><i class="fas fa-store mr-2"></i>Mis Compras</a>
   </li>

   <li class="nav-item dropdown lio active py-3">
    <a class="nav-link dropdown-toggle hov text-white text-center" id="men" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <i class="fas fa-user-circle pr-2" widht="40px" style="text-align:center"></i><?php echo $rb['sLogin'];?>
    </a>

    <div class="dropdown-menu dmn" aria-labelledby="navbarDropdown">
     <div class="dropdown-item pt-3 pb-3" style="text-align:center"><img id="perfil" src="/dbRestaurant/Imagenes/Usuarios/<?php echo $rb['sPerfil'];?>"><span class="pl-2 tn" style="cursor:default">Hola <?php echo $rb['sNombre'];?> </span></div>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Perfil.php"><i class="fas fa-user-alt mr-2"></i>Ver Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/UpdatePerfil.php"><i class="fas fa-user-edit mr-2"></i>Editar Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Caja/Create.php"><i class="fas fa-cash-register mr-2"></i>Gestion Caja</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Config.php"><i class="fas fa-user-cog mr-2"></i>Configuracion</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Logout.php" style="text-align:center"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesion</a>
    </div>
   </li>
  </ul>

 <?php } ?>

 <?php if (''.$Permiso.''=="Jefe de Cocina") { ?>

  <ul class="navbar-nav navbar-right w-100 h-100 d-flex justify-content-end" id="drop">
   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/" style="color:#fff;"><i class="fas fa-home mr-2"></i>Inicio</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Acceso/JefeCocina/Administracion.php" style="color:#fff;"><i class="fas fa-clipboard-list mr-2"></i>Administracion</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Acceso/Compras.php" style="color:#fff;"><i class="fas fa-store mr-2"></i>Mis Compras</a>
   </li>

   <li class="nav-item dropdown lio active py-3">
    <a class="nav-link dropdown-toggle hov text-white text-center" id="men" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <i class="fas fa-user-circle pr-2" widht="40px" style="text-align:center"></i><?php echo $rb['sLogin'];?>
    </a>

    <div class="dropdown-menu dmn" aria-labelledby="navbarDropdown">
     <div class="dropdown-item pt-3 pb-3" style="text-align:center"><img id="perfil" src="/dbRestaurant/Imagenes/Usuarios/<?php echo $rb['sPerfil'];?>"><span class="pl-2 tn" style="cursor:default">Hola <?php echo $rb['sNombre'];?></span></div>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Perfil.php"><i class="fas fa-user-alt mr-2"></i>Ver Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/UpdatePerfil.php"><i class="fas fa-user-edit mr-2"></i>Editar Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/JefeCocina/Administracion.php"><i class="fas fa-clipboard-list mr-2"></i>Administracion</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Config.php"><i class="fas fa-user-cog mr-2"></i>Configuracion</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Logout.php" style="text-align:center"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesion</a>
    </div>
   </li>
  </ul>

 <?php } ?>

 <?php if ($Permiso=="Cliente") { ?>

  <ul class="navbar-nav navbar-right w-100 h-100 d-flex justify-content-end" id="drop">

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/" style="color:#fff;"><i class="fas fa-home mr-2"></i>Inicio</a>
   </li>

   <li class="nav-item lio active py-3">
    <a class="nav-link hov" href="/dbRestaurant/Acceso/Compras.php" style="color:#fff;"><i class="fas fa-store mr-2"></i>Mis Compras</a>
   </li>

   <li class="nav-item dropdown lio active py-3">
    <a class="nav-link dropdown-toggle hov text-white text-center" id="men" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <i class="fas fa-user-circle pr-2" widht="40px" style="text-align:center"></i><?php echo $rb['sLogin'];?>
    </a>

    <div class="dropdown-menu dmn" aria-labelledby="navbarDropdown">
     <div class="dropdown-item pt-3 pb-3" style="text-align:center"><img id="perfil" src="/dbRestaurant/Imagenes/Usuarios/<?php echo $rb['sPerfil'];?>"><span class="pl-2 tn" style="cursor:default">Hola <?php echo $rb['sNombre'];?></span></div>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Perfil.php"><i class="fas fa-user-alt mr-2"></i>Ver Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/UpdatePerfil.php"><i class="fas fa-user-edit mr-2"></i>Editar Perfil</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Carrito/"><i class="fas fa-shopping-cart mr-2"></i>Mi Carrito</a>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Config.php"><i class="fas fa-user-cog mr-2"></i>Configuracion</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item tn" href="/dbRestaurant/Acceso/Logout.php" style="text-align:center"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesion</a>
    </div>
   </li>
  </ul>

 <?php } ?>
<?php } ?>
  </div>
</nav>